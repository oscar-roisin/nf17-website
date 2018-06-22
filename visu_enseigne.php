<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste utilisateurs</title>
    </head>
    <body>
			<a href="index.html">MENU</a>
			<a href="enseigne.php">Retour Enseigne</a><br>
            <?php

            $nomenseigne = $_POST['nomenseigne'];

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

            $vSql ="SELECT * FROM enseigne WHERE nomenseigne LIKE '".$nomenseigne."'";
            $vQuery=pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <table>
                <tr><td>Nom</td><td>".$vResult['nomenseigne']."</td></tr>
                <tr><td>Web</td><td><a href='".$vResult['website']."'>".$vResult['website']."</a></td></tr>
                <tr><td>Mail</td><td>".$vResult['email']."</td></tr>
                <tr><td>Telephone</td><td>".$vResult['telephone']."</td></tr>
                <tr><td>Adresse</td><td>".$vResult['localisationnumero']." ".$vResult['localisationrue']." ".$vResult['localisationcodepostal']." ".$vResult['localisationville']."</td></tr>
                <tr><td>Pays</td><td>".$vResult['localisationpays']."</td></tr>
                </table>";
            }
            pg_close($vConn);
            ?>
    </body>
</html>
