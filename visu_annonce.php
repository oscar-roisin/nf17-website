<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste utilisateurs</title>
    </head>
    <body>
            <h1> Affichage de l'annonce </h1>
            <?php

            $id = $_POST['id'];

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
            $vSql ="SELECT * FROM Annonce WHERE idAnnonce=$id";
            $vQuery=pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <table>
                <tr><td>Titre</td><td>".$vResult['titreannonce']."</td></tr>
                <tr><td>Description</td><td>".$vResult['descriptionannonce']."</td></tr>
                <tr><td>Categorie</td><td>".$vResult['categorie']."</td></tr>
                <tr><td>Enseigne</td><td>".$vResult['nomenseigne']."</td></tr>
                <tr><td>Type</td><td>".$vResult['type']."</td></tr>
                <tr><td>Code</td><td>".$vResult['code']."</td></tr>
                <tr><td>Nouveau Prix</td><td>".$vResult['newprice']."</td></tr>
                <tr><td>Prix initial</td><td>".$vResult['initprice']."</td></tr>
                <tr><td>Frais de port</td><td>".$vResult['fraisport']."</td></tr>
                <tr><td>Lien</td><td><a href=".$vResult['lien'].">".$vResult['lien']."</a></td></tr>
                <tr><td>Date de soumission</td><td>".$vResult['datesubmit']."</td></tr>
                <tr><td>Date de début</td><td>".$vResult['datedebut']."</td></tr>
                <tr><td>Date d'expiration</td><td>".$vResult['dateexpiration']."</td></tr>

                <tr><td>Etat</td><td>";
                if($vResult['etat']) echo "Validée";
                else echo "En attente de validation";
                echo"</td></tr>

                <tr><td>Active</td><td>";
                if($vResult['active']) echo "En cours";
                else echo "Expirée";
                echo"</td></tr>";
                echo "<tr><td>Compteur</td><td>".$vResult['compteur']."</td></tr>
                </table>";
            }

            echo"<h1> Affichage des commentaires de l'annonce </h1>";

            echo"<FORM METHOD='POST' ACTION='visu_user.php'>";
            echo"<h2>Utilisateur à utiliser pour liker un commentaire</h2>"
            ;

            $vSql ="SELECT * FROM utilisateur";
            $vQuery=pg_query($vConn, $vSql);
            echo"<select name='user'>";
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
            echo "<option value=".$vResult['pseudo'].">".$vResult['nom']." ".$vResult['prenom']." (".$vResult['pseudo'].")</option>";
            }
            echo"</select>";

            $vSql ="SELECT * FROM commentaire WHERE idAnnonce=$id";
            $vQuery=pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <table>
                <tr><td>Utilisateur</td><td>".$vResult['pseudo']."</td></tr>
                <tr><td>Commentaire</td><td>".$vResult['texte']."</td></tr>
                <tr><td>Liker</td><button type='submit' name='pseudo' value='".$vResult['idcommentaire']."'>Liker</button></td></tr>
                </table>";
            }

            pg_close($vConn);
            ?>
        </form>
    </body>
</html>
