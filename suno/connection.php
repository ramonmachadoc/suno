<?php

function connect()
{
    $conn = mysqli_connect("localhost", "dbadmin", "", "suno");

    if (!$conn) {
        echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    return $conn;
}
function save($table, $cols, $data)
{
    $conn = connect();

    $query = "INSERT INTO $table($cols) VALUES($data);";

    if ($conn->query($query) === TRUE) {
    } else {
        echo "Erro: " . $query . " - " . $conn->error . "<br>";
    }
}
function getDividendos($de, $ate,$quant)
{
    $conn = connect();

    $query = "SELECT * FROM proventos WHERE STR_TO_DATE(ult_com,'%d/%m/%Y') between '$de' AND '$ate';";
    $ret = $conn->query($query);
    $ret->data_seek(0);

    $qnt_div = $quant;

    $retorno = array();
    
    if ($ret->num_rows > 0) {
        while ($row = $ret->fetch_assoc()) {
            $tipo = explode(" ",$row['tipo_provento']);
            
            $nome = "";
            
            foreach ($tipo as $key) {
                
                $nome .= substr($key,0,1);
            }
            if($nome == "D"){
                $nome = "Dividendos";
            }
            $line = array(
                'ult_com' =>$row['ult_com'],
                'tipo_provento' =>$nome,
                'valor_provento' =>number_format($row['valor_provento'],5),
                'quantidade' =>$qnt_div,
                'valor_bruto' =>number_format($row['proventos_um'] * $qnt_div * $row['valor_provento'],2),
                'valor_liquido' =>number_format($row['proventos_um'] * $qnt_div * $row['valor_provento'] * .85,2)
            );
            array_push($retorno,$line);
        }
    }
    return $retorno;
}
