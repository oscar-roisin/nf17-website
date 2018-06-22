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

            $vSql ="SELECT COUNT(*) AS nbAnnonces FROM Annonce";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre d'annonces</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) AS nbUtilisateurs FROM Utilisateur";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre d'utilisateurs</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) AS nbCommentaires FROM Commentaire";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre de commentaires</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) AS nbLikes FROM Liker";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre de likes</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT pseudo, COUNT(idannonce) AS nbAnnonces FROM Annonce a JOIN Utilisateur u ON a.pseudoUtilisateur=u.pseudo GROUP BY pseudo";
            $vQuery=pg_query($vConn, $vSql);
            echo "<table><tr><td>Pseudo</td><td>Annonces postées</td></tr>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
              echo "<tr><td>".$vResult['pseudo']."</td><td>".$vResult['nbAnnonces']."</td></tr>";
              }
            echo "</table>";
            pg_close($vConn);
            ?>
        </table>
    </body>
</html>
