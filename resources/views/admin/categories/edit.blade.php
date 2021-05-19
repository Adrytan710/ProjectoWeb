@extends('layouts.master')


@section('title')
   Editar Categories
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Editar Categoria</h4>

                    <form action="{{url('categories-update/'.$categories->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label> Categoria </label>
                            <select name="categoria" class="form-control" >
                               <option value="ESO">ESO</option>
                               <option value="BAT">BAT</option>
                               <option value="CF">CF</option>
                               <option value="PR">PR</option>
                            </select>
                         </div>
                    </div>
                    
                    <div class="modal-footer">
                      <a href="{{url('categories')}}" class="btn btn-secondary">Tornar</a>
                      <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>



                </div>
            </div>
        </div>
    </div>
       
@endsection