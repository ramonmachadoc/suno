<?php
include_once('simple_html_dom.php');

require('connection.php');

$acao = $_POST["acao"];
$qntd = $_POST["qntd"];
$inicio = $_POST["inicio"];
$fim = $_POST["fim"];

$url = 'http://bvmf.bmfbovespa.com.br/Cias-Listadas/Empresas-Listadas/ResumoProventosDinheiro.aspx?codigoCvm=21610&tab=3.1&idioma=pt-br';
$html = file_get_html($url);
$table = $html->find("table", 0);

$dados = "";
$i = 0;

foreach ($table->find('tr') as $row) {

    foreach ($row->find('td') as $cell) {

        if ($i == 2 || $i == 3 || $i == 7 || $i == 8 || $i == 9) {

            $dados .= str_replace(",", ".", $cell->innertext) . ",";
        } else {
            $dados .= "'" . $cell->innertext . "',";
        }
        $i++;
    }
    $dados = substr($dados, 0, -1);

    $i = 0;

    if (strlen($dados) > 0) {
        // save("proventos","tipo_ativo, data_aprovacao, valor_provento, proventos_um, tipo_provento, ult_com,data_ult_preco, ult_preco_com, preco_um, provento_preco",$dados);
    }

    $dados = "";
}

$regs = getDividendos($inicio, $fim, $qntd);
if (sizeof($regs) > 0) {
    $resultado .= '<table>';
    $resultado .= '    <tr>';
    $resultado .= '        <td>DATA EX</td>';
    $resultado .= '        <td>TIPO DE PROVENDO</td>';
    $resultado .= '        <td>QUANTIDADE DE AÇÕES</td>';
    $resultado .= '        <td>VALOR POR AÇÃO</td>';
    $resultado .= '        <td>DATA DO PAGAMENTO</td>';
    $resultado .= '        <td>VALOR BRUTO</td>';
    $resultado .= '        <td>VALOR LÍQUIDO</td>';
    $resultado .= '    </tr>';
    foreach ($regs as $reg) {
        $resultado .= "<tr>";
        $resultado .= "<td>" . $reg['ult_com'] . "</td>";
        $resultado .= "<td>" . $reg['tipo_provento'] . "</td>";
        $resultado .= "<td>" . $reg['valor_provento'] . "</td>";
        $resultado .= "<td>" . $reg['quantidade'] . "</td>";
        $resultado .= "<td>" . $reg['ult_com'] . "</td>";
        $resultado .= "<td>" . $reg['valor_bruto'] . "</td>";
        $resultado .= "<td>" . $reg['valor_liquido'] . "</td>";
        $resultado .= "</tr>";
    }

    $resultado .= '</table>';
}
