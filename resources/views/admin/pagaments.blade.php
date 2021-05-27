
@extends('layouts.master')


@section('title')
   Pagaments
@endsection



@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nou Pagament</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        
        </div>
        <form action="/save-pagaments" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label"> Categoria ID </label>
              <select name="categoria_id" class="form-control" id="recipient-name" required>
                 <option value="">Categories disponibles</option>
                 @foreach ($categories as $item)
                  <option value="{{$item->id}}">{{$item->id}}</option>
                 @endforeach  
              </select>
           </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"> Compte ID </label>
                <select name="compte_id" class="form-control" id="recipient-name" required>
                   <option value="">Comptes disponibles</option>
                   @foreach ($comptes as $item)
                    <option value="{{$item->id}}">{{$item->id}}</option>
                   @endforeach  
                </select>
             </div>
             <div class="mb-3">
              <label for="recipient-name" class="col-form-label"> Curs ID </label>
              <select name="curs_id" class="form-control" id="recipient-name" required>
                 <option value="">Cursos disponibles</option>
                 @foreach ($cursos as $item)
                  <option value="{{$item->id}}">{{$item->id}}</option>
                 @endforeach  
              </select>
           </div>
              <div class="mb-3">
                <label> Nivell </label>
                <select name="nivell" class="form-control">
                   <option value="ESO">ESO</option>
                   <option value="BAT">BAT</option>
                   <option value="CF">CF</option>
                   <option value="PR">PR</option>
                </select>
             </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Títol</label>
                <input type="text" name="titol" class="form-control" id="recipient-name" required>
              </div>
              <div class="mb-3">
                <label class="col-form-label">Descripció</label>
                <input type="text" name="descripcio" id="RichText" required/>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Preu</label>
                <input type="number" name="preu" placeholder="1.00" step="1.00" min="0" id="recipient-name" required >
              </div>
              <div class="mb-3">
                <label for="start">Data Inici</label>
                <input type="date" name="data_inici" class="form-control" id="recipient-name" required>
              </div>
              <div class="mb-3">
                <label for="start" >Data Fi</label>
                <input type="date" name="data_fi" class="form-control"  id="recipient-name" required>
              </div>
              <div class="mb-3">
                <label> Estat </label>
                <select name="estat" class="form-control">
                   <option value="Actiu">Actiu</option>
                   <option value="Inactiu">Inactiu</option>
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
                    <h4 class="card-title"> Pagaments
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Afegir Pagaments</button>
                    </h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                    {{session('status')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pagaments" class="display nowrap" style="width:100%">
                            <thead class=" text-primary">
                                <th>ID</th>
                                <th>CategoriaID</th>
                                <th>CompteID</th>
                                <th>CursID</th>
                                <th>Nivell</th>
                                <th>Títol</th>
                                <th>Descripció</th>
                                <th>Preu</th>
                                <th>Data Inici</th>
                                <th>Data Fi</th>
                                <th>Estat</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>
                            </thead>
                            <tbody>
                                @foreach ($pagaments as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->categoria_id}}</td>
                                    <td>{{$data->compte_id}}</td>
                                    <td>{{$data->curs_id}}</td>
                                    <td>{{$data->nivell}}</td>
                                    <td>{{$data->titol}}</td>
                                    <td>{{$data->descripcio}}</td>
                                    <td>{{$data->preu}}</td>
                                    <td>{{$data->data_inici}}</td>
                                    <td>{{$data->data_fi}}</td>
                                    <td>{{$data->estat}}</td>
                                    <td>
                                        <a href="{{url('pagaments/'.$data->id)}}" class="btn btn-success">EDITAR </a>
                                    </td>
                                    <td>
                                        <form action="{{url('pagaments-delete/'.$data->id)}}" method="POST">
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
    $('#pagaments').DataTable( {
        responsive: true,
        autoWidth: false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
  
</script>
<script>
  $(document).ready(function(){
    $('#RichText').richText();
  });
</script>


@endsection