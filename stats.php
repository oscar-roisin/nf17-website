<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Statistiques</title>
    </head>
    <body>
		<a href="index.html">MENU</a>
        <table>
            <?php

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

            $vSql ="SELECT COUNT(*) FROM Annonce";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre d'annonces</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) FROM Utilisateur";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre d'utilisateurs</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) FROM Commentaire";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre de commentaires</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) FROM Liker";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre de likes</td><td>".$vResult[0]."</td></tr>";

            echo "</table><br>";

            echo "<h4>Liste des utilisateurs triés par nombre d'annonces postées</h4>";

            $vSql ="SELECT pseudo, COUNT(idannonce) as nbAnnonces FROM Annonce a JOIN Utilisateur u ON a.pseudoUtilisateur=u.pseudo GROUP BY pseudo ORDER BY nbAnnonces";
            $vQuery=pg_query($vConn, $vSql);
            echo "<table><tr><td>Pseudo</td><td>Annonces postées</td></tr>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_NUM)) {
              echo "<tr><td>".$vResult[0]."</td><td>".$vResult[1]."</td></tr>";
              }

            echo "<br><h4>Liste des utilisateurs triés par nombre de commentaires postés</h4>";

            $vSql ="SELECT pseudo, COUNT(idCommentaire) as nbCommentaires FROM Commentaire c JOIN Utilisateur u ON c.pseudo=u.pseudo GROUP BY u.pseudo ORDER BY nbCommentaires";
            $vQuery=pg_query($vConn, $vSql);
            echo "<table><tr><td>Pseudo</td><td>Commentaires postées</td></tr>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_NUM)) {
              echo "<tr><td>".$vResult[0]."</td><td>".$vResult[1]."</td></tr>";
              }
            pg_close($vConn);
            ?>
        </table>
    </body>
</html>
