<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page User</title>
    </head>
    <body>
      <h1>Utilisateurs</h1>
      <h2>Ajout</h2>
        <form METHOD='POST' ACTION='ajout_utilisateur.php' >
          Pseudo:<br>
          <input type="text" name="pseudo"><br>
          NOM:<br>
          <input type="text" name="nom"><br>
          Prenom:<br>
          <input type="text" name="prenom"><br>
          Date de naissance:<br>
          <input type="date" name="naissance"><br>
          Password:<br>
          <input type="password" name="mdp"><br>
          Adresse:<br>
          N°<input type="number" name="num_adresse">
          Rue<input type="text" name"rue_adresse"><br>
          CP<input type="number" name="cp_adresse">
          Ville<input type="text" name="ville_adresse"><br>
          Pays<input <type="text" name="pays_adresse">
          Type:<br>
          <input type="radio" name="type" value="utilisateur" checked> Utilisateur<br>
          <input type="radio" name="type" value="administrateur"> Administrateur<br>
          <input type="submit" name="ajout_utilisateur">
          <input type="reset">
        </form>
      <h2>Visualisation</h2>
        <FORM METHOD='POST' ACTION='visu_user.php' >
        </form>
        <a href="index.html">MENU</a>
    </body>
</html>
