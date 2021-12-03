# php_oop_crud_operations
performing CRUD operations in PHP using OOP and PDO 

plase edit "/classes/db.class.php" file according to your database settings

this project expects a database named ```oop_crud``` with table named ```tasks``` that has 5 columns

and a user named ```root``` with empty password

you can run the following command in your SQL shell to create the datebase and the table with necessary columns.

```
CREATE DATABASE oop_crud;
```

```
CREATE TABLE `oop_crud`.`tasks` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `task_name` VARCHAR(128) NOT NULL , `task_description` TEXT NOT NULL , `start_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `due_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```
