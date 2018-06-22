<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter un signalement</title>
    </head>
    <body>

      <a href="index.html">MENU</a>
      <a href="annonce.php">Retour aux annonces</a><br>
      
      <?php
        $pseudo = $_POST['user'];
        $raison = $_POST['raison_signalement'];
        $idcommentaire = $_POST['idcommentaire'];

        $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
        $vSql = "INSERT INTO Signaler (pseudo, idCommentaire, raison) VALUES ('".$pseudo."', '".$idcommentaire."','".$raison."');";
        $vQuery = pg_query($vConn, $vSql);
        pg_close($vConn);

      ?>

      <p>Commentaire signalé.</p>
    </body>
</html>
