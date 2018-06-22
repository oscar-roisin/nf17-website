<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter un Badge</title>
    </head>
    <body>
      <a href="http://tuxa.sme.utc/~nf17p095/">MENU</a>

      <h1>Ajouter un Badge</h1>
      <form method="post" action="ajout_badge.php">

        <p>
          <label for="titre_badge"> Titre du Badge : </label>
          <input type="text" name="titre_badge" id="titre_badge" maxlength="30" required  />
        </p>
        <p>
          <label for="description_badge"> Description du Badge : </label>
          <input type="text" name="description_badge" id="description_badge" required/>
        </p>

        <p>
          <label class = "duree_badge" for="duree_badge"> Nombre de Jour avant Expiration : </label>
          <input class = "duree_badge" type="number" name="duree_badge" id="duree_badge" placeholder=0>
        </p>


        <input type="submit" value="Envoyer" />
      </form>


      </script>

      <!-- <h1>Visualisation</h1>
        <FORM METHOD='POST' ACTION='visu_annonce.php' >
          <?php /*
          $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
          $vSql ="SELECT * FROM annonce";
          $vQuery=pg_query($vConn, $vSql);
          echo"<select name='id'>";
          while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
            echo "<option value=".$vResult['idannonce'].">".$vResult['titreannonce']." </option>";
            }
            echo"</select>";
          pg_close($vConn);
          */
          ?>
          <input type="submit" name="visu_annonce">
        </form> -->

    </body>
</html>
