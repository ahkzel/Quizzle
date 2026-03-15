<?php
class CoPDO {
    private $host = 'localhost';
    private $db_name = 'ppe';
    private $username = 'root';
    private $password = 'FrouFrou';
    private $con;

    public function co_pdo() {
        $this->con = NULL;

        try {
            $this->con = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password, 
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->con;
    }
}
?>