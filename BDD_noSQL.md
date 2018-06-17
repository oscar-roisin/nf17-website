# BDD non relationnelle : Projet LBA
## Groupe 3 : Laurine Dictus, Zakaria Kaddache, Hugo Le Moine, Oscar Roisin
---
# Choix Mongo
---
Pour notre site web d’annonce il paraît plus pertinent de réaliser une base de donnée en non relationnel, en effet cela nous permet de pouvoir faire évoluer notre plateforme sans avoir à gérer les modifications de nos structures de données.
De plus le non-relationnel apporte plus de souplesse et de rapidité.

Cela nous permet également de réaliser des études statistiques plus facilement (afin de réaliser du décisionnel par exemple).
En contrepartie on a plus de redondance et moins de cohérence, mais cela n’est pas gênant dans notre cas, puisque ne nous sommes pas dans une application dite critique.

Neo4JS permet de gérer des structures de données arborescentes, ce qui ne semble pas adapté à notre situation.
Nous avons longuement hésité à choisir Oracle, afin de faire de relationnel-objet, mais en vue d’avoir plus d’aisance dans la réalisation de la partie applicative, nous avons choisis MongoDB.

## Choix réalisés
-   L’imbrication des conditions d’obtention des badges ont été imbriquées dans ces derniers : il n’y aurait de toute façon que peu de cas où une même condition serait utilisée pour plusieurs badges, peu de redondance est donc induite.
-   Les commentaires n’ont pas été imbriqués dans les annonces puisqu’ils ont un certains nombre de propriétés qu’il est intéressant de retrouver rapidement. Par exemple, pour retrouver les commentaires postés par un utilisateur, pour lister les commentaires signalés … il est ainsi pas nécessaire de parser l'intégralité des annonces.
-   Les signalements ont également été imbriqués dans les commentaires et annonces : il est en effet plus intéressant de savoir le contenu qui a été signalé plutôt que l’utilisateur l’ayant signalé.
-   Les likes ont été imbriqués dans les commentaires : le nombre d’ObjectID permet de connaître le nombre de likes, et également de lister et connaîtres les utilisateur.
-   Les énumérations (catégorie, raisons de signalement) et datatypes (adresse) ont été supprimés du modèle puisqu’ils pourront être implémentés au niveau applicatif.
-   Les signalement d’expiration/réactivation d’une annonce ont été imbriqués dans l’annonce pour les mêmes raisons que le signalement des commentaires. Il faudra alors limiter les doubles votes d’un même utilisateur au niveau applicatif.
-   Les enseignes ont été imbriquées dans les annonces : il n’est intéressant de connaître la localisation qu’au moment de la publication : la redondance et les potentiels futurs changements d’adresse de l’enseigne ne sont donc pas gênants.
-   Les votes pour les annonce sont indépendants des annonces, mais sont partiellement imbriqués dans cette dernière afin de connaître plus rapidement le total des votes (positifs/négatifs). Si besoin (pour auditer le système par exemple), les id des votes permettent de retrouver la liste des utilisateur ayant voté pour l’annonce, ainsi que les dates de ces votes.
-   Le vote pour une annonce, comme les commentaires, restent en dehors de l’annonce.
-   Les conditions d'obtention des badges ont été imbriquées dans ces derniers.

---

# Structure des données
---
## Commentaire
```
{
    "_id" : ObjectId(""),
    "id_annonce" : ObjectId(""),
    "id_utilisateur" : ObjectId(""),
    "texte" : text,
    "likes" :
    [
        {
            "utilisateur": ObjectId("")
        },
        {
            "utilisateur": ObjectId("")
        },
        {
            "utilisateur": ObjectId("")
        },
    ]       
    "signalement" :
    [
        {
            "date_signalement" : date,
            "categorie_signalement" : string,
            "utilisateur": ObjectId("")
        },
        {
            "date_signalement" : date,
            "categorie_signalement" : string,
            "utilisateur": ObjectId("")
        }
    ]
}
```
## Badge
```
{
    "_id": ObjectId(""),
    "titre": string,
    "description": string,
    "duree": integer,
    "logo": image,
    "condition" :
    [
        {
            "titreCondition": string,
            "descriptionCondition": string,
        },
        {
            "titreCondition": string,
            "descriptionCondition": string,
        }
    ]    
}
```
## Utilisateur
```
{
    "_id" : ObjectId(),
    "pseudo": string,
    "nom" : string,
    "prenom" : string,
    "dateNaissance" : Date,
    "mdp" : string,
    "photoProfil" : image,
    "adresseU" :
    {    
        "numero": integer,
        "rue" : string,
        "code_postal" : integer,
        "ville" : string,
        "pays" : string
    },
    "dateInscription" : Date,
    "badge" :
    [               
        {
            "id_badge" : ObjectId(" "),
            "titre" : string,
            "dateObtention" : date
        }
    ]
}
```
## Administrateur (Même table qu'utilisateur, champ rôle supplémentaire)
```
{
    "_id" : ObjectId(""),
    "pseudo": string,
    "nom" : string,
    "prenom" : string,
    "dateNaissance" : Date,
    "mdp" : string,
    "photoProfil" : image,
    "adresseU" :  
    {    
        "numero": integer,
        "rue" : string,
        "code_postal" : integer,
        "ville" : string,
        "pays" : string
    },
    "dateInscription" : Date,
    "badge" :
    [
        {
            "id_badge" : ObjectId(" "),
            "titre" : string,
            "dateObtention" : date
        }
    ],
    "role" : string
}
```
## Annonce
```
{
    "_id": ObjectId(),
    "utilisateur":
    {
        "id_utilisateur" : ObjectId(""),
        "pseudo": string
    },
    "titre": string,
    "description": string,
    "categorie": string,
    "enseigne":
    {
        "nom": string,
        "website": string,
        "contact": string,
        "location":
        {
            "numero": integer,
            "rue": string,
            "code postal": integer,
            "ville": string,
            "pays": string
        }
    }
    "photo": image,
    "lien": string,
    "dateDebut": Date,
    "dateSubmit": Date,
    "etat": boolean,
    "active": boolean,
    "compteur": integer,
    "expiration":   
    {
        "Expirer" : ObjectId (" "),
        "obsolete" : boolean
     }
    "type": string,
    "code": string,
    "newprice": float,
    "initPrice": float,
    "fraisPort": float,
    "vote" :
    [
        {
        "id_vote" : ObjectId(""),
        "valeur": integer
        },
        {
            "id_vote" : ObjectId(""),
            "valeur": integer
        },
        {
        "id_vote" : ObjectId(""),
        "valeur": integer
        }
    ]
}
```
## Vote
```
{
    "_id": ObjectId(""),
    "utilisateur":   
    {
        "id_utilisateur" : ObjectId(""),
        "pseudo": string
    },
    "annonce": ObjectId(""),
    "valeur": integer,
    "dateVote": Date
}
```
---
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
    }
})
```
## Expirer une annonce
```
db.annonces.update(
{
    _id : 1
},
{
    $addToSet:
    {
        "expiration":
        {
            "id_utilisateur":1,
            "obsolete": "true"
        }
    },
    $inc :
    {
        "compteur" : 1
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
