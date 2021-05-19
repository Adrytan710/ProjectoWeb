@extends('layouts.master')


@section('title')
   Editar-Registres Usuaris
@endsection

@section('content')

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
               <div class="card-header">
                  <h1> Editar Rol Usuaris.</h1>
               </div>
               <div class="card-body">
                  <div class="col-md-6">
                     <form action="/role-register-update/{{$users->id}}" method="POST">
                        {{csrf_field()}}
                        {{ method_field('PUT')}}
                        <div class="form-group">
                           <label >Nom</label>
                           <input type="text" name="username" value="{{$users->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                           <label >Telefon</label>
                           <input type="text" name="phone" value="{{$users->phone}}" class="form-control" minlength="10" maxlength="10">
                        </div>
                        <div class="form-group">
                           <label >Correu</label>
                           <input type="text" name="email" value="{{$users->email}}" class="form-control">
                        </div>
                        <div class="form-group">
                           <label> Asignar Rol </label>
                           <select name="usertype" class="form-control">
                              <option value="admin">admin</option>
                              <option value="usuari">usuari</option>
                           </select>
                        </div>
                        <button type="submit" class="btn btn-success"> Actualitzar </button>
                        <a href="/role-register"  class="btn btn-danger"> Cancelar </a>
                     </form>
               </div>
         </div>
      </div>
   </div>

</div>


@endsection

@section('scripts')

@endsection