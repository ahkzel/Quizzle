<?php
$lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
        [$key, $value] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

class CoPDO {
    private $host;
    private $port;
    private $db_name;
    private $username;
    private $password;
    private $con;

    public function co_pdo() {
        $this->con = NULL;

        try {
            $this->con = new PDO(
                "mysql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'], 
                $_ENV['DB_USER'], 
                $_ENV['DB_PASSWORD'], 
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