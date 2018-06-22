<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter un like</title>
    </head>
    <body>

      <a href="index.html">MENU</a>
      <a href="annonce.php">Retour aux annonces</a><br>
      <?php
        $pseudo = $_POST['user'];
        if($_POST['moins1']) {$value = -1; $idannonce = $_POST['moins1'];}
        else {$value =1; $idannonce = $_POST['plus1'];}

        $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
        $vSql = "INSERT INTO Vote VALUES ('".$pseudo."','".$idannonce."','".$value."',now());";
        $vQuery = pg_query($vConn, $vSql);
        pg_close($vConn);

      ?>
      <p>Vote envoyé.</p>

    </body>
</html>
