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
            <input name="descrizione" placeholder="Descrizione" value ="Descr"/><br>
            <input type="radio" name="behaviour" value="commit"> Commit<br>
            <input type="radio" name="behaviour" value="abort" > Abort<br>
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
    $descrizione = filter_input(INPUT_POST, "descrizione");
    for ($i = 1; $i < 10000; $i++) {
        $conn->query("INSERT INTO `prodotti`(`NomeProdotto`, `Prezzo`,`Descrizione`) VALUES ('" . $nome . "','" . $prezzo . "','" . $descrizione . "')");
    }
    if ($_POST['behaviour'] == 'commit') {
            $conn->commit();
            echo "Query eseguita con successo";
    } else
        echo "La query è stata abortita";
}
?>