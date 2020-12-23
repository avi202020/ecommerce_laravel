@extends('layout')

@section('content')
    <div class="col-12">
        <h2 class="mb-3">Cadastrar Cliente</h2>
    </div>
    <form action="" method="POST">
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
                    <input type="text" class="form-control" name="cpf"/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password"/>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco"/>
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
                    <input type="text" class="form-control" name="cep"/>
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
