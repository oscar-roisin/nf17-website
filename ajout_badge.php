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

        $titre = $_POST['titre_badge'];
        $description = $_POST['description_badge'];
        $logo = $_POST['logo_badge'];
        $duree = $_POST['duree_badge'];
        $definitif = 0;
        $vSql = "INSERT INTO badge(titreBadge, descriptionBadge, logo, duree, definitif )
                  values('$titre', '$description', '$logo', '$duree', '$definitif') ;"    ;


        $vQuery = pg_query($vConn, $vSql);

        pg_close($vConn);

      ?>
    </body>
</html>
