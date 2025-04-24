<?php

class DataBase
{
    private $localhost = DB__HOST;
    private $username = DB__USER;
    private $password = DB__PASS;
    private $dbname = DB__NAME;
    public $db;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->localhost;dbname=$this->dbname;";
            $username = $this->username;
            $password = $this->password;
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (Exception $e) {
            $error = new ErrorPage();
            $error->_500_();
        }
    }
}
