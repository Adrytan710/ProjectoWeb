
@extends('layouts.master')


@section('title')
   Categories
@endsection



@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        
        </div>
        <form action="/save-categories" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
            
            <div class="mb-3">
                <label> Categoria </label>
                <select name="categoria" class="form-control">
                   <option value="ESO">ESO</option>
                   <option value="BAT">BAT</option>
                   <option value="CF">CF</option>
                   <option value="PR">PR</option>
                </select>
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
                    <h4 class="card-title"> Categories
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Afegir Categoria</button>
                    </h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                    {{session('status')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive" >
                        <table id="categories" class="display nowrap" style="width:100%">
                            <thead class=" text-primary">
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->categoria}}</td>
                                    <td>
                                        <a href="{{url('categories/'.$data->id)}}" class="btn btn-success">EDITAR </a>
                                    </td>
                                    <td>
                                        <form action="{{url('categories-delete/'.$data->id)}}" method="POST">
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
    $('#categories').DataTable( {
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