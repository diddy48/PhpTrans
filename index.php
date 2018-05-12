<!DOCTYPE html>
<?php
include "dbconnection.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <input name="nome" placeholder="Nome prodotto"/>
            <input name="prezzo" placeholder="Prezzo"/>
            <input type="submit" name="insertProd">
        </form>
    </body>
</html>
<?php
if (isset($_POST['insertProd'])) {
    $conn->begin_transaction();
    //$conn->autocommit(FALSE);
    $nome = filter_input(INPUT_POST, "nome");
    $prezzo = filter_input(INPUT_POST, "prezzo");
    $query = $conn->query("INSERT INTO `prodotti`(`NomeProdotto`, `Prezzo`) VALUES ('" . $nome . "','" . $prezzo . "')");
    if ($query) {
        echo
        '<script>'
        . 'var c = confirm("Sei sicuro?");'
        . 'if(c==true){'
                . '$.ajax({'
                . 'url : "index.php", data : "commitReady=true",dataType : "json",'
                . '});'
        . '}'
        . 'else location.href="index.php?commitReady=false";'
        . '</script>';
    } else
        echo "Errore";
}
if (isset($_GET['commitReady'])) {
    if ($_GET['commitReady'] === true) {
        if ($conn->commit()) {
            echo "Prodotto inserito con successo";
        } else {
            echo "Si è rilevato un errore";
        }
    } else {
        echo "Hai annullato l'operazione";
    }
}
?>