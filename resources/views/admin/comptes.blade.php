
@extends('layouts.master')


@section('title')
   Comptes
@endsection



@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nou Compte</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        
        </div>
        <form action="/save-comptes" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Compte</label>
              <input type="text" name="compte" class="form-control" id="recipient-name" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Fuc</label>
                <input type="text" name="fuc" class="form-control" id="recipient-name" required>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Clau</label>
                <input type="text" name="clau" class="form-control" id="recipient-name" required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tancar</button>
          <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </form>
      </div>
    </div>
  </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Comptes
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Afegir Compte</button>
                    </h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                    {{session('status')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="comptes" class="display nowrap" style="width:100%">
                            <thead class=" text-primary">
                                <th>ID</th>
                                <th>Compte</th>
                                <th>Fuc</th>
                                <th>Clau</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>
                            </thead>
                            <tbody>
                                @foreach ($comptes as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->compte}}</td>
                                    <td>{{$data->fuc}}</td>
                                    <td>{{$data->clau}}</td>
                                    <td>
                                        <a href="{{url('comptes/'.$data->id)}}" class="btn btn-success">EDITAR </a>
                                    </td>
                                    <td>
                                        <form action="{{url('comptes-delete/'.$data->id)}}" method="POST">
                                           {{ csrf_field() }}
                                           {{method_field('DELETE')}}
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
    $('#comptes').DataTable( {
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