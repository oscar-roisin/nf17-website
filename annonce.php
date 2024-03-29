<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter une Annonce</title>
    </head>
    <body>
      <a href="http://tuxa.sme.utc/~nf17p095/">MENU</a>

      <h1>Ajouter une Annonce</h1>
      <form method="post" action="ajout_annonce.php">

        <p>
            <label for="pseudo">Pseudo de l'utilisateur :</label>
            <select name="pseudo" required>
            <?php
                $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
                $vSql ="SELECT pseudo FROM utilisateur";
                if(!$vQuery = pg_query($vConn, $vSql)){
                    echo "Erreur dans l'execution de la requête";
                }
                while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
                  echo "<option value=".$vResult['pseudo'].">".$vResult['pseudo']." </option>";
                  }
                pg_close($vConn);
            ?>
            </select>
        </p>
        <p>
          <label for="type_annonce"> Type de l'annonce : </label>
          <select name="type_annonce" id="type_annonce"  required>
            <optgroup label="Type de l'annonce">
              <option value="CodePromo" default> Code de Promotion </option>
              <option value="BonneAffaire"> Bonne Affaire </option>
            </optgroup>
          </select>
        </p>
        <p>
          <label for="titre_annonce"> Titre de l'annonce : </label>
          <input type="text" name="titre_annonce" id="titre_annonce" maxlength="30" required  />
        </p>
        <p>
          <label for="description_annonce"> Description de l'annonce : </label>
          <input type="text" name="description_annonce" id="description_annonce" required/>
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
        <p>
          <label for="code_annonce" class="code_annonce" > Code Promo : </label>
          <input type="text" name="code_annonce" id="code_annonce" class="code_annonce" />
        </p>
        <p>
          <label class = "affaire_annonce" for="new_price_annonce" hidden=TRUE > Nouveau Prix : </label>
          <input class = "affaire_annonce" type="number" name="new_price_annonce" id="new_price_annonce" hidden=TRUE />
        </p>
        <p>
          <label class = "affaire_annonce" for="old_price_annonce" hidden=TRUE > Ancien Prix  : </label>
          <input class = "affaire_annonce" type="number" name="old_price_annonce" id="old_price_annonce" hidden=TRUE />
        </p>
        <p>
          <label class = "affaire_annonce" for="port_annonce" hidden=TRUE > Frais de Port : </label>
          <input class = "affaire_annonce" type="number" name="port_annonce" id="port_annonce" hidden=TRUE />
        </p>

        <input type="submit" value="Envoyer" />
      </form>
      <script>
        var type = document.getElementById('type_annonce');
          type.value = "CodePromo";
        var code = document.getElementsByClassName('code_annonce');
          code[1].value = 0;
        var affaire = document.getElementsByClassName('affaire_annonce');
        var i ;
        type.addEventListener('change', function() {
          if(type.value == "CodePromo"){
            for(i = 0; i < code.length; i++){
              code[i].removeAttribute("hidden");
              code[i].value = 0;
            }

            for(i = 0; i < affaire.length; i++){
              affaire[i].setAttribute("hidden","true");
              affaire[i].value = -1;
            }

          }
          else{
            for(i = 0; i < affaire.length; i++){
              affaire[i].removeAttribute("hidden");
              affaire[i].value = 0;
            }
            for(i = 0; i < code.length; i++){
              code[i].setAttribute("hidden","true");
              code[i].value = -1;
            }
          }
        });


      </script>
      <h1>Visualisation</h1>
        <FORM METHOD='POST' ACTION='visu_annonce.php' >
          <?php
          $vConn = pg_connect("host=tuxa.sme.utc dbname=dbnf17p095 user=nf17p095 password=sMdOMm7S");
          $vSql ="SELECT * FROM annonce";
          if(!$vQuery = pg_query($vConn, $vSql)){
              echo "Erreur dans l'execution de la requête";
          }
          echo"<select name='id'>";
          while ($vResult = pg_fetch_array($vQuery, null, PGSQL_ASSOC)) {
            echo "<option value=".$vResult['idannonce'].">".$vResult['titreannonce']." </option>";
            }
            echo"</select>";
          pg_close($vConn);
          ?>
          <input type="submit" name="visu_annonce">
        </form>

    </body>
</html>
