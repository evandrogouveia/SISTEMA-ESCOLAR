@extends("layout")
@section("conteudo")
    <div class="well">Pagina Inicial do sistema</div><br><br>
    @can('adm',Auth::user())
    <div class="col-xs-3">     
        <a href="{{route('curso_novo')}}">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4 class="titulo">NOVO CURSO</h4></div>
                <div class="panel-body">                   
                    <i class="fa fa-graduation-cap fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </a>   
    </div>
    @endcan
    @can('adm',Auth::user())
    <div class="col-xs-3">
        <a href="{{route('aluno_cadastrar')}}">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4 class="titulo">NOVO ALUNO</h4></div>
                <div class="panel-body">
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </a>    
    </div>
    @endcan
    @can('publica',Auth::user())
    <div class="col-xs-3">
        <a href="{{route('aluno_buscar')}}">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4 class="titulo">BUSCAR ALUNO</h4></div>
                <div class="panel-body">
                    <i class="fa fa-search-minus fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </a>    
    </div>
    @endcan
    @can('adm',Auth::user())
    <div class="col-xs-3">
        <a href="{{route('usuario_buscar')}}">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4 class="titulo">EDITAR PERFIS</h4></div>
                <div class="panel-body">
                    <i class="fa fa-user-edit fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </a>    
    </div>
    @endcan
    <div class="col-xs-3">
        <a href="{{route('sair')}}">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4 class="titulo">SAIR</h4></div>
                <div class="panel-body">
                    <i class="fa fa-sign-out-alt fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </a>    
    </div>      
@endsection