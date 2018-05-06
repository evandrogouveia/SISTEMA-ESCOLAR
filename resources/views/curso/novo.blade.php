@extends("layout")
@section("conteudo")
<h4 class="page-header">CADASTRAR NOVO CURSO</h4>
<form method="post" action="{{ route('curso_novo') }}">
    <div class="form-group">
        Nome do curso:
        <input type="text" name="nomecurso" 
               class="form-control">
    </div>
    <input type="submit" value="CADASTRAR" 
           class="btn btn-primary">
    {{ csrf_field() }}
</form>
<hr>
@if(isset($lista) && count($lista))
<table class="table table-bordered">
    <tr>
        <th>ID DO CURSO</th>
        <th>NOME DO CURSO</th>
        <th width="20">EXCLUIR</th>
    </tr>
    @foreach($lista as $c)
    <tr>
        <td>{{ $c->idcurso }}</td>
        <td>{{ $c->nomecurso }}</td>
        <td>
            <a href="{{ route('curso_excluir', 
                        ['id' => $c->idcurso]) }}" class="btn btn-danger"
                onclick="return confirm('Deseja excluir este curso?')">
                <span class="fa fa-times"></span>
            </a>
        </td>
    </tr>
    @endforeach
</table>
@endif
@endsection