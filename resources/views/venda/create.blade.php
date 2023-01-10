@extends('layout')

@section('content')
{{-- {{ $errors ?? 'Não tem erro' }} --}}
<div class="container d-flex justify-content-center">
    <div class="container mt-3" style="margin-bottom: 50px;">

    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Cadastrar venda 🛒</h1>
    </div>
    <form action="{{ route ('venda.store') }}" method="POST" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <label> • {{ $error }} </label> <br>
            @endforeach
        </div>
        @endif
        <div class="row g-3">
            <div class="mb-3">
                <label for="Cliente" class="form-label">Cliente</label>
                <select class="form-select" name="cliente" class="form-control" id="cliente" required>
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="Funcionario" class="form-label">Vendedor</label>
                    <select class="form-select" name="funcionario" class="form-control" id="funcionario" required>
                        @foreach ($funcionarios as $funcionario)
                        <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="mb-3">
                    <label for="MetodoPagamento" class="form-label">Método de pagamento</label>
                    <select class="form-select" name="metodoPagamento" class="form-control" id="metodoPagamento" required>
                        <option selected value="Pix">Pix</option>
                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                        <option value="Cartão de Débito">Cartão de Débito</option>
                        <option value="Boleto">Boleto</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Dinheiro vivo">Dinheiro vivo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row g-3">
                <div class="col">
                    <label class="form-label">Produtos vendidos:</label>
                    <table id="lista2"> 
                    </table>
                </div>
        </div>
        <div class="row g-3" style="margin-top: 5px;">
            <div class="col">
                <button style="width: 200px;" type="button" class="botoes btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Adicionar produtos
                </button>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <div class="form-control valorBloco">
                        <label> R$ </label> <input type="text" value="0" name="valorTotal" id="valorTotal" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <label class="form-label">‎</label>
            <button type="submit" class="submitForm botoes btn btn-primary form-control">Enviar</button>
        </div>
        </div>
            <!-- <button type="submit" class="btn btn-primary form-control" id="botaonav">Enviar</button> -->
        </div>
    </form>

    </div>
</div>

