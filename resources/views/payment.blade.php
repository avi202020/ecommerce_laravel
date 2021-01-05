@extends('layout')

@section('scripts')
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        function loadSessionId(){
            //1º Abrir sessão com Pagseguro atraves do sessionID originário da config no backend
            PagSeguroDirectPayment.setSessionId('{{$sessionID}}');
        }

        // On Ready Page Load
        $(function(){
            loadSessionId();

            $('.ncredito').on('blur',function(){
                //2º Gerar Hash da Compra para enviar no post do formulário
                PagSeguroDirectPayment.onSenderHashReady(function(response){
                    if(response.status == 'error'){
                        console.log(response.message);
                        return false;
                    }
                    var hash = response.senderHash;
                    $('.hashseller').val(hash);
                })

                //3º Recuperar bandeira do cartão digitado no sexto caractere
                let ncartao = $(this).val();
                $(".brand").val("");

                if(ncartao.length > 6){
                    let prefix = ncartao.substr(0,6);//pegar 6 primeiros digitos do cartão
                    PagSeguroDirectPayment.getBrand({
                        cardBin: prefix,
                        success: function(response){
                            $(".brand").val(response.brand.name);
                        },
                        error: function(response){
                            alert("Numero do cartão inválido!")
                        }
                    });
                }

            });

            $('.nparcela').on("blur",function(){
                var bandeira = $(".brand").val();
                var totalParcelas = $(this).val();
                if(bandeira == ""){
                    alert("Preencha numero do cartao válido");
                    return;
                }
                //4º Recuperar total de parcelas permitidas de acordo ao valor total
                PagSeguroDirectPayment.getInstallments({
                    amount: $(".totalFinal").val(),
                    maxInstallmentNoInterest: 2, //Apartir de qual parcela permite taxa de juros
                    brand: bandeira,
                    success: function(response){
                        let status = response.error;
                        if(status){
                            alert("Nao foi encontrado opcao de parcelamento")
                            return
                        }
                        let indice = totalParcelas - 1;
                        let totalPagar = response.installments[bandeira][indice].totalAmount;
                        let valorTotalParcela = response.installments[bandeira][indice].installmentAmount;
                        $(".totalParcela").val(valorTotalParcela);
                        $(".totalPagar").val(totalPagar);
                    }
                })
            });

            $('.pagar').on('click',function(){
                var cardNumber = $('.ncredito').val();
                var prefix = cardNumber.substr(0,6);
                var cvv = $('.ncvv').val();
                var expirationYear = $('.nano').val();
                var expirationMonth = $('.nmes').val();
                var hashseller = $('.hashseller').val();
                var brand = $('.brand').val();

                //5º Criar Token do Cartão de Crédito
                PagSeguroDirectPayment.createCardToken({
                    cardNumber,
                    brand,
                    cvv,
                    expirationMonth,
                    expirationYear,
                    success: function(response){
                        $.post('{{route("cart.finish")}}',{
                            _token: '{{csrf_token()}}',
                            hashseller,
                            cardToken: response.card.token,
                            nparcela: $('.nparcela').val(),
                            totalAmount: $('.totalPagar').val(),
                            totalInstallment: $('.totalParcela').val(),
                        }, function(){
                            alert(result)
                        })
                    },
                    error: function(err){
                        alert("Não pode buscar o token do cartão. Verifique")
                        console.log(err)
                    }
                })
            })

        })

    </script>
@endsection

@section('content')
    <form>
        @php $total = 0; @endphp
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $key => $car)
                    <tr>
                        <td>{{$car->nome}}</td>
                        <td>{{$car->valor}}</td>
                    </tr>
                    @php $total += $car->valor; @endphp
                @endforeach
            </tbody>
        </table>

        <input type="text" name="hashseller" class="hashseller" />
        <input type="text" name="hashseller" class="brand" />

        @csrf
        <div class="row">
            <div class="col-12">
                <label for="nome">Nome do responsável</label>
                <input type="text" class="form-control nresp" name="nresp"/>
            </div>
            <div class="col-4">
                <label for="nome">Cartão de Crédito</label>
                <input type="text" class="form-control ncredito" name="ncredito"/>
            </div>
            <div class="col-4">
                <label for="ncvv">CVV</label>
                <input type="text" class="form-control ncvv" name="ncvv"/>
            </div>
            <div class="col-4">
                <label for="nmes">Mês de expiração</label>
                <input type="text" class="form-control nmes" name="nmes"/>
            </div>
            <div class="col-4">
                <label for="nano">Ano de expiração</label>
                <input type="text" class="form-control nano" name="nano"/>
            </div>
            <div class="col-4">
                <label for="nparcela">Parcelas</label>
                <input type="text" class="form-control nparcela" name="nparcela"/>
            </div>
            <div class="col-4">
                <label for="totalFinal">Valor Total</label>
                <input type="text" class="form-control totalFinal" value="{{$total}}" readonly name="totalFinal"/>
            </div>
            <div class="col-4">
                <label for="totalParcela">Valor da Parcela</label>
                <input type="text" class="form-control totalParcela" name="totalParcela"/>
            </div>
            <div class="col-4">
                <label for="totalFinal">Total à pagar</label>
                <input type="text" class="form-control totalPagar" name="totalPagar"/>
            </div>
        </div>
        <input type="button" value="Pagar" class="btn btn-lg btn-success mt-4 pagar" />
    </form>
@endsection
