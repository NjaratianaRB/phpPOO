<?php

namespace Database;

use PDO;

class DBConnection{
    
    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;

    public function __construct(string $dbname, string $host, string $username, string $password)   
    {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;

    }

    public function getPDO(): PDO
    {

        return $this->pdo ?? $this->pdo = new PDO( "mysql:dbname={$this->dbname};host={$this->host}", $this->username, $this->password,
        //configuration d'attribut sous forme de tableau
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION , //mamoaka erreur raha misy

            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,//Mamoaka an'ilay PDO ho Objet

            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'//mamoaka ny charactere special
        ]
            
        );
       
    }
}