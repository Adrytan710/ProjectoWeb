<?php

namespace App\Http\Controllers\Admin;
use App\Models\Cursos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(){
        $cursos = Cursos::all();
        return view('admin.cursos')
        ->with('cursos',$cursos);

    }
    public function store(Request $request){
        $cursostabla = new Cursos;

        $cursostabla->curs = $request->input('curs');

        $cursostabla->save();
        return redirect('/cursos')->with('status','Se ha creado el curso correctamente.');
    }
    public function edit($id)
    {
      
         $cursos = Cursos::findOrFail($id);

        return view('admin.cursos.edit')
        ->with('cursos',$cursos);
    }
    public function update(Request $request,$id)
    {
        $cursos = Cursos::findOrFail($id);
        $cursos->curs =$request->input('curs');
        $cursos->update();
        return redirect('cursos')->with('status','Cursos actualizado correctamente.');
    }
    public function delete($id)
    {
        $cursos = Cursos::findOrFail($id);
        $cursos->delete();
        return redirect('cursos')->with('status','Curso eliminado correctamente.');

    }
}
