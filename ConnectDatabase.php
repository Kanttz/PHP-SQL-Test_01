<?php
class ConnnectDatabase
{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dti_info_db";
    private $conn_db;


    public function getConnectDatabase()
    {
        $this->conn_db = null;

        try {

            $this->conn_db = new PDO("mysql:host=" .
                $this->host . ";dbname=" .
                $this->dbname, $this->username, $this->password);

            $this->conn_db->exec("set names utf8");

            $this->conn_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // เอาไว้ตรวจสอบ ตรวจสอบเสร็จแล้วให้ Comment
            //echo "Connected successfully"; 
        } catch (PDOException $e) {
            // เอาไว้ตรวจสอบ ตรวจสอบเสร็จแล้วให้ Comment
            //echo "Connection failed: " . $e->getMessage(); 
        }

        return $this->conn_db;
    } // ปิดเมธอด getConnectDatabase


} //ปิดคลาส ConnnectDatabase