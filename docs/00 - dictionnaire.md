# Lexique du petit déveoppeur

> Petit développeur deviendra grand

- [Lexique du petit déveoppeur](#lexique-du-petit-déveoppeur)
  - [Programmation au sens large](#programmation-au-sens-large)
    - [algorithme](#algorithme)
    - [Instruction](#instruction)
    - [Déclaration de variable](#déclaration-de-variable)
    - [Déclaration de fonction](#déclaration-de-fonction)
    - [Affectation d'une valeur à une variable](#affectation-dune-valeur-à-une-variable)
    - [Invocation d'une fonction ou d'une méthode](#invocation-dune-fonction-ou-dune-méthode)
    - [Hoisting](#hoisting)
    - [Programmation asynchrone](#programmation-asynchrone)
    - [Programmation événementielle](#programmation-événementielle)
  - [POO (Programmation Orientée Objet)](#poo-programmation-orientée-objet)
    - [Classe](#classe)
    - [Objet ou Instance](#objet-ou-instance)
    - [Attribut](#attribut)
    - [Méthode](#méthode)
  - [HTML et DOM](#html-et-dom)
    - [Balise](#balise)
    - [Attribut](#attribut-1)
    - [Sélecteur CSS](#sélecteur-css)
  - [HTTP ?!](#http-)
    - [Protocole ?!](#protocole-)
    - [Requête HTTP](#requête-http)
    - [Réponse HTTP](#réponse-http)
  - [BDD](#bdd)
    - [SGBD](#sgbd)
    - [Instance](#instance)
    - [Base de donnée](#base-de-donnée)
    - [Table](#table)
    - [Champ](#champ)

## Programmation au sens large

### algorithme

C'est un ensemble organisé d'`instructions` systémiques permettant d'aboutir à un résultat à partir de données d'entrées éventuelles.

> NDLR: une recette de cuisine, une chorégraphie, etc. c'est un algorithme.

### Instruction

Plus petite opération que l'on peut effectuer en pogrammation et qui a un sens / un impact.
Une instruction fait "avancer" notre algorithme.

En général une instruction est délimitée par un `;`. En JS, ce délimiteur est facultatif la plupart du temps. En Python, c'est le passage à la ligne qui marque la fin d'une instruction.

On va distinguer 5 types d'instructions :

* la déclaration de variables et de fonctions
* l'affectation d'une valeur à une variable
* l'invocation d'une fonction (ou d'une méthode)
* les blocs conditionnels (if)
* les itérations (for, foreach, while, etc.)

### Déclaration de variable

Déclarer une variable, c'est réserver/allouer un espace dans la RAM pour pouvoir y stocker/lire UNE information.

> C'est comme aller acheter une boite pour pouvoir y stocker/récupérer des choses d'un type particulier (produits d'entretien ou vide poche, etc.)

> La RAM serait une bibliothère, la déclaration d'une variable serait la réservation d'un espace pour stocker un livre d'un type qui vous tient à coeur.

```
// En JS
const V1 = 'COUCOU' // déclaration + affectation, obligatoire dans le cas de constantes
let v2;
var v2;

// En PHP
define('V1', 'COUCOU');
const V1 = 'COUCOU';
$v2;
```

### Déclaration de fonction

Déclarer une fonction, c'est **réserver un espace** aussi, mais c'est aussi venir **en décrire le fonctionnement**. On décrit le comportement d'une fonction à l'aide... d'un algorithme.

> Puisque je dois écrire un algo dans une fonction, et que je peux définir une fonction dans un algo, ça veut dire que je peux définir une fonction dans une fonction ? Oo Dans certains langages oui, dans d'autres non.

```
// En JS
function pouet() {
    // du code
}

// En PHP
function pouet() {
    // du code
}
```


### Affectation d'une valeur à une variable

C'est lorsque l'on attribue/affecte une valeur à une variable qui a été déclaré au préalable (sauf en PHP... et d'autres langages, dont certains sont biens).

``` 
// En JS
v2 = 'coucou';

// En PHP
$v2 = 'coucou';
```

### Invocation d'une fonction ou d'une méthode

C'est le fait d'appeler/exécuter une fonction/méthode (qui a été déclarée au préalable ou qui sera déclaré plus tard Oo, même en PHP).

```javascript
console.log('')
```

### Hoisting

Dans certains langages, c'est le fait de pouvoir invoquer une fonction AVANT de l'avoir déclarée. (Elle est donc classiquement déclarée plus loin dans le même fichier). Cela permet de mettre en haut de notre fichier les appels aux fonctions plutôt que des centaines de lignes dont on ne sait pas quand/comment elles seront appellées.

### Programmation asynchrone

### Programmation événementielle


## POO (Programmation Orientée Objet)

### Classe

Définir une classe nous permet de :

* `nommer` un type d'objets que l'on voudra manipuler dans notre programme
* `définir des attributs` (propriétés) qui sont communes à tous les représentants de cette classe (et qui prennent la forme de variables)
* `définir des méthodes` qui sont aussi communes à tous les représentants (et qui prennent la forme de fonctions)

> Un moule pour définir un type de gateau (quelques caractéristiques qui seront partagées par tous les gateaux qu'on fera dedans)

```typescript
// Création d'une classe nommée "Voiture"
class Voiture {
    // déclaration de deux attributs :
    couleur: string,
    vitesse: number,
    vitesseMax: number,

    // Cette fonction un peu spéciale (elle s'appellera toujours "constructor en TS") permet de paramétrer notre objet lorsqu'on fait une "new". On n'est pas obligé de le mettre si on veut que tous nos objets soient construits avec les mêmes caractéristiques
    // constructor(vitesseMax=50, couleur="blanc") {
    //     this.vitesseMax = vitesseMax
    //     this.couleur = couleur
    // }

    rouler() {
        this.vitesse = this.vitesseMax;
    }
    freiner() {
        this.vitesse = 0;
    }
}

const twingo1 = new Voiture();
twingo.rouler();    // On passe la vitesse à "vitesseMax", ici 50km/h
twingo.freiner();   // On repasse à 0

// const bugatti1 = new Voiture(300, "gris anthracite");
// bugatti1.rouler()   // on passe la vitesse à 300km/h
// bugatti1.freiner();   // On repasse à 0
```

Dans l'exemple ci dessus :
- On crée une classe `Voiture`
- Cette classe est caractérisée par 3 attributs : vitesse, couleur et vitesseMax
- Elle est aussi caractérisée par 2 méthodes : rouler et freiner
- [bonus] Elle définit aussi un constructeur (commenté ici) qui permettrait de spécifier des paramètres lors de l'instanciation
- Voiture est une **classe.** twingo et bugatti sont des **objets,** voire, plus précisément, des **instances de la classe Voiture.**

Lorsque l'on fait un `new Ergerg()` on **instancie** notre classe `Ergerg`.

### Objet ou Instance

Un objet est une instance d'une classe donnée (créé lorsque l'on fait un `new`). Lorsque l'on instancie une classe, on obtient un fichier qui possède tous les attributs et méthodes décrits dans classe.

### Attribut

Un attribut est une variable, créée spécifiquement dans une classe (et qui sera donc disponible pour chaque objet que l'on instanciera).
Notez que chaque instance aura alors accès à son propre attribut : si vous changez la vitesse d'une voiture A, cela ne changera pas la vitesse de la voiture B :), c'est juste la structure qui est la même entre chaque objet d'une même classe.

### Méthode

Une méthode est une fonction, créée spécifiquement dans une classe (et qui sera donc disponible pour chaque objet que l'on instanciera).
Généralement, une méthode lit ou modifie des attributs de l'objet (pour changer la vitesse de la voiture, etc...)

## HTML et DOM

### Balise


### Attribut


### Sélecteur CSS



> Clic sur un elt HTML => invoque une fonction (programmation orientée Events)

## HTTP ?!

### Protocole ?!

### Requête HTTP

### Réponse HTTP



## BDD

### SGBD

### Instance

### Base de donnée

### Table

### Champ

### Identifiant et clé primaires

### Clés étrangères. 

## MVC 
Architecture Modèle-Vue-Contrôleur. 

### La vue 
Correspond à l'interface.  

### Le modèle 
Composant métier. C'est lui possède la **logique** de gestion, et aussi l'accès et la manipulation de données. 

### Le contrôleur
Fait le lien entre la vue et les modèles. 

Les frameworks PHP full stack tel que Larvel et Symfony ont une architecture MVC.  

## Sécurité 
Type de failles : 

### XSS : 
On injecte du code javascript malicieux dans des champs de formulaire destinés à être affichés (post de bloc ou un commentaire). À chaque fois que le post est affiché, le code malicieux est executé. 

Pour l'éviter (en PHP) : on néttoie la saisie, à l'aide de la fonction `htmlSpecialChars($input)`. 

### CSRF
Cross-Site Request Forgery : pour faire simple, on vole le cookie d'une personne connectée, on peut donc se faire passer pour elle auprès du serveur. 

### Injection SQL
Mécanisme qui permet d'exectuter ddes requêtes non prévues par l'application. 

On les évite avec des requêtes préparées. 
