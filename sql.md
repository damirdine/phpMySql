
CREATE DATABASE ma_base

///

CREATE TABLE users(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    fullname VARCHAR(128),
    email VARCHAR(256),
    password VARCHAR(128)
)

////   

# Ajouter colomn 

ALTER TABLE users add age INT

/// 

# Ajouter un contenu a notre table

INSERT INTO table (value1, value2, ...)
    VALUES 
    ('valeur 1', 'valeur 2', ...),
    ('valeur 1', 'valeur 2', ...);

///

# Supprimer un tableau 

drop table <table_name>; 

////

# Connection a mysql avec PDO

try{
    $mysqlClient = new PDO(
        'mysql;host=localhost;dbname=,my_recipes;chartset-utf8',
        'root',
        'root'
    );
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}


\\\\
    `INSERT INTO `: ajout d'une entrée ;

    `` UPDATE `` : modification d'une ou plusieurs entrées ;

   ` DELETE `: suppression d'une ou plusieurs entrées.


# Les jointures 

ref : [DOC SQL](https://sql.sh/cours/jointures)
- interner : 

    SELECT u.fullname, c.comment // Selectionner les noms des utilisteurs et les comments
    FROM users u                    // et a partir de la list des utilisateur
    INNER JOIN comments c           // Joindre les comments 
    ON u.id = c.id                  // La ou les id utilitstaeur et id commentaire correspondent