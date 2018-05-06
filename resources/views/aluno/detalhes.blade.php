@extends("layout")
@section("conteudo")
    <h3 class="page-header">DETALHES DO ALUNO</h3>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <fieldset>
                    <div class="col-xs-2">
                        Foto:<br>
                        <label for="selecao-arquivo">
                            <img id="view-img" src="{{asset('fotos/'.$a->foto)}}">
                            <input id="selecao-arquivo" type="file" name="foto" value="{{'fotos/'.$a->foto}}">
                        </label>
                    </div>            
                    <div class="col-xs-5 form-group">
                        Nome:
                        <input type="text" name="nome" class="form-control" value="{{ $a->nome }}">
                    </div>
                    <div class="col-xs-2 form-group">
                        Tel.:
                        <input type="text" name="telefone" class="form-control" value="{{ $a->telefone }}">
                    </div>
                    <div class="col-xs-5 form-group">
                        E-mail:
                        <input type="email" name="email" class="form-control" value="{{ $a->email }}">
                    </div>
                    <div class="col-xs-3 form-group">
                        Curso:
                        <select name="idcurso" class="form-control" required>
                            <option></option>
                            @foreach($lista as $c)
                                <option value="{{$c->idcurso}}" @if ($a->idcurso == $c->idcurso){{ 'selected' }}@endif > 
                                    {{$c->nomecurso}}
                                </option>
                            @endforeach
                        </select>
                    </div>                   
                </fieldset><br>
                <div class="col-xs-3 col-xs-offset-2 form-group">
                    Cep:
                    <input id="cep" type="text" name="cep" class="form-control" value="{{ $a->endereco->cep }}">
                </div>
                <div class="col-xs-6 form-group">
                    Endereço:
                    <input id="endereco" type="text" name="endereco" class="form-control" value="{{ $a->endereco->endereco }}">
                </div>
                <div class="col-xs-4 form-group col-xs-offset-2">
                    Bairro:
                    <input id="bairro" type="text" name="bairro" class="form-control" value="{{ $a->endereco->bairro }}">
                </div>
                <div class="col-xs-3 form-group">
                    Cidade:
                    <input id="cidade" type='text'  name="cidade" class="form-control" value="{{ $a->endereco->cidade }}">    
                </div>
                <div class="col-xs-2 form-group">
                    Estado:
                    <input id="estado" type='text'  name="estado" class="form-control" value="{{ $a->endereco->estado }}">
                </div>  
            </div>
            <input type="submit" value="ATUALIZAR" class="btn btn-primary col-xs-offset-2">
            {{csrf_field()}}
        </form>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script>
        //Função para carregar a foto no formulário
            $("#selecao-arquivo").change(function(){
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#view-img').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        //Preencher endereço ao informar o cep
            $(document).ready(function() {
                function limpa_formulário_cep() {
                 // Limpa valores do formulário de cep.
                    $("#endereco").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#estado").val("");
                }
                //Quando o campo cep perde o foco.
                $("#cep").blur(function() {
                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');
                    //Verifica se campo cep possui valor informado.
                    if (cep !== "") {
                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;
                        //Valida o formato do CEP.
                        if(validacep.test(cep)) {
                            //Preenche os campos com "buscando..." enquanto consulta webservice.
                            $("#endereco").val("buscando...");
                            $("#bairro").val("buscando...");
                            $("#cidade").val("buscando...");
                            $("#estado").val("buscando...");
                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#endereco").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#estado").val(dados.uf);                              
                                } //end if.
                                else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                    }
                });
            });
     </script>       
@endsection
