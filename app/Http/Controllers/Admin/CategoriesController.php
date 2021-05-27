<?php

namespace App\Http\Controllers\Admin;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('admin.categories')
        ->with('categories',$categories);

    }
    public function store(Request $request){
        $validate = $request->validate([
            'categoria'=> 'required|unique:categories'
        ]);
        $categoriestabla = new Categories;

        $categoriestabla->categoria = $request->input('categoria');

        $categoriestabla->save();
        return redirect('/categories')->with('status','Se ha creado la categoria correctamente.');
    }
    
    public function edit($id,Request $request)
    {
         $categories = Categories::findOrFail($id);
        return view('admin.categories.edit')
        ->with('categories',$categories);
    }
    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'categoria'=> 'required|unique:categories'
        ]);
        $categories = Categories::findOrFail($id);
        $categories->categoria =$request->input('categoria');
        $categories->update();
        return redirect('categories')->with('status','Categoria actualizada correctamente.');
    }
    public function delete($id)
    {
        $categories = Categories::findOrFail($id);
        $categories->delete();
        return redirect('categories')->with('status','Categoria eliminada correctamente.');

    }
  
}
