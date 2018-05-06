<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="col-xs-4 col-xs-offset-4">
                <form method="post">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>NOVO USUARIO</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                Nome:
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                E-mail:
                                <input type="email" name="login" class="form-control">
                            </div>
                            <div class="form-group">
                                Password:
                                <input type="password" name="senha" class="form-control">
                            </div>
                            <div class="form-group">
                                Perfil:
                                <select name="perfil" class="form-control">
                                    <option value="USER">USUÁRIO</option>
                                    <option value="ADM">ADM</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" value="CADASTRAR" class="btn btn-primary">
                            <a href='{{ route('login') }}' class="btn btn-link">Voltar</a>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
                    {!! $resp or '' !!}
            </div>
        </div>
    </body>
</html>
