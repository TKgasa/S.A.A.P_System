<?php

abstract class ModelBasex
{
    //declare protected variables;
    protected $dbh; //database handler
    protected $stmt; //statements
    public function __construct()
    {
        //declare the database handler
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DBNAME, DB_USERNAME, DB_PASSWORD);
    }
    //create a function to prepare statements
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    //create a function to bind the data passed in the query string
    public function bind($param, $value, $type = null)
    {
        //check the data passed
        if (is_null($type)) {
            switch (true) {

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                    case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                    case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            } 
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    //create an execute function
    public function executeQuery()
    {
        $this->stmt->execute();
    }
    //validate if data has been executed
    public function checkLastInsert()
    {
        return $this->dbh->lastInsertId();
    }
    //create a function to return a row
    public function resultSingleRow()
    {
        $this->executeQuery();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    //create a function to return multiple rows
    public function resultSet()
    {
        $this->executeQuery();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
