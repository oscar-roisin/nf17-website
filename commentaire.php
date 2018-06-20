<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page Commentaire</title>
    </head>
    <body>
        <h1> Commentaires </h1>
          <h2> Ajout </h2>

              <?php $connexion = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

              $annonce = "SELECT * FROM annonce";
              $vQuery=pg_query($connexion, $annonce);

              while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <tr><td>Nom</td><td>".$vResult[titre]."</td></tr>
                <tr><td>Prenom</td><td>".$vResult[description]."</td></tr>"
                }
}

               $user = "SELECT * FROM utilisateur";
               $vQuery2=pg_query($connexion, $user);
               while ($vResult2 = pg_fetch_array($vQuery2, null, PGSQL_ASSOC)) {
               echo "
               <tr><td>Nom</td><td>".$vResult2[nom]."</td></tr>
               <tr><td>Prenom</td><td>".$vResult2[prenom]."</td></tr>
               <tr><td>Date de naissance</td><td>".$vResult2[datenaissance]."</td></tr>"
             }
               ?>

            <FORM METHOD='POST' ACTION='ajout_commentaire.php'>
              Annonce : <br>
              <input type="number" name="annonce"> <br>
              Utilisateur : <br>
              <input type="text" name="user"> <br>
              Commentaire : <br>
              <input type="text" name="commentaire"> <br>
              <input type="submit" name="ajout_commentaire">
              <input type="reset">
            </FORM>

    </body>
</html>
