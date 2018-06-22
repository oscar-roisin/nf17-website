<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste des annonces bon application</title>
    </head>
    <body>
        <a href="index.html">MENU</a><br>
        <h3>Liste des annonces bon plan</h3>
        <table>
            <tr><td>ID</td><td>Titre</td><td>Nouveau Prix</td></td>Ancien Prix</td></tr>
          <?php
            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
            $vSql = "SELECT idAnnonce, titreAnnonce, newPrice, initPrice FROM vAnnonceBA";
            $vQuery = pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "<tr><td>".$vResult['idannonce']."</td><td>".$vResult['titreannonce']."</td><td>".$vResult['newprice']."</td><td>".$vResult['initprice']."</td></tr>";
            }
            pg_close($vConn);
          ?>
      </table>
    </body>
</html>
