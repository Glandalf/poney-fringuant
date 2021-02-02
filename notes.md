# Préparation du projet

- Une partie maquettage : peut-être figma ?
  - page création/connexion ?
  - page de profil (modifiable)
  - liste des adhérents
    - avec moteur de recherche (Deux modes de recherche)
  - page statistiques
- Choix des technos : front, back, bdd, serveur web
  - bdd, on connait que MariaDB, il n'y a pas l'air d'avoir d'incompatibilité avec le besoin, donc ça a l'air d'être un bon candidat
  - Serveur web : Apache/Nginx, au choix. Vous avez beaucoup de Apache, valeur sure.
  - Back, ce sera du PHP, avec ou sans framework, on verra plus tard
  - Front, ce sera du JS avec ESLint, avec ou sans framework, on verra plus tard. Pas de Jquery


## Vue d'ensemble

- le front envoie des demandes au back
- le backend ne peut que répondre au front
- il peut aussi communiquer avec une base de données
- le serveur web assure la configuration du front et du back, pas de la bdd

## Kessonfé ?!

### Les premières étapes

> A faire dans l'ordre qu'on veut ou suivant les infos que l'on a

- On part a priori du maquettage et on ne va pas le faire ici. Si on dispose d'un modèle de données (annexe 2 dans notre cas), on va essayer de voir quelle info doit apparaitre et où.
- Si on dispose de notre modèle de données dès le début, on peut commencer par création de notre BDD. Sinon, de votre maquette, vous pouvez souvent sortir beaucoup d'informations qui serviront à modéliser votre base de données. 
  - Stockez toutes vos requêtes dans un fichier SQL qui contient la suppresion de la BDD si elle existe, sa création, la création d'un ou plusieurs utilisateurs dédiés avec les droits adaptés, puis les requêtes de création.
  - Dans un autre fichier vous pouvez stocker des requêtes d'insertion pour simuler une base pas vide. Ca simplifie souvent le travail pendant le dev. C'est optionnel.

## Ensuite, back, front, serveur web ?!

- On peut décider de faire du front mélangé au back 
  - via un framework comme Laravel qui intègre les deux aspects (templates, etc.)
  - via des fichiers php et html organisés comme vous le voulez (sous dossiers ou non)
- On peut décider de séparer clairement tout ça : un projet back, un front, 
  - hébergés sur deux sites Apache
  - hébergés sur le même site Apache

!!! hint faisons simple mais efficace 1

    On fait donc un choix maintenant et on va sans doute commencer par configurer un Apache en fonction de nos choix, faire un "Hello world" en php et un mini front qui affiche ce Hello world. Un fichier HTML vide qui affiche, un fichier php de une ligne.

!!! hint faisons simple mais efficace 2

    Modifiez votre fichier PHP pour qu'il se connecte à votre base et affiche le nombre de ligne d'une table par exemple. 

    Dès que ça marche, sortez toute la partie configuration dans un fichier php dédié (`conf.php` par exemple) et vérifiez que ça fonctionne toujours.

> A ce stade, vous savez déjà que tout communique ensemble comme il faut.


## Le code !

On peut continuer avec le front ou le back ou les deux en parallèle, selon vos souhaits.
Il faut penser à faire la "connexion" entre le back et la BDD pour ne pas bloquer par la suite.

> Nous, on va prendre les fonctionnalités les unes après les autres. 

Une fois que l'on a fait le choix de notre méthode de développement, on découpe et on code !


### Création de compte utilisateur

Vue globale des rôles de chaque partie de notre appli

- front
- back qui traite le formulaire 
  - il crée le compte si tout se passe bien et retourne la confirmation
    - on doit donc trouver notre utilisateur en BDD
  - il retourne un message d'erreur sinon
- le front affiche un feedback : compte créé ou pas


### TODO : les autres fonctionnalités