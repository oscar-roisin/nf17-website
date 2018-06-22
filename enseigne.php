<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page Enseigne</title>
    </head>
    <body>
      <h1>Enseignes</h1>
      <h2>Ajout</h2>
        <form METHOD='POST' ACTION='ajout_enseigne.php' >
          Nom de l'enseigne:<br>
          <input type="text" name="nomenseigne"><br>
          Site web:<br>
          <input type="text" name="website"><br>
          Email:<br>
          <input type="email" name="email"><br>
          Telephone:<br>
          <input type="tel" name="telephone"><br>
          Adresse:<br>
          N°<input type="number" name="localisationnumero">
          Rue<input type="text" name="localisationrue"><br>
          Code Postal<input type="number" name="localisationcodepostal">
          Ville<input type="text" name="localisationville"><br>
          Pays<input <type="text" name="localisationpays"><br>
          <input type="submit" name="ajout_enseigne">
          <input type="reset">
        </form>
      <h2>Visualisation</h2>
        <FORM METHOD='POST' ACTION='visu_enseigne.php' >
          <?php
          $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
          $vSql ="SELECT * FROM enseigne";
          $vQuery=pg_query($vConn, $vSql);
          echo"<select name='nomenseigne'>";
          while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
            echo "<option value='".$vResult['nomenseigne']."'>".$vResult['nomenseigne']."</option>";
            }
            echo"</select>";
          pg_close($vConn);
          ?>
          <input type="submit" name="visu_enseigne">
        </form>
        <a href="index.html">MENU</a>
    </body>
</html>
