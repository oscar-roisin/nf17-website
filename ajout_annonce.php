<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter une Annonce</title>
    </head>
    <body>

      <a href="index.html">MENU</a>
      <?php

      $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

      $vSql ="INSERT INTO utilisateur(titreannonce, descriptionannonce, categorie,nomenseigne,lien,datedebut, dateexpiration)
                    values('$_POST['titre_annonce']', $_POST['description_annonce'],$_POST['categorie_annonce'],$_POST['enseigne_annonce'],
                          $_POST['lien_annonce'], $_POST['date_debut_annonce'], $_POST['date_expiration_annonce'])
      ";

      $vSql =""INSERT INTO utilisateur(titreannonce, descriptionannonce, categorie,nomenseigne,lien,datedebut, dateexpiration)
                    values($_POST['titre_annonce'], $_POST['description_annonce'],$_POST['categorie_annonce'],$_POST['enseigne_annonce'],
                          $_POST['lien_annonce'], $_POST['date_debut_annonce'], $_POST['date_expiration_annonce'])""
      ;
      $vQuery=pg_query($vConn, $vSql);

      pg_close($vConn);
      ?>
    </body>
</html>
