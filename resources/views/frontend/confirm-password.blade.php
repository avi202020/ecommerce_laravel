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
        <h2 class="mb-3">Redefinir nova senha</h2>

        <form action="{{route('reset.password',$tokenData->token)}}" method="POST" >
            @csrf
            <div class="form-group">
                <label>Nova Senha</label>
                <input type="password" required name="password" class="form-control" placeholder="Senha">
            </div>
            <div class="form-group">
                <label>Confirme Nova Senha</label>
                <input type="password" required name="password_confirmation" class="form-control" placeholder="Confirme Senha">
            </div>
            <div class="form-group row">
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-flat m-b-15">Enviar</button>
                </div>
                <div class="col-2">
                    <a href="{{route('login')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>
        </form>
    </div>
@endsection
