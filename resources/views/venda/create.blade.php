@extends('layout')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="container mt-3" style="margin-bottom: 50px;">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-size: 20px;">
                <li class="breadcrumb-item"><a href="{{route('inicial.index')}}" style="color: red !important;">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{route('venda.index')}}" style="color: red !important;">Vendas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Realizar venda</li>
            </ol>
        </nav>
    <div style="margin-bottom: 50px; border-radius: 25px; background-color: #ff5757; height: 100px"> 
            <h1 style="color: white; text-align: center; padding-bottom: 25px; padding-top: 25px;"> Cadastrar venda 🛒</h1>
    </div>
    <form action="{{ route ('venda.store') }}" method="POST" style="background-color: #e9f2f9; border: 3px solid #ff5757; border-radius: 25px; padding: 25px;" class="needs-validation">
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
                    <label for="Vendedor" class="form-label">Vendedor</label>
                    <select class="form-select" name="Vendedor" class="form-control" id="Vendedor" required>
                        @foreach ($Vendedores as $Vendedor)
                        <option value="{{$Vendedor->id}}">{{$Vendedor->nome}}</option>
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
            <button type="submit" class="submitForm botoes btn btn-primary form-control">Realizar venda</button>
        </div>
        </div>
        </div>
    </form>

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
        function changeValorTotal() {
            let resultado = 0;

            $('input[name="quantidade[]"]').each(function (index, input) {
                resultado += $(input).val() * $(input).data('valor');
            });

            $("#valorTotal").val(resultado);
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

                if($("#cliente option:selected").val() == undefined){
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Você precisa selecionar o cliente!',
                    });

                    cont ++;
                }

                if($("#Vendedor option:selected").val() == undefined){
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Você precisa selecionar o vendedor!',
                    });

                    cont ++;
                }

                $('#lista2 > tr').each(function () {
                    let tr = $(this)
                    let qtdOriginal = tr.find('td > label[data-qtd]').data('qtd');
                    let qtdInformada = tr.find('td > input[name="quantidade[]"]').val();
                    
                    if (qtdInformada <= 0 || (qtdInformada > qtdOriginal)) {
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Verifique o estoque disponível dos itens a serem vendidos!',
                        });
                        cont ++;
                    }
                });

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
                    Toastify({
                    text: "Esse produto já está no carrinho!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    style: {
                        margintop: '250px',
                        background: 'rgb(255,213,93)',
                        color: 'black',
                    }
                    }).showToast();
                    verf++;
                };
            });

            if(verf == 0){
                Toastify({
                text: "Produto adicionado ao carrinho com sucesso!",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    margintop: '250px',
                    background: 'rgb(63,156,53)',
                }
                }).showToast();


                var a = $("#lista2");
                var countcarrinho = 'carrinho' + count;
                
                // Cria o li
                $('<tr>', {
                    id: countcarrinho,
                }).appendTo(a);

                $('<label>', {
                    text: nome,
                    class: 'textotabela textolinha',
                    "data-qtd": qtd
                }).appendTo($('<td>',{align: 'center'}).appendTo("#" + countcarrinho));
                
                $('<label>', {
                    text: 'R$ ' + valor + ' (u)',
                    class: 'textolinha'
                }).appendTo($('<td>', {style: 'width: 180px', align: 'center'}).appendTo("#" + countcarrinho));

                $('<label>', {
                    text: 'Estoque disponível: ' + qtd,
                    class: 'textolinha'
                }).appendTo($('<td>',{align: 'center', style:'width: 250px'}).appendTo("#" + countcarrinho));


                // Cria o input
                $('<input>', {
                    name: 'quantidade[]',
                    type: 'number',
                    class: 'inputcarrinho form-control',
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