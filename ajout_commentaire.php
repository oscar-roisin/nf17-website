<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page Ajout Commentaire</title>
    </head>
    <body>
      <?php
      $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
      $vSql ="INSERT INTO commentaire(pseudo, idAnnonce, texte) VALUES ('"$_POST['annonce']"','"$_POST['user']"','"$_POST['commentaire']"');";
      $vQuery=pg_query($vConn, $vSql);
      ?>
      <a href="commentaire.php">Retour Commentaire</a><br>
      <a href="index.html">MENU</a>
    </body>
</html>
