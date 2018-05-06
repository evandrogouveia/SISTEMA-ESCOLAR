@extends("layout")
@section("conteudo") 
    <h3 class="page-header">BUSCAR ALUNO</h3>
    <form action="{{ route('aluno_buscar') }}" method="post">
        <div class="form-group">
            Nome: 
            <input type="text" name="nome" class="form-control">           
        </div>
        <input type="submit" value="BUSCAR" class="btn btn-info">
        {{ csrf_field() }}
    </form><br>
    @if(isset($lista) && count($lista) > 0)       
        @foreach($lista as $a)    
             <div class="col-xs-10 col-xs-offset-1" style="border: 1px solid #CCC">
                <div class="row">
                    <div class="alert alert-info" role="alert"><strong>DADOS DO ALUNO</strong></div>
                    <div class="col-xs-2 col-xs-offset-1">
                        <strong>Foto:</strong><br>
                        <img src="{{asset('fotos/'.$a->foto)}}" width="100" height="100">
                    </div><br>
                    <div class="col-xs-4">
                        <strong>Matrícula:&nbsp;</strong>{{ $a->matricula }}<br>
                        <strong>Nome:&nbsp;</strong>{{ $a->nome }}<br>
                        <strong>Data de Nascimento:&nbsp;</strong>{{ date('d/m/Y', strtotime($a->datanasc)) }}<br>
                        <strong>Sexo:&nbsp;</strong>{{ $a->sexo }}<br>
                        <strong>Curso:&nbsp;</strong>{{ $a->nomecurso }}<br>           
                    </div>
                    <div class="col-xs-4">
                        <strong>Telefone:&nbsp;</strong>{{ $a->telefone }}<br>
                        <strong>Celular:&nbsp;</strong>{{ $a->telefone }}<br>          
                        <strong>E-mail:&nbsp;</strong>{{ $a->email }}<br>
                        <strong>Estado Civil:&nbsp;</strong>{{ $a->estadocivil }}<br>
                        <strong>Nacionalidade:&nbsp;</strong>{{ $a->nacionalidade }}<br> 
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="alert alert-info" role="alert"><strong>DADOS DE ENDEREÇO</strong></div>
                    <div class="col-xs-4 col-xs-offset-3">
                        <strong>Endereço:&nbsp;</strong>{{ $a->endereco }}<br>
                        <strong>Cep:&nbsp;</strong>{{ $a->cep }}<br>          
                        <strong>Bairro:&nbsp;</strong>{{ $a->bairro }}<br>           
                    </div>
                    <div class="col-xs-4">
                        <strong>Cidade:&nbsp;</strong>{{ $a->cidade }}<br>
                        <strong>Estado:&nbsp;</strong>{{ $a->estado }}<br>
                    </div>
                </div><br><br>
            </div>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-5">
                    @can('adm',Auth::user())
                        <a href="{{ route('aluno_detalhes', ['id' => $a->idaluno]) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('aluno_excluir', ['id' => $a->idaluno]) }}" class="btn btn-danger" onclick="return confirm('Deseja excluir este aluno?')">Excluir</a>
                    @endcan
                </div>
            </div><br>             
        @endforeach 
    @endif
@endsection
