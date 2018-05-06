<!DOCTYPE html>
<html class="layout">
    <head>
        <meta charset="UTF-8">
        <title>Bem Vindo</title>
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('bootstrap/css/style.css')}}"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    </head>
    <body class="layout">
        <div class="container-fluid">
            <div class="col-md-2 hidden-xs" id="navigation">
                <div class="logo">
                    <h2>SISTEMA ESCOLAR</h2>
                </div>
                <div class="navi">
                    <ul>
                        @can('publica',Auth::user())
                        <li class="{{Request::url()==url('/admin')? 'active' : ''}}"><a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i>HOME</a></li>
                        @endcan
                        @can('adm',Auth::user())
                        <li class="{{Request::url()==url('')? 'active' : ''}}"><a href="{{route('curso_novo')}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>NOVO CURSO</a></li>
                        @endcan
                        @can('adm',Auth::user())
                        <li class="{{Request::url()==url('')? 'active' : ''}}"><a href="{{route('aluno_cadastrar')}}"><i class="fa fa-user" aria-hidden="true"></i>NOVO ALUNO</a></li>
                        @endcan
                        @can('publica',Auth::user())
                        <li class="{{Request::url()==url('/admin/buscar')? 'active' : ''}}"><a href="{{route('aluno_buscar')}}"><i class="fa fa-search-minus" aria-hidden="true"></i>BUSCAR ALUNO</a></li>
                        @endcan                                                  
                        @can('adm',Auth::user())
                        <li class="{{Request::url()==url('/admin/usuario-buscar')? 'active' : ''}}"><a href="{{ route('usuario_buscar')}}"><i class="fa fa-user-edit" aria-hidden="true"></i>EDITAR USUÁRIOS</a></li>
                        @endcan     
                        <li><a href="{{route('sair')}}"><i class="fa fa-sign-out-alt" aria-hidden="true"></i>SAIR</a></li>
                    </ul>
                </div>
            </div>
            <div class="conteudo  col-xs-10 col-xs-offset-2">
                <p class="text-right">
                    Bem vindo ao sistema, {{Auth::user()->nome}}
                    <br>
                    Perfil: {{Auth::user()->perfil}}
                </p>
                @yield("conteudo")
                <div class="col-md-12">
                    {!! $resp or '' !!}
                </div>
            </div>
        </div>                   
    </body>
</html>

