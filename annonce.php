0<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajotuer une Annonce</title>
    </head>
    <body>
      <a href="index.html">MENU</a>

      <h1>Ajouter une Annonce</h1>
      <form method="post" action="ajouter_annonce.php">
        <p>
          <label for="titre_annonce"> Titre de l'annonce : </label>
          <input type="text" name="titre_annonce" id="titre_annonce" maxlength="30" required/>
        </p>
        <p>
          <label for="description_annonce"> Description de l'annonce : </label>
          <input type="text" name="description_annonce" id="description_annonce" />
        </p>
        <p>
          <label for="categorie_annonce"> Categorie de l'annonce : </label>
          <select name="categorie_annonce" id="categorie_annonce"  required>
            <optgroup label="Categorie de l'annonce">
              <option value="informatique"> Informatique </option>
              <option value="agriculture"> Agriculture </option>
            </optgroup>
          </select>
        </p>
        <p>
          <label for="enseigne_annonce"> De quelle enseigne : </label>
          <input type="text" name="enseigne_annonce" id="enseigne_annonce" />
        </p>
        <p>
          <label for="photo_annonce"> Ajouter une photo  : </label>
          <input type="file" name="photo_annonce" id="photo_annonce" />
        </p>
        <p>
          <label for="lien_annonce"> Lien : </label>
          <input type="url" name="lien_annonce" id="lien_annonce" />
        </p>
        <p>
          <label for="date_debut_annonce"> Date Debut  : </label>
          <input type="date" name="date_debut_annonce" id="date_debut_annonce" />
        </p>
        <p>
          <label for="date_expiration_annonce"> Date Expiration : </label>
          <input type="date" name="date_expiration_annonce" id="date_expiration_annonce" />
        </p>

        <input type="submit" value="Envoyer" />
      </form>

    </body>
</html>
