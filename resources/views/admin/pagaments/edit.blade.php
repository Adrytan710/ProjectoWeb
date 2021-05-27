@extends('layouts.master')


@section('title')
   Editar Pago
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Editar Pagament</h4>

                    <form action="{{url('pagaments-update/'.$pagaments->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                    <div class="modal-body">
                      
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label"> Categoria ID </label>
                          <select name="categoria_id" class="form-control" value="{{$pagaments->categoria_id}}" required>
                             <option value="">Categories disponibles</option>
                             @foreach ($categories as $item)
                              <option value="{{$item->id}}">{{$item->id}}</option>
                             @endforeach  
                          </select>
                       </div>
                       
                       <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> Compte ID </label>
                        <select name="compte_id" class="form-control" id="recipient-name" value="{{$pagaments->compte_id}}" required>
                           <option value="">Comptes disponibles</option>
                           @foreach ($comptes as $item)
                            <option value="{{$item->id}}">{{$item->id}}</option>
                           @endforeach  
                        </select>
                     </div>
                          <div class="mb-3">
                            <label > Curs ID </label>
                            <select name="curs_id" class="form-control" required>
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
                            <input type="text" name="titol" class="form-control" value="{{$pagaments->titol}}" required>
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Descripció</label>
                            <input type="text" name="descripcio" id="RichText" value="{{$pagaments->descripcio}}" required/>
                          </div>
                          
                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Preu</label>
                            <input type="number" name="preu" value="{{$pagaments->preu}}" placeholder="1.00" step="1.00" min="0" id="recipient-name" required >
                          </div>
                          <div class="mb-3">
                            <label for="start">Data Inici</label>
                            <input type="date" name="data_inici" class="form-control" id="recipient-name" value="{{$pagaments->data_inici}}" required>
                          </div>
                          <div class="mb-3">
                            <label for="start" >Data Fi</label>
                            <input type="date" name="data_fi" class="form-control" id="recipient-name" value="{{$pagaments->data_fi}}" required>
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
                      <a href="{{url('pagaments')}}" class="btn btn-secondary">Tornar</a>
                      <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>



                </div>
            </div>
        </div>
    </div>
       
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    $('#RichText').richText();
  });
</script>

@endsection