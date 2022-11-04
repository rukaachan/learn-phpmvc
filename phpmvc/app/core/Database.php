<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    //! koneksi server mysql dengan method pbo 
    {
        //! data source name 
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        //! penambahan option untuk tetap terjaga koneksi 
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    //! mempersiapkan query 
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    //! membuat data binding
    //! Data Binding adalah proses membangun koneksi antarmuka aplikasi (application UI)
    //! dan business logic. Data binding membuat kontrol-kontrol dalam form 
    //! terkoneski (terkait) dengan sumber-smber data. 

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() 
    {
        return $this->stmt->rowCount();
    }
}
