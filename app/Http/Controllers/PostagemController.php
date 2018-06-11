<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostagemModel;

class PostagemController extends Controller
{
    function listar()
    {
        $postagens = PostagemModel::orderBy('publish_date', 'DESC')->limit(14)->get();
        return view('main')->with('postagens', $postagens);
    }

    function showPostagem($id)
    {
        $postagem = PostagemModel::find($id);
        return view('postagem')->with('postagem', $postagem);
    }
}
