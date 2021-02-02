# Backend : PHP

Notre backend pour le brief va permettre : 
 - enregitrement d'un utilisateur
 - connecter un utilisateur
 - déconnecter un utilisateur
 - completer le profil avec
    - une photo (optionnelle)
    - un ou plusieurs centre d'intérêt
 - avoir la liste des centres d'intérêt
 - recherche un membre par son nom ou ses centres d'intérêt

La plupart de ces actions sont des réponses HTTP a des requêtes HTTP envoyées par le front. 
Comme le front est "servi" à part, on décide que les réponses seront au format JSON.

!!! Question : comment organise-t-on les fichiers de notre backend
    Un dossier backend
    Un formulaire/requête (HTTP) = un fichier php => C'est un choix, mais on n'est pas obligé de faire comme ça
    (ON fera peut-être autrement d'ailleurs)
    Une bonne pratique consiste à regrouper les informations que l'on réutilise dans un ou plusieurs script PHP
        - les informations de connexion à la base de données
        - les headers qui l'on renvoie à chaque reponse (Content-Type, Allow-Access-Control-Origin) 

Au passage, on apprendra à utiliser les variables d'environnement pour le gestion des url et des ports dans notre application. 

!!! question Mais pourquoi gérer les url et les ports avec ça ?
    Car on a différents environnements, comme 
        - dev : l'environnement de développement
        - prod : l'environnement où est deployée notre application en production (souvent chez un hébergeur) 

