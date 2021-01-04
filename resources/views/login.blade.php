@extends('layout')

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
    <div class="col-12">
        <h2 class="mb-3">Logar no Ecommerce</h2>

        <form action="{{route('login.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" id="cpf" class="form-control" name="login"/>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" name="password"/>
            </div>

            <input type="submit" value="Logar" class="btn btn-lg btn-primary"/>

        </form>
    </div>
@endsection
