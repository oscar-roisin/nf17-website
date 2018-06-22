<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Attribuer un Badge</title>
    </head>
    <body>
      <a href="http://tuxa.sme.utc/~nf17p095/">MENU</a>

      <h1>Attribuer un Badge</h1>
      <form method="post" action="modifier_utilisateur.php">

        <p>
            <?php
              $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
              $vSql ="SELECT * FROM badge";
              if(!$vQuery = pg_query($vConn, $vSql)){
                  echo "Erreur dans l'execution de la requête";
              }


              echo"<p> Badge : <select name='id_badge'>";
              while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                $titre = $vResult['titrebadge'];
                $desc = $vResult['descriptionbadge'];
                echo "<option value='".$vResult['titrebadge']."'> " .$vResult['titrebadge']. " </option>";
                }
                echo"</select> </p>";

              $vSql ="SELECT * FROM utilisateur";
              if(!$vQuery = pg_query($vConn, $vSql)){
                  echo "Erreur dans l'execution de la requête";
              }
              echo"<p> Utilisateur : <select name='id_user'>";
              while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "<option value='".$vResult['pseudo']."'>".$vResult['pseudo']." </option>";
                }
                echo"</select></p>";

              pg_close($vConn);
            ?>

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
