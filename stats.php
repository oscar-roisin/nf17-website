<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Statistiques</title>
    </head>
    <body>
		<a href="index.html">MENU</a><br>
        <table>
            <?php

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");

            $vSql ="SELECT COUNT(*) FROM Annonce";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre d'annonces</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) FROM Vote";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre de votes</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) FROM Utilisateur";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre d'utilisateurs</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) FROM Commentaire";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre de commentaires</td><td>".$vResult[0]."</td></tr>";

            $vSql ="SELECT COUNT(*) FROM Liker";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            $vResult = pg_fetch_array($vQuery, null, PGSQL_NUM);
            echo "<tr><td>Nombre de likes</td><td>".$vResult[0]."</td></tr>";

            echo "</table><br><table>";

            echo "<h4>Liste des annonces par votes</h4>";

            $vSql ="SELECT a.titreannonce, SUM(v.valeur) AS score FROM Vote v JOIN Annonce a ON v.idannonce = a.idannonce GROUP BY a.titreannonce ORDER BY score DESC";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            echo "<tr><td>Titre de l'annonce</td><td>Score</td></tr>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_NUM)) {
              echo "<tr><td>".$vResult[0]."</td><td>".$vResult[1]."</td></tr>";
              }
            echo "</table><br><table>";

            echo "<h4>Liste des utilisateurs triés par nombre d'annonces postées</h4>";

            $vSql ="SELECT pseudo, COUNT(idannonce) as nbAnnonces FROM Annonce a JOIN Utilisateur u ON a.pseudoUtilisateur=u.pseudo GROUP BY pseudo ORDER BY nbAnnonces DESC";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            echo "<tr><td>Pseudo</td><td>Annonces postées</td></tr>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_NUM)) {
              echo "<tr><td>".$vResult[0]."</td><td>".$vResult[1]."</td></tr>";
              }
            echo "</table><br><table>";

            echo "<br><h4>Liste des utilisateurs triés par nombre de commentaires postés</h4>";

            $vSql ="SELECT u.pseudo, COUNT(idCommentaire) as nbCommentaires FROM Commentaire c JOIN Utilisateur u ON c.pseudo=u.pseudo GROUP BY u.pseudo ORDER BY nbCommentaires DESC";
            if(!$vQuery = pg_query($vConn, $vSql)){
                echo "Erreur dans l'execution de la requête";
            }
            echo "<table><tr><td>Pseudo</td><td>Commentaires postés</td></tr>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_NUM)) {
              echo "<tr><td>".$vResult[0]."</td><td>".$vResult[1]."</td></tr>";
              }
            pg_close($vConn);
            ?>
        </table>
    </body>
</html>
