@extends('layouts.master')


@section('title')
   Usuaris
@endsection



@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Afegir Usuarios</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/save-usuarios" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
        
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nom</label>
              <input type="text" name="name" class="form-control" id="recipient-name" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Telefon</label>
                <input type="text" name="phone" class="form-control" id="recipient-name" required>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Correu</label>
                <input type="text" name="email" class="form-control" id="recipient-name" required >
              </div>
              
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Contrasenya</label>
                <input type="text" name="password" class="form-control" id="recipient-name" required>
              </div>
   
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
          <button type="submit" class="btn btn-primary">Crear Usuari</button>
        </div>
    </form>
      </div>
    </div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">  Usuaris
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >Afegir</button>
                    </h4>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usuaris" class="display nowrap" style="width:100%">
                            <thead class=" text-primary">
                                <th> ID </th>
                                <th>Nom</th>
                                <th>Telèfon</th>
                                <th>Correu Electrònic</th>
                                <th>Rol</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)

                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->usertype}}</td>
                                    <td>
                                        <a href="/role-edit/{{$row->id}}" class="btn btn-success">EDITAR</a>
                                    </td>
                                    <td>
                                        <form action="/role-delete/{{$row->id}}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        <input type="hidden" name="id" value="{{$row->id}}">
                                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
@endsection


@section('scripts')
<script> 
$(document).ready(function() {
    $('#usuaris').DataTable( {
        responsive: true,
        autoWidth: false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endsection