# Apprentissage PHP ET SQL (MySQL)

### Un Projet fil rouge qui a pour but d'apprendre à faire un site en PHP MySQL

#### Ce que j'ai pu voir :
* Gestion formulaire en PHP
* Style avec Bootstrap (CDN)
* Meilleure gestion de mes commits et plus descriptif
* Différence des requêtes `GET` et `POST`
* Se protéger contre les failles faille XSS (avec 'htmlspecialchars')
* Création de **superglobale** de SESSION (Passe par une requête GET ou POST (? Un COOKIE ?)) 
* Création de cookie : 
    - Sécurisez (Diminution de risque) un cookie avec les propriétés `httpOnly` et `secure`.
    - modifier.
* Base de données avec MySQL:
    - Faire des requêtes en PDO de façon à respecter les bonnes pratiques.
    - Les requêtes SQL.
    - Faire des requêtes en PDO avec des variables anonymes ` author = ? `ou avec des variables nommes `author = :arg_name`.
    * CRUD (CREAT READ UPDATE DELETE) :
        - (CREAT) Ajouter une recette.
        - (UPDATE) Éditer une recette.
        - (DELETE) Supprimer une recette.
    - Être informe des erreurs SQL `or die(print_r($db->errorInfo()))`
    - Les jointures SQL pour créer des relations entre les données.
    - Les fonctions SQL
* Déploiement de l'application:
    - Déploiement de l'application avec [Heroku](https://fr.wikipedia.org/wiki/Heroku).
    - Mise en place de base de donnée sur serveur distant.
    
#### Ressources :
* Cours [PHP MySQL](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql)
* Doc. [Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
* Doc. [PHP](https://www.php.net/manual/fr/index.php)
* Doc. [SQL](https://sql.sh/cours)