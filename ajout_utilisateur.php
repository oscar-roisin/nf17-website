<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Page Ajout User</title>
    </head>
    <body>
      <?php
      $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
      $vSql ="INSERT INTO utilisateur(pseudo, nom, prenom, datenaissance, mdp, adresse_numero, adresse_rue, adresse_codepostal,
          adresse_ville, adresse_pays, type) VALUES ('"$_POST['pseudo']"','"$_POST['nom']"','"$_POST['prenom']"','"$_POST['naissance']"',
              '"$_POST['mdp']"','"$_POST['num_adresse']"','"$_POST['rue_adresse']"','"$_POST['cp_adresse']"','"$_POST['ville_adresse']"','"$_POST['pays_adresse']"','"$_POST['type']"')";
      $vQuery=pg_query($vConn, $vSql);
      ?>
      <a href="user.php">Retour Utilisateur</a><br>
      <a href="index.html">MENU</a>
    </body>
</html>
