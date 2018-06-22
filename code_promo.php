<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste des annonces code promo</title>
    </head>
    <body>
        <a href="index.html">MENU</a><br>
        <h3>Liste des annonces code promo</h3>
        <table>
            <tr><td>ID</td><td>Titre</td><td>Code promo</td></tr>
          <?php
            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
            $vSql = "SELECT pseudo, nom, prenom FROM vAnnonceCP";
            $vQuery = pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_NUM)) {
                echo "<tr><td>".$vResult['idAnnonce']."</td><td>".$vResult['titreAnnonce']."</td><td>".$vResult['code']."</tr>";
            }
            pg_close($vConn);
          ?>
      </table>
    </body>
</html>
