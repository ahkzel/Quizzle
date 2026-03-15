<?php
class Theme_model {
    private $pdo;

    public function __construct($pdo) {
        if (isset($pdo)) $this->pdo = $pdo;
    }

    public function get_theme_from_id($id_theme){
        $theme_name = "";

        try {
            $req = $this->pdo->prepare("select nom from theme where id = :id_theme;");
            $req->bindValue(':id_theme', $id_theme, PDO::PARAM_INT);
            $req->execute();

            $theme_name = $req->fetch(PDO::FETCH_ASSOC)["nom"];
        }
        catch (PDOException $e) {
            print($e->getMessage());
            die();
        }

        return $theme_name;
    }
    
}
?>