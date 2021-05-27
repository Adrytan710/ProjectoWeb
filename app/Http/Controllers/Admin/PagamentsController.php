<?php

namespace App\Http\Controllers\Admin;
use App\Models\Pagaments;
use App\Models\Categories;
use App\Models\Comptes;
use App\Models\Cursos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagamentsController extends Controller
{
    public function index(){
        $pagaments = Pagaments::all();
        $categories = Categories::all();
        $cursos = Cursos::all();
        $comptes = Comptes::all();
        return view('admin.pagaments')
        ->with('pagaments',$pagaments)->with('categories',$categories)->with('cursos',$cursos)->with('comptes',$comptes);

    }
    public function store(Request $request){
        $pagamentstabla = new Pagaments;
        $pagamentstabla->categoria_id = $request->input('categoria_id');
        $pagamentstabla->compte_id = $request->input('compte_id');
        $pagamentstabla->curs_id= $request->input('curs_id');
        $pagamentstabla->nivell = $request->input('nivell');
        $pagamentstabla->titol = $request->input('titol');
        $pagamentstabla->descripcio = $request->input('descripcio');
        $pagamentstabla->preu = $request->input('preu');
        $pagamentstabla->data_inici = $request->input('data_inici');
        $pagamentstabla->data_fi = $request->input('data_fi');
        $pagamentstabla->estat = $request->input('estat');
        $pagamentstabla->save();
        return redirect('/pagaments')->with('status','Se ha creado el pago correctamente.');
        
    }
    public function edit($id)
    {
        $cursos = Cursos::all();
        $comptes = Comptes::all();
        $categories = Categories::all();
        $pagaments = Pagaments::findOrFail($id);

        return view('admin.pagaments.edit')
        ->with('pagaments',$pagaments)->with('categories',$categories)->with('cursos',$cursos)->with('comptes',$comptes);
    }
    public function update(Request $request,$id)
    {
        $pagaments = Pagaments::findOrFail($id);
        $pagaments->categoria_id = $request->input('categoria_id');
        $pagaments->compte_id = $request->input('compte_id');
        $pagaments->curs_id = $request->input('curs_id');
        $pagaments->nivell = $request->input('nivell');
        $pagaments->titol = $request->input('titol');
        $pagaments->descripcio = $request->input('descripcio');
        $pagaments->preu = $request->input('preu');
        $pagaments->data_inici = $request->input('data_inici');
        $pagaments->data_fi = $request->input('data_fi');
        $pagaments->estat = $request->input('estat');
        $pagaments->update();
        return redirect('pagaments')->with('status','Pago actualizado correctamente.');
    }
    public function delete($id)
    {
        $pagaments = Pagaments::findOrFail($id);
        $pagaments->delete();
        return redirect('pagaments')->with('status','Pago eliminado correctamente.');

    }
    public function pagos($id)
    {
        $pagaments = Pagaments::all();
        $comptes = Comptes::all();
        $cursos = Cursos::all();
        $categories = Categories::all();
        $pagament = Pagaments::FindOrFail($id);
        return view('pagos',compact('categories','pagaments','pagament','cursos','comptes'));
    }
}
