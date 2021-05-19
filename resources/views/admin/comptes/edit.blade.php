@extends('layouts.master')


@section('title')
   Editar Comptes
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Editar Compte</h4>

                    <form action="{{url('comptes-update/'.$comptes->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Compte</label>
                          <input type="text" name="compte" class="form-control" value="{{$comptes->compte}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Fuc</label>
                            <input type="text" name="fuc" class="form-control" value="{{$comptes->fuc}}" required>
                          </div>
                          <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Clau</label>
                            <input type="text" name="clau" class="form-control" value="{{$comptes->clau}}" required>
                          </div>
                    </div>
                    <div class="modal-footer">
                      <a href="{{url('comptes')}}" class="btn btn-secondary">Tornar</a>
                      <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>



                </div>
            </div>
        </div>
    </div>
       
@endsection