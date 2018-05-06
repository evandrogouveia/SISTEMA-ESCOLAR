<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('bootstrap/css/style.css')}}"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" 
              rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" 
              crossorigin="anonymous"/>
    </head>
    <body>
        <div class="container">
             <div class="panel-title text-center">
                 <h2>SISTEMA ESCOLAR</h2>
             </div> 
             <div class="card card-container">
                 <p id="profile-name" class="profile-name-card"></p>
                 <form method="post" class="form-signin">
                     <div class="input-group">
                         <div class="input-group-addon" ><span class="glyphicon glyphicon-user"></span></div>
                         <input type="text" name="login" id="inputnome" class="form-control" placeholder="Seu e-mail" required autofocus>
                     </div><br>
                     <div class="input-group">
                         <div class="input-group-addon" ><span class="glyphicon glyphicon-lock"></span></div>
                         <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Sua senha" required>
                     </div><br>
                     <input type="submit" value="LOGIN" class="btn btn-lg btn-primary btn-block btn-signin">
                        <a href='{{ route('esqueci') }}' class="forgot-password">Esqueci a senha</a>
                        <a href='{{ route('novo') }}' class="forgot-password pull-right">Novo usuário</a>
                        {{ csrf_field() }}
                </form><!-- /form -->
                        {!! $resp or '' !!}
             </div><!-- /card-container --> 
         </div><!-- /container -->
    </body>
</html>
