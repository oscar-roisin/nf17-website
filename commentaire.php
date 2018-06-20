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

              $annonce = "SELECT * FROM annonces";
              $vQuery=pg_query($connexion, $annonce);

              while ($row = $resultsetannonce->fetch(PDO::FETCH_ASSOC)) {
	               echo $row['nom'];
	               echo " ";
               }

               $user = "SELECT * FROM utilisateur";
               $resultsetuser = $connexion->prepare($user);
               $resultsetuser->execute();

               while ($row = $resultsetuser->fetch(PDO::FETCH_ASSOC)) {
 	               echo $row['nom'];
 	               echo " ";
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
