<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use PDF;
use DB;

class RelatorioController extends Controller
{
    public function form(){
        $this->authorize('sai');
        return view('relatorios');
    }

    public function show(Request $request){
      $this->authorize('sai');
      
    	$request->validate([
          'cod_impressao'  => 'required',
          'titulo'  => 'required'
      ]);
      $titulo = $request->titulo;
      $itens = Item::where('cod_impressao', $request->cod_impressao)->get();
      
      $soma = DB::table('itens')->select('preco')->where('cod_impressao', $request->cod_impressao)->get();
      $total = $soma->sum('preco');

      $pdf = PDF::loadView('pdfs.relatorio', compact('itens','titulo','total'));
      $pdf->output();
      $dom_pdf = $pdf->getDomPDF();

      $canvas = $dom_pdf ->get_canvas();
      $canvas->page_text(0, 0, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
      return $pdf->download('relatorio.pdf');
    }
}

