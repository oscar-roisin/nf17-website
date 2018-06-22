<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste utilisateurs</title>
    </head>
    <body>
		<a href="index.html">MENU</a>
		<a href="annonce.php">Retour Annonce</a><br>
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
                <tr><td>Utilisateur</td><td>".$vResult['pseudoutilisateur']."</td></tr>
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

                <tr><td><p>Utilisateur à utiliser pour voter pour l'annonce</p></td>";
                echo"<FORM METHOD='POST' ACTION='voter.php'>";
                $vSql1 ="SELECT * FROM utilisateur";
                $vQuery1=pg_query($vConn, $vSql1);
                echo"<td><select name='user'>";
                while ($vResult1 = pg_fetch_array($vQuery1, null, PGSQL_ASSOC)) {
                echo "<option value=".$vResult1['pseudo'].">".$vResult1['nom']." ".$vResult1['prenom']." (".$vResult1['pseudo'].")</option>";
                }
                echo"</select></td></tr>
                <tr><td><button type='submit' name='+1' value=".$vResult['idannonce'].">+1</button></td>
                <td><button type='submit' name='-1' value=".$vResult['idannonce'].">-1</button></td></tr>

                </form>

                </table>";
            }



            echo"<h1> Affichage des commentaires de l'annonce </h1>";


            $vSql2 ="SELECT * FROM commentaire WHERE idAnnonce=$id";
            $vQuery2=pg_query($vConn, $vSql2);


      echo "<h2>Commentaires</h2>";
            while ($vResult2 = pg_fetch_array($vQuery2, null, PGSQL_ASSOC)) {
                echo "
                <table>
                <tr><td>Utilisateur</td><td>".$vResult2['pseudo']."</td></tr>
                <tr><td>Date</td><td>".$vResult2['dateparution']."</td></tr>
                <tr><td>Commentaire</td><td>".$vResult2['texte']."</td></tr>

                <tr><td><p>Utilisateur à utiliser pour liker un commentaire</p></td>";
                echo"<FORM METHOD='POST' ACTION='liker.php'>";
                $vSql ="SELECT * FROM utilisateur";
                $vQuery=pg_query($vConn, $vSql);
                echo"<td><select name='user'>";
                while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "<option value=".$vResult['pseudo'].">".$vResult['nom']." ".$vResult['prenom']." (".$vResult['pseudo'].")</option>";
                }
                echo"</select></td></tr>
                <tr><td>Liker</td><td><button type='submit' name='idcommentaire' value=".$vResult2['idcommentaire'].">Liker</button></td></tr>
                </form>

                <FORM METHOD='POST' ACTION='signalement.php'>";

                echo"<tr><td><p>Utilisateur à utiliser pour signaler un commentaire</p></td>";

                $vSql ="SELECT * FROM utilisateur";
                $vQuery=pg_query($vConn, $vSql);
                echo"<td><select name='user'>";
                while ($vResult3 = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "<option value=".$vResult3['pseudo'].">".$vResult3['nom']." ".$vResult3['prenom']." (".$vResult3['pseudo'].")</option>";
                }
                echo"</select></td></tr>
                <tr><td>Signalement</td><td><label for='raison_signalement'> Raison  : </label>
                <select name='raison_signalement' id='raison_signalement'  required>
                    <option value='Harcelement'> Harcelement </option>
                    <option value='insultant'> Insultant </option>
                    <option value='Incitation à la haine'> Incitation à la haine </option>
                    <option value='diffamation'> Diffamation </option>
                    <option value='autre' selected> Autre </option>
                </select><button type='submit' name='idcommentaire' value=".$vResult2['idcommentaire'].">Signaler</button></td></tr>
                </form>
                </table><br>------------------------------------------------------------------------------------<br>";
            }

            pg_close($vConn);
            ?>

    </body>
</html>
