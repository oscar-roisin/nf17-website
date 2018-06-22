<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Statistiques</title>
    </head>
    <body>
        <table>
            <?php

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

            $vSql ="SELECT COUNT(*) AS nbAnnonces FROM Annonce";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC);
            echo "<tr><td>Nombre d'annonces</td><td>".$vResult[nbAnnonces]."</td></tr>";

            $vSql ="SELECT COUNT(*) AS nbUtilisateurs FROM Utilisateur";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC);
            echo "<tr><td>Nombre d'utilisateurs</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) AS nbCommentaires FROM Commentaire";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC);
            echo "<tr><td>Nombre de commentaires</td><td>".$vResult."</td></tr>";

            $vSql ="SELECT COUNT(*) AS nbLikes FROM Liker";
            $vQuery=pg_query($vConn, $vSql);
            $vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC);
            echo "<tr><td>Nombre de likes</td><td>".$vResult['nbLikes']."</td></tr>";

            pg_close($vConn);
            ?>
        </table>
        <a href="index.html">MENU</a>
    </body>
</html>
