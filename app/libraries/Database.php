<?php

// PDO DATABASE CLASS
// CONNECT TO DATABASE
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $dbname = DB_NAME;
    private $password = DB_PASS;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = 'pgsql:host='.$this->host.';dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // create pdo instance
        try{
            $this->dbh = new PDO($dsn,$this->user,$this->password,$options);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    // prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    // Bind values
    public function bind($param,$value,$type=null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }
    // Execute the prepared statement
    public function execute(){
        return $this->stmt->execute();
    }
    //  Get result set as array of objects
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //Get single record
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row Count
    public function rowCount(){
        return $this->stmt->rowCount();
    }

    // Get last insertid
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

    public function BeginTransaction(){
        return $this->dbh->beginTransaction();
    }
    public function Commit(){
        return $this->dbh->commit();
    }
    public function Rollback(){
        return $this->dbh->rollback();
    }
}