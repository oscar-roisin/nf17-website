<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page Ajout Enseigne</title>
    </head>
    <body>
		<a href="index.html">MENU</a>
		<a href="enseigne.php">Retour Utilisateur</a><br>
      <?php
      $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
      $vSql ="INSERT INTO enseigne (nomenseigne, website, email, telephone, localisationrue, localisationcodepostal, localisationville, localisationpays) VALUES
       ('".$_POST['nomenseigne']."','".$_POST['website']."','".$_POST['email']."','".$_POST['telephone']."','".$_POST['localisationrue']."','".$_POST['localisationcodepostal']."','".$_POST['localisationville']."','".$_POST['localisationpays']."')";
      $vQuery=pg_query($vConn, $vSql);
      ?>
      
    </body>
</html>
