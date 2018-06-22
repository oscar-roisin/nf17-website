<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page Commentaire</title>
    </head>
    <body>
        <h1> Commentaires </h1>
          <h2> Ajout </h2>
          <FORM METHOD='POST' ACTION='ajout_commentaire.php'>
            Annonce : <br>

            <?php $connexion = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

              $annonce = "SELECT * FROM annonce";
              $vQuery=pg_query($connexion, $annonce);
              echo"<select name='annonce'>";
              while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "<option value=".$vResult[idannonce]."> ".$vResult[titreannonce]."</option>";
                }
              echo"</select>";

              $user = "SELECT * FROM utilisateur";
              $vQuery2=pg_query($connexion, $user);

              echo "<br>Utilisateur : <br>";
              echo"<select name='user'>";
              while ($vResult2 = pg_fetch_array($vQuery2, null, PGSQL_ASSOC)) {
                 echo "<option value=".$vResult2[pseudo]."> ".$vResult2[nom]." ".$vResult2[prenom]."</option>";
                 }
              echo"</select>";
              pg_close($connexion);
            ?>

              <br>
              Commentaire : <br>
              <input type="text" name="commentaire"> <br>
              <input type="submit" name="ajout_commentaire">
              <input type="reset">
            </FORM>
            <a href="index.html">MENU</a>
    </body>
</html>
