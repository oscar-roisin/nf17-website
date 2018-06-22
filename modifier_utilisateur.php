<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Attribuer un Badge </title>
    </head>
    <body>

      <a href="http://tuxa.sme.utc/~nf17p095/">MENU</a>
      <?php

        $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");


        $titre = $_POST['id_badge'];
        $pseudo = $_POST['id_user'];

        $vSql = "INSERT INTO dateBadge(titreBadge, pseudo )
                  values('$titre', '$pseudo') ;"    ;


        if(!$vQuery = pg_query($vConn, $vSql)){
            echo "Erreur dans l'ajout du badge";
        }
        else {
            echo "Badge correctement attribué";
        }

        pg_close($vConn);

      ?>
    </body>
</html>
