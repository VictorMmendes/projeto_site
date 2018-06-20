<?php
namespace App\Http\Controllers;
use Request;
use Auth;
use App\PostagemModel;
use App\ComentarioModel;
use App\ReplyModel;
use App\User;

class PostagemController extends Controller
{
    function listar()
    {
        $postagens = PostagemModel::orderBy('publish_date', 'DESC')->limit(16)->get();
        return view('main')->with('postagens', $postagens);
    }

    function showPostagem($id)
    {
        $postagem = PostagemModel::find($id);
        $comentarios = ComentarioModel::where('postagem_model_id', $id)->get();
        $replies = array();

        foreach ($comentarios as $comentario)
        {
            $comentario->userName = User::find($comentario->user_model_id)->name;
            $replies[$comentario->id] = ReplyModel::where('comentario_model_id', $comentario->id)->get();
            $count = 0;
            foreach ($replies[$comentario->id] as $reply)
            {
                $reply->userName = User::find($reply->user_model_id)->name;
                $count++;
            }
            $comentario->repliesCount = $count;
        }
        $trendings = PostagemModel::orderBy('publish_date', 'DESC')->where('id', '!=', $id)->limit(14)->get();
        return view('postagem')->with('postagem', $postagem)->with('trendings', $trendings)
            ->with('comentarios', $comentarios)->with('replies', $replies);
    }

    function addComment($id)
    {
        $comentario = new ComentarioModel();
        $comentario->conteudo = Request::input('comentario');
        $comentario->postagem_model_id = $id;
        $comentario->user_model_id = Auth::user()->id;
        $comentario->save();

        return $this->showPostagem($id);
    }

    function showNewPostForm()
    {
        return view('newPost');
    }

    function createPost()
    {
        // Arquivo Selecionado
        $arquivo = Request::file('arq_post');
        // Nenhum Arquivo Selecionado
        if (empty($arquivo)) {
            $msg = "Selecione o ARQUIVO para realizar a postagem!";

            return view('messagebox')->with('tipo', 'alert alert-danger')
                    ->with('titulo', 'ENTRADA DE DADOS INVÁLIDA')
                    ->with('msg', $msg)
                    ->with('acao', "/newPost");
        }
        // Efetua o Upload do Arquivo
        $path = $arquivo->store('uploads');

        // Efetua a Leitura do Arquivo
        $fp = fopen("../storage/app/".$path, "r");

        if ($fp != false)
        {
            while(!feof($fp))
            {
                $linha = fgets($fp);

                if(!empty($linha))
                {
                    if($linha == "@titulo\n")
                    {
                        $linha = fgets($fp);
                        while($linha[0] != "@")
                        {
                            $titulo[] = $linha;
                            $linha = fgets($fp);
                            if(empty($linha)) break;
                        }
                    }

                    if($linha == "@img1\n")
                    {
                        $linha = fgets($fp);
                        while($linha[0] != "@")
                        {
                            $img1[] = $linha;
                            $linha = fgets($fp);
                            if(empty($linha)) break;
                        }
                    }

                    if($linha == "@img2\n")
                    {
                        $linha = fgets($fp);
                        while($linha[0] != "@")
                        {
                            $img2[] = $linha;
                            $linha = fgets($fp);
                            if(empty($linha)) break;
                        }
                    }

                    if($linha == "@txt1\n")
                    {
                        $linha = fgets($fp);
                        while($linha[0] != "@")
                        {
                            $txt1[] = $linha;
                            $linha = fgets($fp);
                            if(empty($linha)) break;
                        }
                    }

                    if($linha == "@txt2\n")
                    {
                        $linha = fgets($fp);
                        while($linha[0] != "@")
                        {
                            $txt2[] = $linha;
                            $linha = fgets($fp);
                            if(empty($linha)) break;
                        }
                    }

                    if($linha == "@genero\n")
                    {
                        $linha = fgets($fp);
                        while($linha[0] != "@")
                        {
                            $genero[] = $linha;
                            $linha = fgets($fp);
                            if(empty($linha)) break;
                        }
                    }
                }
            }
        }

        $this->post($titulo, $img1, $img2, $txt1, $txt2, $genero);

        $titulo = "TecGames - Explore os universos";
        $dados['postagem'] = $img1;
        $dados['titulo'] = $titulo;
        $user = User::all();
        foreach ($checks as $ck)
        {
            $email = mb_strtolower($ck, 'UTF-8');
            \Mail::to($email)->send( new Mailing("mailImport", $dados, $titulo) );
            sleep(1);
        }

        $msg = "Postagem realizada com sucesso";

        return view('messagebox')->with('tipo', 'alert alert-success')
                ->with('titulo', 'Postagem Via WebService')
                ->with('msg', $msg)
                ->with('acao', "/");
    }

    function post($titulo, $img1, $img2, $txt1, $txt2, $genero)
    {
        $dados = array(
            'titulo' => array($titulo),
            'img1' => array($img1),
            'img2' => array($img2),
            'txt1' => array($txt1),
            'txt2' => array($txt2),
            'genero' => array($genero)
        );
        $encDados = json_encode($dados);

		// INICIALIZA/CONFIGURA CURL
		$curl = curl_init("http://localhost/FrameworkSlim/slim/autenticar/rest.php");
		// CONFIGURA AS OPÇÕES (parâmetros)
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, 'POST');
		curl_setopt($curl, CURLOPT_POSTFIELDS, $encDados);
		// INVOCA A URL DO WEBSERVICE
		$curl_resposta = curl_exec($curl);
		curl_close($curl);

		return $curl_resposta;
    }
}
