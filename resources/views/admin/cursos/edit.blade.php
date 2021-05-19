@extends('layouts.master')


@section('title')
   Editar Curs
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Editar Curs</h4>

                    <form action="{{url('cursos-update/'.$cursos->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">Curs</label>
                          <input type="text" name="curs" class="form-control" value="{{$cursos->curs}}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="{{url('cursos')}}" class="btn btn-secondary">Tornar</a>
                      <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>



                </div>
            </div>
        </div>
    </div>
       
@endsection