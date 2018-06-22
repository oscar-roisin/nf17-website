<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page User</title>
    </head>
    <body>
		<a href="index.html">MENU</a>
      <h1>Utilisateurs</h1>
      <h2>Ajout</h2>
        <form METHOD='POST' ACTION='ajout_utilisateur.php' >
          Pseudo:<br>
          <input type="text" name="pseudo" required><br>
          NOM:<br>
          <input type="text" name="nom" required><br>
          Prenom:<br>
          <input type="text" name="prenom" required><br>
          Date de naissance:<br>
          <input type="date" name="naissance"><br>
          Password:<br>
          <input type="password" name="mdp" required><br>
          Adresse:<br>
          N°<input type="number" name="num_adresse">
          Rue<input type="text" name="rue_adresse"><br>
          CP<input type="number" name="cp_adresse">
          Ville<input type="text" name="ville_adresse"><br>
          Pays<input <type="text" name="pays_adresse"><br>
          Type:<br>
          <input type="radio" name="type" value="Utilisateur" checked> Utilisateur<br>
          <input type="radio" name="type" value="Administrateur"> Administrateur<br>
          <input type="submit" name="ajout_utilisateur">
          <input type="reset">
        </form>
      <h2>Visualisation</h2>
        <FORM METHOD='POST' ACTION='visu_user.php' >
          <?php
          $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
          $vSql ="SELECT * FROM utilisateur";
          $vQuery=pg_query($vConn, $vSql);
          echo"<select name='user'>";
          while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
            echo "<option value=".$vResult['pseudo'].">".$vResult['nom']." ".$vResult['prenom']." (".$vResult['pseudo'].")</option>";
            }
            echo"</select>";
          pg_close($vConn);
          ?>
          <input type="submit" name="visu_utilisateur">
        </form>
    </body>
</html>
