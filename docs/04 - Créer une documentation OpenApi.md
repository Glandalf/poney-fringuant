# Documentation OpenAPI. 

## Pourquoi ? 
Le back et le front vont devoir communiquer entre eux en s'échangeant des données : le front envoye généralement des données de formulaire que le back doit traiter. 
Le front effectue des requêtes pour obtenir des informations dont dispose le backend, et est responsable de l'affichage de ces données. 

La documentation permet de définir les formats et la structure des données échangées. 

##  Comment ? 
Il existe une spécification nommée **OpenAPI**. C'est une norme Open Source permettant la définition d'API (Application Programm Interface), indépendante des langages qui seront utilisé coté serveur ou coté client. 
Plusieurs outils permettent de faire des choses similaires et sont capables d'importer et d'exporter des fichiers OpenAPI : 
 - postman
 - insomnia, 
 - ...

Pour créer des fichiers OpenApi, il existe l'outil SwaggerEditor (qui est à l'origine de cette spécification), utilisable en ligne ou en installation locale (il y a même une extension VSCode) : https://editor.swagger.io/

Par défaut, swagger editor fourni un exemple : le petstore. Nous utiliserons ce fichier pour commencer notre documentation. La spécification actuelle est la version 3. 
Le format de fichier utilisé est yaml. Il est aussi possible d'utiliser le format JSON. 
L'avantage de cette spécification est que l'on peut écrire en **markdown** dans la documentation :smile:


Ce fichier va nous permettre d'indiquer : 
 - les routes (url, aussi nommées endpoints) de l'api, 
 - les codes réponses de chacune de ces routes en cas de succés mais aussi en cas d'erreur
 - la structures des données attendues et renvoyées


En première étape, je défini la structures de données échangées. Ce sont des `schemas` que l'on rempli dans `components`. 

On peut aussi définir des corps de requêtes, et des mécanisme de sécurité. 
Ici on a défini le corps de requête attendu pour l'inscription d'un adhérent. 
