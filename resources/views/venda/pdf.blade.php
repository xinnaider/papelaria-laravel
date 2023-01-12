<style>
    @page { margin: 0px; }
    body { background: #ffffe0; margin: 0px; }

   .text-center {
    text-align: center;
    }
    .ttu {
    text-transform: uppercase;
    }
    .printer-ticket {
    padding:10px;
    background: #ffffe0;
    display: table !important;
    width: 100%;
    max-width: 400px;
    font-weight: light;
    line-height: 1.3em;
    }
    .printer-ticket,
    .printer-ticket * {
    font-family: Tahoma, Geneva, sans-serif;
    font-size: 10px;
    }
    .printer-ticket th:nth-child(2),
    .printer-ticket td:nth-child(2) {
    width: 50px;
    }
    .printer-ticket th:nth-child(3),
    .printer-ticket td:nth-child(3) {
    width: 90px;
    text-align: right;
    }
    .printer-ticket th {
    font-weight: inherit;
    padding: 10px 0;
    text-align: center;
    border-bottom: 1px dashed #BCBCBC;
    }
    .printer-ticket tbody tr:last-child td {
    padding-bottom: 10px;
    }
    .printer-ticket tfoot .sup td {
    padding: 10px 0;
    border-top: 1px dashed #BCBCBC;
    }
    .printer-ticket tfoot .sup.p--0 td {
    padding-bottom: 0;
    }
    .printer-ticket .title {
    font-size: 1.5em;
    padding: 15px 0;
    }
    .printer-ticket .top td {
    padding-top: 10px;
    }
    .printer-ticket .last td {
    padding-bottom: 10px;
    }
</style>
<body>
    <table class="printer-ticket">
        <thead>
            <tr>
                <th class="title" colspan="3">Papeleria Cia.</th>
            </tr>
            <tr>
                <th colspan="3">{{ $venda->dataHora->format('d-m-Y - H:i:s') }}</th>
            </tr>
            <tr>
                <th colspan="3">
                    {{$venda->cliente->nome}} <br />
                    {{$venda->cliente->cpf}}
                </th>
            </tr>
            <tr>
                <th class="ttu" colspan="3">
                    <b>Cupom não fiscal</b>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venda->produtosVenda as $produtos)
            <tr class="top">
                <td colspan="3">{{$produtos->produto->nome}}</td>
            </tr>
            <tr>
                <td>R$ {{$produtos->produto->preco}}</td>
                <td>{{$produtos->quantidade}}</td>
                <td>R$ {{floatval($produtos->quantidade) * floatval($produtos->produto->preco)}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="sup ttu p--0">
                <td colspan="3">
                    <b>Total</b>
                </td>
            </tr>
            <tr class="ttu">
                <td colspan="2">Sub-total</td>
                <td align="right">R$ {{$venda->valorTotal}}</td>
            </tr>
            <tr class="ttu">
                <td colspan="2">Total</td>
                <td align="right">R$ {{$venda->valorTotal}}</td>
            </tr>
            <tr class="sup ttu p--0">
                <td colspan="3">
                    <b>Pagamento</b>
                </td>
            </tr>
            <tr class="ttu">
                <td colspan="2">{{$venda->metodoPagamento}}</td>
                <td align="right">R$ {{$venda->valorTotal}}</td>
            </tr>
            <tr class="ttu">
                <td colspan="2">Total pago</td>
                <td align="right">R$ {{$venda->valorTotal}}</td>
            </tr>
            <tr class="sup">
                <td colspan="3" align="center">
                    <b>Pedido:</b>
                </td>
            </tr>
            <tr class="sup">
                <td colspan="3" align="center">
                    www.papelariacia.com
                </td>
            </tr>
        </tfoot>
    </table>
</body>