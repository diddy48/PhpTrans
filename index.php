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
    $nome = filter_input(INPUT_POST, "nome");
    $prezzo = filter_input(INPUT_POST, "prezzo");
    $nome = strip_tags($nome);
    $query = $conn->query("INSERT INTO `prodotti`(`NomeProdotto`, `Prezzo`) VALUES ('" . $nome . "','" . $prezzo . "')");
    if ($query) {
        echo '<script>'
        . 'var c = confirm("Sei sicuro?");'
        . 'if(c==true)'.$conn->commit()
        . '</script>';
    } else
        echo "errore";
}
?>
<script type="text/javascript">
function conferma(){
    confirm("ciao");
}
</script>