<!-- Toast -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay='2500'>
      <div class="toast-header">
        <i class="bi bi-exclamation-octagon rounded me-"></i>
        <strong class="me-auto">&nbsp;&nbsp; ALERTA &nbsp;&nbsp;</strong>
        <small>NOW</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Esse produto já está no carrinho!
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Lista de produtos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul class="list-group" id="lista1">
                {{-- @foreach ($produtos as $produto)
                    <li class="list-group-item conteudolista estilizacaolista" onclick="addItem(this)">{{$produto->nome}} <i class="bi bi-plus-circle"></i> </li>
                @endforeach --}}

                <div class="input-group flex-nowrap" style="margin-bottom: 25px; width: 300px;">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
                    <input type="text" id="filtro" class="form-control" placeholder="Pesquisar" aria-label="Username" aria-describedby="addon-wrapping">
                </div>

                <table id="tabelavendaproduto"> 
                    <tbody>
                    @foreach ($produtos as $produto)
                    <tr> 
                        <td align="center"> {{$produto->nome}} </td>
                        <td align="center"> R$ {{$produto->preco}} </td>
                        <td align="center"> {{$produto->estoque}} (u)</td>
                        <td class="botaoadicionar" onclick="addItem('{{$produto->nome}}','{{$produto->preco}}','{{$produto->estoque}}')"> <i class="bi bi-plus-circle"></i> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <script>
        // function addItem(variavel) {
        //     // var a = $("#lista2");
        //     var a = document.getElementById("lista2");
        //     var candidate = variavel.textContent;
        //     var li = document.createElement("li");

        //     if (document.body.contains(document.getElementById(candidate))) {
        //         Swal.fire({
        //         icon: 'error',
        //         title: 'Oops...',
        //         text: 'Esse produto já está no carrinho!',
        //         });
        //     } else {
        //         // $('<li>'); // cria o elemento em jquery

        //         // $('<li>', {
        //         //     id: caditate,
        //         //     class: '',
        //         //     style: '',
        //         // }); // cria o elemento configurando alguns atributos
        //         // $('<li>').append('input'); // inseri um elemento

        //         li.setAttribute('id', candidate);
        //         li.appendChild(document.createTextNode(candidate));
        //         li.classList.add("list-group-item");
        //         var r= $('<input type="text" name="quantidade[]" style="width: 50px; height: 24px; margin-left: 10px;" class="inputcarrinho"> <i class="bi bi-trash-fill" style="background-color: #ff5757; border-radius: 5px; padding: 5px; margin-left: 10px; cursor: pointer;" onclick="removeItem(this.id)" id="' + candidate + '"></i> <input style="visibility: hidden; width: 1px; height: 1px;" type="text" value="' + candidate + '" name="produto[]">');
        //         a.appendChild(li);
        //         $('#'+candidate).append(r);
        //     }

        // }
 
        // // Creating a function to remove item from list
        // function removeItem(variavel) {
        //     // Declaring a variable to get select element
        //     $('#'+variavel).remove();
        // }

        // $('input[name="quantidade[]"]').on('change', function () {
        //     console.log(this);
        //     console.log($(this).val());
        // });

        function changeValorTotal() {
            let resultado = 0;

            $('input[name="quantidade[]"]').each(function (index, input) {
                resultado += $(input).val() * $(input).data('valor');
            });

            $("#valorTotal").val(resultado);
            // let input = $(this);

            // console.log(input.data('valor') * input.val());
            // $("#valorTotal").val(parseFloat(parseFloat($('#valorTotal').val()) + parseFloat(input.data('valor') * input.val())));
        }

        $('#filtro').on('keyup', function () {
            var search = $(this).val().toLowerCase();
            $('#tabelavendaproduto tbody tr').filter(function(){
                console.log($(this).text());
                $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1);
            });
        })

        $('.submitForm').on('click',function(e){
            var form = $(this).parents('form');
            e.preventDefault();
            if ($("#lista2 tr td").length > 0) {
                var cont = 0;
                $(".inputcarrinho").each(function(){
                    if($(this).val() == "")
                    {
                        if(cont === 0){
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Você precisa colocar a quantidade nos produtos a serem vendidos',
                            });
                            cont++;
                        }
                    }
                })

                // $("#lista2 tr td").each(function(){
                //     var estoque = $(this).find('.textotabela').data('qtd');
                //     var retirada = $(this).find('.inputcarrinho').val();

                //     console.log(estoque + '/' + retirada)

                //     if(estoque < retirada){
                //         console.log('tudo certo')
                //     }
                // })

                if( cont === 0 ){
                    form.submit();
                }
            } else {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Você não pode registrar a venda com o carrinho vazio!',
                });
            };
        });

        var count = 0;

        function addItem(nome, valor, qtd) {

            var verf = 0;
            $("#lista2 tr td").each(function(){
                if($(this).text() == nome){
                    const toastLiveExample = $('#liveToast');
                    const toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()
                    // Swal.fire({
                    // icon: 'error',
                    // title: 'Oops...',
                    // text: 'Esse produto já está no carrinho!',
                    // });
                    verf++;
                };
            });

            if(verf == 0){
                var a = $("#lista2");
                var countcarrinho = 'carrinho' + count;
                
                // Cria o li
                $('<tr>', {
                    id: countcarrinho,
                }).appendTo(a);

                $('<label>', {
                    text: nome,
                    class: 'textotabela',
                    "data-qtd": qtd,
                }).appendTo($('<td>',{align: 'center'}).appendTo("#" + countcarrinho));

                $('<label>', {
                    text: 'R$ ' + valor + ' (u)'
                }).appendTo($('<td>', {style: 'width: 180px', align: 'center'}).appendTo("#" + countcarrinho));

                // Cria o input
                $('<input>', {
                    name: 'quantidade[]',
                    type: 'number',
                    class: 'inputcarrinho',
                    change: changeValorTotal,
                    "data-valor": valor,
                    id: 'inputqtd',
                    style: 'width: 100px; text-align: center;'
                }).appendTo($('<td>', {style: 'width: 100px', align: 'center'}).appendTo("#" + countcarrinho));

                    $("#inputqtd").mask("0000");

                //colocar o nome do produto no array  
                $('<input type="hidden" value="'+nome+'" name="produto[]">').appendTo($('<td>', {style: 'display:none'}).appendTo("#" + countcarrinho));

                // Cria o botãoo de excluir
                $('<i>', {
                    class: 'bi bi-trash-fill',
                }).appendTo($('<td>', {class: 'botaoremover', click: function() {
                    $('#' + countcarrinho).remove();
                    changeValorTotal();
                }}).appendTo("#" + countcarrinho));

                //contador increment
                count++;
            }
        }
    </script>
@endpush