<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <script type="text/javascript" src="js/funcoes.js"></script>
    <HTML>

    <HEAD>
        <TITLE>Suno Research</TITLE>
    </HEAD>

<BODY onload="getToday()">
    <?php
    require('rn.php');

    ?>
    <div class="header">
        <h1 class="title">Relações com Investidores</h1>
    </div>
    <div class="body">
        <h2 class="main-title">Calculadora de Dividendos</h2>
        <div class="form">
            <form method="post">
                <div class="row">
                    <div class="col-4">
                        <label for="acao">Ação</label>
                    </div>
                    <div class="col-4">
                        <label for="qntd">Quantidade de ações</label>
                    </div>
                    <div class="col-4">
                        <label for="inicio">Data inicial</label>
                    </div>
                    <div class="col-4">
                        <label for="fim">Data final</label>
                    </div>
                    <div class="col-4"></div>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-input" name="acao" id="acao">
                                <option value="B3SA3">B3SA3</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <input class="form-input" name="qntd" type="number" min="0" value="100">
                        </div>
                        <div class="col-4">
                            <input class="form-input" name="inicio" type="date" id="todayFrom">
                        </div>
                        <div class="col-4">
                            <input class="form-input" name="fim" type="date" id="todayTo">
                        </div>
                        <div class="col-4">
                            <input type="submit" value="Calcular">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="tabela" class="tabela">
            <div class="row">

            <?php
            echo $resultado;
            ?>
            </div>
        </div>
    </div>
    <div class="footer">

    </div>
</BODY>

</HTML>