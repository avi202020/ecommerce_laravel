@extends('frontend.layout.app')

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
<script>
    $(function(){
        $("#cpf").mask("000.000.000-00");
    });
</script>
@endsection

@section('content')
    <div class="col-8 offset-2">
        <h2 class="mb-3">Esqueci Senha</h2>

        <form action="{{route('forgot.password')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="login">Informe seu cpf para enviarmos um email para redefinir sua senha</label>
                <input type="text" id="cpf" class="form-control" name="login"/>
            </div>

            <div class="form-group row">
                <div class="col-2">
                    <input type="submit" value="Enviar" class="btn btn-lg btn-primary"/>
                </div>
                <div class="col-2">
                    <a href="{{route('login')}}" class="btn btn-danger mt-1"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>

        </form>
    </div>
@endsection
