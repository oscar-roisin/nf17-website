<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Liste utilisateurs</title>
    </head>
    <body>
<<<<<<< HEAD
            <?php

            $id = $_POST['id'];

            $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
            $vSql ="SELECT * FROM Annonce WHERE idAnnonce=$id";
            $vQuery=pg_query($vConn, $vSql);
            while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                echo "
                <table>
                <tr><td>Titre</td><td>".$vResult[titreAnnonce]."</td></tr>
                <tr><td>Description</td><td>".$vResult[descriptionAnnonce]."</td></tr>
                <tr><td>Categorie</td><td>".$vResult[categorie]."</td></tr>
                <tr><td>Enseigne</td><td>".$vResult[nomEnseigne]."</td></tr>
                <tr><td>Type</td><td>".$vResult[type]."</td></tr>
                <tr><td>Code</td><td>".$vResult[code]."</td></tr>
                <tr><td>Nouveau Prix</td><td>".$vResult[newPrice]."</td></tr>
                <tr><td>Prix initial</td><td>".$vResult[initPrice]."</td></tr>
                <tr><td>Frais de port</td><td>".$vResult[fraisPort]."</td></tr>
                <tr><td>Lien</td><td><a href=".$vResult[lien].">".$vResult[lien]."</a></td></tr>
                <tr><td>Date de soumission</td><td>".$vResult[dateSubmit]."</td></tr>
                <tr><td>Date de début</td><td>".$vResult[dateDebut]."</td></tr>
                <tr><td>Date d'expiration</td><td>".$vResult[dateExpiration]."</td></tr>

                <tr><td>Etat</td><td>";
                if($vResult[etat]) echo "Validée";
                else echo "En attente de validation";
                echo"</td></tr>";

                if($vResult[active])
                </table>";
            }
            pg_close($vConn);
            ?>
=======
        Coucou <3
        <a href="index.html">MENU</a>
>>>>>>> 1e2d6cd316fc7f0bc4aa29f5432d5dc1a05fb3bb
    </body>
</html>

CREATE TABLE Annonce (
idAnnonce SERIAL PRIMARY KEY,
titreAnnonce VARCHAR (250) NOT NULL,
descriptionAnnonce TEXT NOT NULL,
categorie categorieAnnonce NOT NULL,
nomEnseigne VARCHAR(250) REFERENCES Enseigne(nomEnseigne) ,
type TypeAnnonce NOT NULL,
code  VARCHAR(30),
newPrice DECIMAL,
initPrice DECIMAL,
fraisPort DECIMAL,
photo  BYTEA,
lien  VARCHAR(250) ,
dateSubmit TIMESTAMP WITH TIME ZONE DEFAULT Now(),
dateDebut  TIMESTAMP WITH TIME ZONE,
dateExpiration  TIMESTAMP WITH TIME ZONE,
etat  BOOLEAN NOT NULL,
active  BOOLEAN NOT NULL DEFAULT FALSE,
compteur  NUMERIC(1,0) CHECK (compteur BETWEEN 0 AND 3) NOT NULL
