@component('mail::message')
# Pedido para resetar senha

Olá, {{$name}}

@component('mail::button', ['url' => route('reset.password',$url)])
Clique aqui para redefinir sua senha
@endcomponent

Atte,<br>
{{ config('app.name') }}
@endcomponent
