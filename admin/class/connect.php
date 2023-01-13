<?php


class Connect
{
    private const HOST = "localhost";
    private const DBNAME = "db_realestate";
    private const CHARSET = "UTF8";
    private const USERID = "root";
    private const PASSWORD = "";
    private $db = NULL;
    private $stmt = NULL;
    public $lastInsertId = NULL;

    public function __construct()
    {
        try {
            $connectionString = "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME . ";charset=" . self::CHARSET . "";
            $this->db = new PDO($connectionString, self::USERID, self::PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {

            echo $ex->getMessage();
        }
    }

    public function __destruct()
    {
        $this->db = NULL;
    }


    public function create($query, $params)
    {
        try {

            $this->stmt = $this->db->prepare($query);
            $this->db->beginTransaction();
            $this->stmt->execute($params);
            $this->lastInsertId = $this->db->lastInsertId();
            $this->db->commit();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function read($query, $params = NULL)
    {
        try {
            if (is_null($params)) {
                $this->stmt = $this->db->query($query);
            } else {
                $this->stmt = $this->db->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function update($query, $params = NULL)
    {
        try {
            if (is_null($params)) {
                $this->stmt = $this->db->query($query);
            } else {
                $this->stmt = $this->db->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function delete($query, $params = NULL)
    {
        try {
            if (is_null($params)) {
                $this->stmt = $this->db->query($query);
            } else {
                $this->stmt = $this->db->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
}
