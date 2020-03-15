# SYMFONY-Udemy
https://www.udemy.com/course/creer-4-applications-avec-symfony-v4-evolution-progressive/

## Lancement
- cloner le dossier et se placer dans celui-ci
- se rendre dans l'un des dossiers (une application par dossier)
```
composer install
```
- modifier le fichier .env
```
php bin/console d:d:c
```

```
php bin/console d:m:m
```

```
php bin/console d:f:l
```

```
php -S localhost:8000 -t public
```

- se rendre sur l'[accueil](http://localhost:8000)

### Application 1

- pas besoin de créer de base de données
- les données sont récupérées depuis le dossier Entity
- Affichage des personnages et des armes, d'un personnage et d'une arme

### Application 2

- base de données à créer et fixtures à lancer
- affichage d'animaux, leurs espèces, leurs continents, leurs maîtres

### Application 3

- base de données + administration
- recettes: aliments et types
- utilisation de VichUploader
- NB: vérifier l'environnement (dev/prod) et les valeurs nullables dans la BDD.

### Application 3BIS

- mode administrateur
- inscription/connexion (cryptage argon)
- roles

### Application 5

- parc de voiture
- CRUD
- utilisateurs-roles
- recherche de voitures par tranche d'années
- CRUD des voitures




