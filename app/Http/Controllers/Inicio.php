<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Pagaments;
use App\Models\Cursos;
use App\Models\Comptes;


use Illuminate\Http\Request;

class Inicio extends Controller {
    public function index() {
        $comptes = Comptes::all();
        $cursos = Cursos::all();
        $categories = Categories::all();
        $pagaments = Pagaments::all();
        return view('index',compact('categories','pagaments','cursos','comptes'));

    }
    
    
    
   
  

}
