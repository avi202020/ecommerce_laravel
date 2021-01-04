@extends('layout')

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
<script>
    $(function(){
        $("#cpf").mask("000.000.000-00");
        $("#cep").mask("00000-000");
    });
</script>
@endsection

@section('content')
    <div class="col-12">
        <h2 class="mb-3">Cadastrar Cliente</h2>
    </div>
    <form action="{{route('cadastrar.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome"/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" class="form-control" name="cpf"/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password"/>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco"/>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" class="form-control" name="cep"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="uf">Estado</label>
                    <input type="text" class="form-control" name="uf"/>
                </div>
            </div>
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-success btn-sm"/>
    </form>
@endsection
