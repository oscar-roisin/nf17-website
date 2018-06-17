# Requêtes MongoDB
---
## Ajout de 2 utilisateurs
```
db.users.insert(
{
    "_id" : 2,
    "pseudo": "roisinos",
    "nom" : "Roisin",
    "prenom" : "Oscar",
    "dateNaissance" : "09-11-1997",
    "mdp" : "password",
    "adresseU" :
    {
        "numero": 11,
        "rue" : "Port à bateaux",
        "code_postal" : "60200",
        "ville" : "Compiègne",
        "pays" : "France",
    },
    "dateInscription" : "10-06-2018",
    "role" : "admin"
})
```
```
db.users.insert (
{
    "_id" : 1 ,
    "pseudo": "dictusla",
    "nom" : "Dictus",
    "prenom" : "Laurine",
    "dateNaissance" : "09-05-1999",
    "mdp" : "1234azerty",
    "adresseU" :
    {
        "numero": 23,
        "rue" : "'James de Rothshild",
        "code_postal" : "60200",
        "ville" : "Compiègne",
        "pays" : "France",
    },
    "dateInscription" : "15-06-2018"
})
```

## Ajout d'une annonce
```
db.annonces.insert({
    "_id": 1,
    "utilisateur":
    {
        "id_utilisateur": 1,
        "pseudo":  "dictusla"
    },
    "titre": "15% de reduction sur une selection d articles",
    "description": "15% de remise sur toutes les alimentations : offre valable du 17/04/2018 au 18/04/2018 inclus, en entrant le code ONENAGROS dans le champ prévu à cet effet sur votre panier.",
    "categorie": "informatique",
    "enseigne":
    {
        "nom": "UTC",
        "website": "utc.fr",
        "contact": "adresse@utc.fr",
        "location":
        {
            "rue": "rue roger Couttolenc",
            "code postal": "60200",
            "ville": "Compiègne",
            "pays": "France",
        }
    },
    "lien": "liendelannnonce.fr",
    "dateDebut": "2018-04-17 00:00:00+02",
    "etat": "true",
    "active": "false",
    "compteur": 0,
    "type": "Code promo",
    "code": "ONENAGROS"
})
```

## Ajout d'un vote pour une annonce
Insertion d'un vote
```
db.votes.insert(
{
    "_id": 1,
    "utilisateur":
    {
        "id_utilisateur": 1,
        "pseudo":  "dictusla"
    },
    "id_annonce": 1,
    "valeur":1,
    "dateVote": "17-06-2018"
})
````
Mise à jour de l'annonce
```
db.annonces.update(
{
    "_id":1
},
{
    $addToSet:
{
    "vote":
    {
        "id_vote":4,
        "valeur":1
    }
})
```

## Ajout de deux badges
```
db.badges.insert({
    "_id": 1,
    "titre": "Bienvenue" ,
    "description": "Bienvenue sur La Bonne Annonce.",
    "conditions" :
    [
        {
            "titreCondition":"inscrit",
            "descriptionCondition": "Etre inscrit sur La Bonne Annonce."

        }
    ]
})
```
```
db.badges.insert(
{
    "_id": 2,
    "titre": "Admin",
    "description": "Vous êtes administrateur sur La Bonne Annonce.",
    "conditions" :
    [
        {
            "titreCondition":"inscrit",
            "descriptionCondition": "Etre inscrit sur La Bonne Annonce."

        },
        {
            "titreCondition":"administrateur",
            "descriptionCondition": "Etre administrateur sur La Bonne Annonce."

        }
    ]
})
```
## Ajout de badges à des utilisateur
```
db.users.updateMany(
{
},
{
    $addToSet:
    {
        "badges":
        {
            "id_badge":1,
            "titre": "Bienvenue",
            "date" : "15-06-2018"
        }
    }
})
```
```
db.users.update(
{
    "_id":2
},
{
    $addToSet:
    {
        "badges":
        {
            " id_badge":2,
            "titre": "Admin",
            "date" : "10-06-2018"
        }
    }
})
```
## Insertion d'un commentaire
```
db.commentaires.insert({
    "_id": 1,
    "id_annonce" : 1,
    "id_utilisateur" : 2,
    "texte" : "Merci beaucoup, le code fonctionne! J’ai pu faire une super affaire.",
    "date" : "2018-04-17 14:48:00+02"
})
```
## Vote pour un commentaire
```
db.commentaires.update(
{
    "_id":1
},
{
    $addToSet:
    {
        "like":
        {
            "id_utilisateur": 1
        }
    }
})   
```
## Signalement d'un commentaire
```
db.commentaires.update(
{
    "_id" : 1
},
{
    $addToSet:
    {
        "signalement":
        {
            "date_signalement" : "2018-04-17 14:40:00+02",
            "categorie_signalement" : "inutile",
            "utilisateur": 1
        }
    }
})
```
