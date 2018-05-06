@extends("layout")
@section("conteudo")  
<h3 class="page-header">EDITAR PERFIS</h3>
@if(isset($lista) && count($lista) > 0)       
    @foreach($lista as $a)          
        <div class="col-xs-10 col-xs-offset-1" style="border: 1px solid #CCC">
            <div class="row">
                <div class="alert alert-info" role="alert"><strong>DADOS DE CADASTRO</strong></div>
                <div class="col-xs-4">
                    <strong>Nome:&nbsp;</strong>{{ $a->nome }}<br>
                    <strong>Login:&nbsp;</strong>{{ $a->login }}<br>
                    <strong>Perfil:&nbsp;</strong>{{ $a->perfil }}<br> 
                </div>           
            </div><br><br>
        </div>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-5">
                <a href="{{ route('editaperfil', ['id' => $a->idusuario]) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('usuario_excluir', ['id' => $a->idusuario]) }}" class="btn btn-danger" onclick="return confirm('Deseja excluir este usuário?')">Excluir</a>
            </div>
        </div><br>           
    @endforeach 
    @foreach($deletado as $d)
        <div class="col-xs-10 col-xs-offset-1" style="border: 1px solid #CCC;margin-top: 20px;">
            <div class="row">
                <div class="alert alert-disable" role="alert"><strong>USUÁRIO EXCLUÍDO</strong></div>
                <div class="col-xs-4">
                    <div class="alert-disable">
                        <strong>Nome:&nbsp;</strong>{{ $d->nome }}<br>
                        <strong>Login:&nbsp;</strong>{{ $d->login }}<br>
                        <strong>Perfil:&nbsp;</strong>{{ $d->perfil }}<br><br>
                    </div>
                </div>           
            </div>
        </div>
    @endforeach
@endif
@endsection
