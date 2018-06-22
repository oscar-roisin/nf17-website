<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste utilisateurs</title>
    </head>
    <body>
			<a href="index.html">MENU</a>
			<a href="user.php">Retour Utilisateur</a><br>
            <?php

            $pseudo = $_POST['user'];

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

            $vSql ="SELECT * FROM utilisateur WHERE pseudo LIKE '".$pseudo."'";
            $vQuery=pg_query($vConn, $vSql);
			echo "<h2>Utilisateur</h2>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <table>
                <tr><td>Pseudo</td><td>".$vResult['pseudo']."</td></tr>
                <tr><td>Nom</td><td>".$vResult['nom']."</td></tr>
                <tr><td>Prenom</td><td>".$vResult['prenom']."</td></tr>
                <tr><td>Date de naissance</td><td>".$vResult['datenaissance']."</td></tr>
                <tr><td>Adresse</td><td>".$vResult['adresse_numero']." ".$vResult['adresse_rue']." ".$vResult['adresse_codepostal']." ".$vResult['adresse_ville']."</td></tr>
                <tr><td>Pays</td><td>".$vResult['adresse_pays']."</td></tr>
                <tr><td>Type</td><td>".$vResult['type']."</td></tr>
                </table>";
            }
			echo "<h2>Badges</h2>";
			$vSql ="SELECT * FROM datebadge LEFT OUTER JOIN badge ON datebadge.titrebadge LIKE badge.titrebadge WHERE pseudo LIKE '".$pseudo."'";
            $vQuery=pg_query($vConn, $vSql);
			while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <table>
                <tr><td>Titre</td><td>".$vResult['titrebadge']."</td></tr>
                <tr><td>Description</td><td>".$vResult['descriptionbadge']."</td></tr>
                <tr><td>Date Obtention</td><td>".$vResult['dateobtention']."</td></tr>
                </table><br>------------------------------------------------------------------------------------<br>";
            }
            pg_close($vConn);
            ?>
    </body>
</html>
