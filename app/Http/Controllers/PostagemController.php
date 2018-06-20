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

        foreach ($comentarios as $comentario)
        {
            $comentario->userName = User::find($comentario->user_model_id)->name;
            $replies[$comentario->id] = ReplyModel::where('comentario_model_id', $comentario->id)->get();
            foreach ($replies[$comentario->id] as $reply)
            {
                $reply->userName = User::find($reply->user_model_id)->name;
            }
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
            $titulo = "";
            $img1 = "";
            $img2 = "";
            $txt1 = "";
            $txt2 = "";
            $produto_rel_url = "";
            $genero = "";

            while(!feof($fp))
            {
                $linha = utf8_decode(fgets($fp));

                if(!empty($linha))
                {
                    
                }
            }
        }

        // foreach ($checks as $ck)
        // {
        //     // Envia e-mail com a senha para os gênios importados do .txt
        //     $dados_mail = array();
        //     $email = mb_strtolower($ck, 'UTF-8');
        //     \Mail::to($email)->send( new Mailing("mailImport", $dados, $titulo) );
        //     sleep(1);
        // }

        // Importação Finalizada com Sucesso
        // $msg = "E-mails enviados com sucesso";

        return view('messagebox')->with('tipo', 'alert alert-success')
                ->with('titulo', 'RELATÓRIO MENSAL')
                ->with('msg', $msg)
                ->with('acao', "/");
    }
}
