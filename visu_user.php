<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste utilisateurs</title>
    </head>
    <body>
        <table>
            <?php

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

            $vSql ="SELECT * FROM utilisateur";
            $vQuery=pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <tr><td>Nom</td><td>".$vResult[nom]."</td></tr>
                <tr><td>Prenom</td><td>".$vResult[prenom]."</td></tr>
                <tr><td>Date de naissance</td><td>".$vResult[datenaissance]."</td></tr>
                <tr><td>Adresse</td><td>".$vResult[adresse_numero]." ".$vResult[adresse_rue]." ".$vResult[adresse_codepostal]." ".$vResult[adresse_ville]." ".$vResult[adresse_pays]."</td></tr>
                <tr><td>Pays</td><td>".$vResult[adresse_pays]."</td></tr>
                <tr><td>Type</td><td>".$vResult[type]."</td></tr>"
            }
            pg_close($conn)
            ?>
        </table>
    </body>
</html>
