@include('cabecera')


<!-- Menú desplegable -->
<nav class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <a class="navbar-brand" href="/">Inici</a>
        @foreach ($categories as $categoria)
        <ul class="navbar-nav"> 
            <li class="nav-item active">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">{{$categoria->categoria}}</a>
                <div class="dropdown-menu desplegable">
                @foreach ($pagaments as $pagament)    
                     @if ($categoria->id == $pagament->categoria_id && $pagament->estat == 'Actiu' && $categoria->categoria == $pagament->nivell)
                        <a class="dropdown-item" href="{{url('pagos/'.$pagament->id)}}">{{$pagament->titol}}</a>                              
                    @endif                          
                @endforeach
                </div>
            </li>
        @endforeach
            <!-- LOGIN -->
            <li class="nav-item active">
                <a class="nav-link" href="/login">Login</a>
            </li>
            <!-- Fin del LOGIN -->
        </ul>
    </div>
</nav>
