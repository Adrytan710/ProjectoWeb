<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comptes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComptesController extends Controller
{
    public function index(){
        $comptes = Comptes::all();
        return view('admin.comptes')
        ->with('comptes',$comptes);

    }
    public function store(Request $request){
        $comptestabla = new Comptes;

        $comptestabla->compte = $request->input('compte');
        $comptestabla->fuc = $request->input('fuc');
        $comptestabla->clau = $request->input('clau');

        $comptestabla->save();
        return redirect('/comptes')->with('status','Se ha creado la cuenta correctamente.');
    }
    public function edit($id)
    {
      
         $comptes = Comptes::findOrFail($id);

        return view('admin.comptes.edit')
        ->with('comptes',$comptes);
    }
    public function update(Request $request,$id)
    {
        $comptes = Comptes::findOrFail($id);
        $comptes->compte =$request->input('compte');
        $comptes->fuc =$request->input('fuc');
        $comptes->clau =$request->input('clau');

        $comptes->update();
        return redirect('comptes')->with('status','Cuenta actualizada correctamente.');
    }
    public function delete($id)
    {
        $comptes = Comptes::findOrFail($id);
        $comptes->delete();
        return redirect('comptes')->with('status','Cuenta eliminada correctamente.');

    }
} 

