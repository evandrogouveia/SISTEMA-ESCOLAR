<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"/>
    </head>
    <body>
        <div class="container">
            <div class="col-xs-6 col-xs-offset-3">
                <form method="post">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>ESQUECI A SENHA</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                Login:
                                <input type="text" name="login" class="form-control">
                            </div>
                            <div class="form-group">
                                E-mail:
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" value="RECUPERAR" class="btn btn-primary">
                            <a href='{{ route('novo') }}' class="btn btn-link">Novo Usuário</a>
                            <a href='{{ route('login') }}' class="btn btn-link">Logar</a>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
                    {!! $resp or '' !!}
            </div>
        </div>
    </body>
</html>
