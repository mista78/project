# Project
> **Project** est framework PHP, mais pas comme tous les frameworks puisqu'il s'adresse à tous les débutants, car le code de celui-ci est entièrement en procédural. Ce qui permet à un débutant de partir sur une base qu'il peut connaitre et structurer.

## Création de pages (Modules)

Créer le dossier dans ``module``. Il devra comporter un dossier Controller et Views. Avec par défaut un fichier controller.php dans le dossier Controller.

```php
 /**********
 * /App/Module
 * /App/Module/page/
 * /App/Module/page/Controller/controller.php
 * /App/Module/page/Views/index.php
 **********/


 // Fichier controller.php

 // Chaque fonction correspond à une page 
 // Donc pour la page index, vous devez créer la fonction index et dans le dossier Views,  le fichier index.php
 function index() {

 }
```

## Connexion a la base de donnée

```php
 /**********
 * /App/Dep
 * /App/Dep/Database.php
 **********/

 return array(
 
 	 'host' => 'hostname',
 	 'base' => 'database',
 	 'user' => 'username',
 	 'pass' => 'password',
 
 );
```

*La suite en cours d'édition...*