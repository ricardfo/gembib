<?php

namespace App\Http\Controllers;

use App\Item;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SugestaoController extends Controller
{    
    public function sugestaoForm()
    {
        $this->authorize('logado');
        return view('sugestao/form');
        $user = new User;
    }

    public function sugestao(Request $request)
    {
        $this->authorize('logado');
        $request->validate([
            'titulo'  => 'required',
            'autor'   => 'required',
            'editora' => 'required',
        ]);

        $item = new Item;
        $item->titulo = $request->titulo;
        $item->autor = $request->autor;
        $item->editora = $request->editora;
        $item->ano = $request->ano;
        $item->informacoes = $request->informacoes;
        $item->sugerido_por_id = Auth::id();
        $item->data_sugestao = Carbon::now();
        //$item->data_sugestao = \Carbon\Carbon::parse(Carbon::now())->format('d/m/Y');Não pode gravar data nesse formato?

        $item->status = "Sugestão";
        $item->save();

        $request->session()->flash('alert-info', 'Sugestão enviada com sucesso');

        return redirect('/');
    }
}