<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajotuer une Annonce</title>
    </head>
    <body>
      <h1>Ajouter une Annonce</h1>
      <form method="post" action="ajouter_annonce.php">
        <p>
          <label for="titre_annonce"> Titre de l'annonce : </label>
          <input type="text" name="titre" id="titre_annonce" maxlength="30" required/>
        </p>
        <p>
          <label for="titre_annonce"> Description de l'annonce : </label>
          <input type="text" name="description" id="description_annonce" />
        </p>
        <p>
          <label for="categorie_annonce"> Categorie de l'annonce : </label>
          <select name="categorie_annonce" id="categorie_annonce"  required>
            <optgroup label="categorie_annonce">
              <option value="informatique"> Informatique </option>
            </optgroup>
          </select>
        </p>
      </form>
      <a href="index.html">MENU</a>
    </body>
</html>
