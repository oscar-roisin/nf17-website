<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter une Annonce</title>
    </head>
    <body>

      <a href="http://tuxa.sme.utc/~nf17p095/">MENU</a>
      <a href="badge.php">Retour badge</a>
      <?php

        $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

        $titre = $_POST['titre_badge'];
        $description = $_POST['description_badge'];
        $duree = $_POST['duree_badge'];
        if ($duree<0)
          $duree=0;
        if ($duree=0)
          $definitif = 'true';
        else $definitif='false';

        $vSql = "INSERT INTO badge(titreBadge, descriptionBadge, duree, definitif )
                  values('".$titre."', '".$description."', '".$duree."', '".$definitif."') ;"    ;


        if(!$vQuery = pg_query($vConn, $vSql)){
            echo "Erreur dans l'ajout du badge";
        }
        else{
            echo "Badge correctement ajouté";
        }

        pg_close($vConn);

      ?>
    </body>
</html>
