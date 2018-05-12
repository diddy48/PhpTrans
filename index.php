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
    $conn->query('START TRANSACTION');
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $prezzo = filter_input(INPUT_POST, "prezzo", FILTER_SANITIZE_NUMBER_INT);
    $nome = strip_tags($nome);
    $query = $conn->query("INSERT INTO `prodotti`(`NomeProdotto`, `Quantita`) VALUES (" . $nome . "," . $prezzo . ")");
    $conn->query('COMMIT');
    if($query) echo '<script>alert()</script>';
    else echo "errore";
}
?>
<script type="text/javascript">
function alert(){
    confirm("ciao");
}
</script>