<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter une Annonce</title>
    </head>
    <body>

      <a href="http://tuxa.sme.utc/~nf17p095/">MENU</a>
      <?php

        $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

        $type = $_POST['type_annonce'];
        $titre = $_POST['titre_annonce'];
        $description = $_POST['description_annonce'];
        $categorie = $_POST['categorie_annonce'];
        $enseigne = $_POST['enseigne_annonce'];
        $lien = $_POST['lien_annonce'];
        $date_debut = $_POST['date_debut_annonce'];
        $date_expiration = $_POST['date_expiration_annonce'];

        $etat = TRUE ;
        $active = TRUE;
        $compteur = 0;

        $code = $_POST['code_annonce'];
        $new_price = $_POST['new_price_annonce'];
        $old_price = $_POST['old_price_annonce'];
        $port = $_POST['port_annonce'];

        $image = $_POST['photo_annonce'];

        if($code == -1){
          $vSql = "INSERT INTO annonce(titreannonce, descriptionannonce, categorie,nomenseigne, type, lien,datedebut, dateexpiration, etat, active, compteur,
                      newPrice, initPrice, fraisPort, photo)
                    values('$titre ', '$description', '$categorie', '$enseigne', '$type', '$lien', '$date_debut', '$date_expiration', '$etat', '$active', '$compteur',
                          '$new_price', '$old_price', '$port', '$image') ;"    ;
        }
        else{
          $vSql = "INSERT INTO annonce(titreannonce, descriptionannonce, categorie,nomenseigne, type, lien,datedebut, dateexpiration, etat, active, compteur,
                      code, photo)
                    values('$titre ', '$description', '$categorie', '$enseigne', '$type', '$lien', '$date_debut', '$date_expiration', '$etat', '$active', '$compteur',
                          '$code', '$image') ;"    ;
        }

        $vQuery = pg_query($vConn, $vSql);

        pg_close($vConn);

      ?>
    </body>
</html>
