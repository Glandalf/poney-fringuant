# Garder un utilisateur autentifié. 
On utilise le mécanisme de persistence de connexion nommé **session**. Cette persistence est gérer par le serveur . On parle d'**athentification statefull**. 

La documentation de PHP fourni un guide pour l'utilisation de session : https://www.php.net/manual/fr/book.session.php


## Fonctionnement d'une session
Pour identifier l'utilisateur, le serveur fourni à l'utilisateur un **cookie** de session nommé **PHPSESSID**, contenant l'identifiant de session de l'utilisateur. Le client doit donc transmettre à chaque requête ce cookie pour que le serveur puisse l'identifier. 
Le serveur stocke les informations que l'on souhaite relative au client dans la variable super globale `$_SESSION`. 

## Démarrage d'une session 
Pour démarrer une session, il faut appeler la fonction `session_start()`. Cette fonction générant le cookie de session qui sera transmit dans la réponse HTTP, il faut absolument l'appeler avant d'envoyer d'autres informations au client (avant toute fonction `echo`). 



## Problème de CORS : 
CORS = Cross Origin Ressource Sharing : partage de données par d'autres serveurs que celui sur lequel le client se connecte. 

Par exemple, vous êtes connecté sur www.poney.local, qui contient du js effectuant des requêtes sur back.poney.local. 


Le navigrateur n'est pas content, car il reçoit des données de `back.poney.local`. Pour cela, il faut spécifier des entêtes de réponses dans les fichiers de `back.poney.local` : 
```php
header('Access-Control-Allow-Origin: ' . $frontUrl); // $frontUrl est l'url du front sur lequel vous navigué
```
Cela évitera de rencontrer l'erreur suivante : 
```
Blocage d’une requête multiorigines (Cross-Origin Request) : la politique « Same Origin » ne permet pas de consulter la ressource distante située sur http://back.poney.local/connected.php. Raison : l’en-tête CORS « Access-Control-Allow-Origin » est manquant.
```

## Envoie des informations de connexion depuis une requête fetch 
Les requêtes XHR ou fetch ne transmettent pas de cookie par défaut. Il existe l'option `credentials: 'include'`, qui permet d'indiquer à la requête de transmettre un cookie précédement récupérer. :warning: Il faut mettre cette option dans les requêtes de connexion même si l'application n'a pas encore reçue de cookie de session. 

Côté serveur, il faut préciser dans l'entête des réponses http que le serveur autorise l'envoi de données d'identification : 
```php
    header('Access-Control-Allow-Credentials: true') ;
```
Si vous ne le faîtes pas, vous risquez de rencontrer l'erreur suivante : 
```
Blocage d’une requête multiorigines (Cross-Origin Request) : la politique « Same Origin » ne permet pas de consulter la ressource distante située sur http://back.poney.local/connected.php. Raison : « true » attendu dans l’en-tête CORS « Access-Control-Allow-Credentials ».
```