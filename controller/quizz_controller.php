<?php
include_once __DIR__."/pdo_controller.php";
include_once __DIR__."/../model/quizz_model.php";
include_once __DIR__."/../model/user_model.php";
include_once __DIR__."/../model/theme_model.php";
include_once __DIR__."/../model/contains_model.php";

class Quizz_controller {
    private $pdo;
    private $quizz_model;
    private $theme_model;
    private $contains_model;
    private $user_model;

    public function __construct($pdo_controller) {
        $this->pdo = $pdo_controller->get_pdo();
        $this->quizz_model = new Quizz_model($this->pdo);
        $this->theme_model = new Theme_model($this->pdo);
        $this->contains_model = new Contains_model($this->pdo);
        $this->user_model = new User_model($this->pdo);
    }

    public function show_homepage() {
        $all_quizzes = array();
        $TEMP_all_quizzes = $this->quizz_model->get_all_quizzes();

        foreach ($TEMP_all_quizzes as $TEMP_quizz){
            $TEMP_label_theme = $this->theme_model->get_theme_from_id($TEMP_quizz["id_theme"]);
            $TEMP_name_user = $this->user_model->get_user_from_id($TEMP_quizz["id_user"])["name"];
            $TEMP_nb_question = $this->contains_model->get_question_number_from_quizz_id($TEMP_quizz["id"]);

            $all_quizzes[] = (["name_quizz" => $TEMP_quizz["nom"], "publie" => $TEMP_quizz["publie"], "theme" => $TEMP_label_theme,
            "user" => $TEMP_name_user, "nb_questions" => $TEMP_nb_question]);
        }
        include __DIR__."/../vue/home.php";
    }

    public function handle_NULL($item) {
        if ($item == NULL) {
            return "N/A";
        }
        return $item;
    }
}
?>