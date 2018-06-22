<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste des administrateurs</title>
    </head>
    <body>
        <a href="index.html">MENU</a><br>
        <h3>Liste des administrateurs</h3>
        <table>
            <tr><td>Pseudo</td><td>Nom</td><td>Prénom</td></tr>
          <?php
            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
            $vSql = "SELECT pseudo, nom, prenom FROM vUtilAdmin";
            $vQuery = pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_NUM)) {
                echo "<tr><td>".$vResult['pseudo']."</td><td>".$vResult['nom']."</td><td>".$vResult['prenom']."</tr>";
            }
            pg_close($vConn);
          ?>
      </table>
    </body>
</html>
