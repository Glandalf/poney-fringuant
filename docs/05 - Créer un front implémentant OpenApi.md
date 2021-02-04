# Créer un front respectant l'API

## Comprendre les routes de notre spec

La documentation OpenAPI décrit X routes.

La première étape c'est de comprendre par quelles routes je vais commencer. Dans notre cas, nous allons commencer par l'inscription et la connexion qui sont bien décrites dans cette API.


## Implémenter une route donnée

Pour chaque route que j'implémente, je vais donc devoir comprendre le détail de la documentation réalisée dans le chapitre précédent (04).

- Quel est le nom du fichier php que mon front doit appeler ?
- Quel est le corps de la requête ?
- Quels sont les paramètres éventuels ?
- Quelle est la méthode ?

Le nom du fichier ET la méthode sont à renseigner dans les attributs de notre formulaire :

```html
<form id="inscription" action="http://monback/enregistrement.php" method="POST">
```

Ensuite, je regarde le corps de la requête attendu et je crée autant de champs (input/textarea) avec le même nom !

```html
<input type="text" name="prenom">
```
> par exemple ici, on implémente un champ que le serveur recevra sous la variable (Get ou Post selon ce que l'on a configuré) sous le nom `prenom`


