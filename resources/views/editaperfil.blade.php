@extends("layout")
@section("conteudo")
<h3 class="page-header">EDITAR PERFIL</h3>
<div class="col-md-12">
    <form method="post" enctype="multipart/form-data">
        <fieldset>         
            <div class="col-md-6 form-group">
                Nome:
                <input type="text" name="nome" class="form-control" value="{{ $a->nome }}">
            </div>
            <div class="col-md-6 form-group">
                Login:
                <input type="email" name="login" class="form-control" value="{{ $a->login }}">
            </div>
            <div class="col-md-6 form-group">
                Perfil:
                <select name="perfil" class="form-control">
                    @if($a->perfil == 'USER')
                    <option value="USER">USUÁRIO</option>
                    <option value="ADM">ADM</option>
                    @else
                    <option value="ADM">ADM</option>
                    <option value="USER">USUÁRIO</option>                  
                    @endif
                </select>
            </div>
            <div class="col-md-6 form-group">
                Alterar Senha:
                <input type="password" name="senha" class="form-control" value="{{ $a->password }}">                
            </div>
            <div class="col-md-6 form-group">
                <input type="submit" value="ATUALIZAR" class="btn btn-primary">
            </div>
        </fieldset><br>
        {{csrf_field()}}
    </form>
</div>
@endsection
