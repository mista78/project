# Project
> Project est framework php mais pas comme tout les framework il s'address a tout les debutant, car le code celui-ci est entierement en procedural et permet à un debutant de partir sur une base qu'il peut connaitre et structurer ... le readme se completera aux file du developpement du framework .

## Creation de page(Module)

Crée le dossier dans module , il devras comporter un dossier Controller et Views , avec par defaut un fichier controller.php dans le dossier Controller

```php
 /**********
 * /App/Module
 * /App/Module/page/
 * /App/Module/page/Controller/controller.php
 * /App/Module/page/Views/index.php
 **********/


 // Fichier controller.php

 // Chaque fonction egale une page 
 // Donc pour la page index on creer la fonction index et dans views le fichier index.php
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

*La suite encoure d'édition ......*