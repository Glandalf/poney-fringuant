# Comment créer sa base proprement

!!! warning On doit partir d'un MCD ou un MLD existant

- pour chaque `relation` du MLD (chaque "rectangle" en gros) on va créer une table correspondante
- pour chaque `propriété` d'une `relation`, 
  - on va créer un champ dans notre table
  - on va tenir compte de son type
  - on identifie s'il s'agit d'une clé primaire ou non, c'est à dire d'un identifiant unique d'un enregistrement de cette table.
  - on traitera plus tard la partie clés étrangères
- pour chaque lien entre deux `relations`, on crée une contrainte de clé étrangère
- chaque nom de contrainte doit être unique en SQL

En général, une clé étrangère est créée sur un champ "quelconque" et fait référence à une clé primaire dans l'autre table.
Il faut donc que l'autre table existe avant.

Une autre solution serait de créer toutes les tables sans les clés étrangères, puis de les ajouter.


Pour créer une table, on peut donc commencer par écrire le create avec rien dedans :

```sql
CREATE TABLE ekrjghekjrghekjrgh ();
```

Puis on vient ajouter tous les noms de champs avec leur type :

```sql
CREATE TABLE adherents (
    adherentID int ,
    prenom varchar(50),
    nom varchar(50),
    pseudo varchar(20),
    `password` varchar(255),
    email varchar(128),
    numero varchar(20),
    adresse1 varchar(128),
    codePostal int,
    ville varchar(20),
    dateAdhesion date
);
```

Ensuite, on va ajouter LA clé primaire, qu'elle soit simple ou composite, et identifier tous les champs qui ne doivent pas être `null` :


```sql
CREATE TABLE adherents (
    adherentID int PRIMARY KEY AUTO_INCREMENT,
    prenom varchar(50) NOT NULL,
    nom varchar(50) NOT NULL,
    pseudo varchar(20) NOT NULL,
    `password` varchar(255) NOT NULL,
    email varchar(128) UNIQUE NOT NULL,
    numero varchar(20) UNIQUE NOT NULL,
    adresse1 varchar(128),
    codePostal int,
    ville varchar(20),
    dateAdhesion date NOT NULL
);
```

Et enfin, on peut ajouter des index et contraintes d'unicité (cf. table adherents de `poney.sql`).

Pour créer une contrainte de clé étrangère il faut :

- trouver le type du champ auquel on veut faire référence. Le champ `profils.adherentID` fait référence à `adherents.adherentID`, donc il faut que le champ que l'on fabrique dans la table profils ait le même type que dans adherents.

- Créer la contrainte en fin de requête de création :

```sql
CREATE TABLE profils (
    -- profilID int PRIMARY KEY AUTO_INCREMENT,
    -- titre varchar(50) NOT NULL,
    -- photo varchar(50),
    -- `description` text NOT NULL,
    -- adherentID int NOT NULL,
    CONSTRAINT adherentID_FK FOREIGN KEY (adherentID) REFERENCES adherents (adherentID)
);
```

Pour faire une clé primaire composite, la syntaxe est assez simple : on ne met pas le `PRIMARY KEY` sur les lignes de création des champs mais à la fin sous la forme suivante :

```sql
CREATE TABLE interetAdherent (
    -- centreInteretID int NOT NULL,
    -- adherentID int NOT NULL,
    PRIMARY KEY (centreInteretID, adherentID)
);
```

On peut mettre tous les champs qui composent la clé primaire entre parenthèse.