<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page Ajout Commentaire</title>
    </head>
    <body>
	<a href="index.html">MENU</a>
	<a href="commentaire.php">Retour Commentaire</a><br>
      <?php
      $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
      $vSql ="INSERT INTO commentaire(pseudo, idAnnonce, texte) VALUES ('".$_POST['user']."','".$_POST['annonce']."','".$_POST['commentaire']."');";
      if(!$vQuery=pg_query($vConn, $vSql)){
          echo "Erreur dans l'ajout du commentaire";
      }
      else{
          echo "Commentaire coment ajouté";
      }
      ?>


    </body>
</html>
