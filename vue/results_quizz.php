<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Quizzle - Questions</title>
    </head>

    <body>
        <header>
            <div class="header-container">
                <a href="index.php" class="retour-home">⬅ Accueil</a>

                <h1>Résultats du questionnaire</h1>
                
                <div class="user-links">
                    <?php if (!isset($_SESSION["emailU"])) : ?>
                        <a href="index.php?url=create-account">Créer un compte</a>
                        <a href="index.php?url=login">Se connecter</a>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <main>
            <div class="main-content">
                <h2 class="main-title">Résultats — <?= htmlspecialchars($questionnaire_nom) ?></h2>
                <script>
                    const user_score = <?= $user_score ?>;
                    const max_score = <?= $max_score ?>;
                    const number_right_answer = <?= $number_right_answer ?>;
                    const total_number_of_answer = <?= $total_number_of_answer ?>;
                </script>
                <div class="charts-container">
                    <div class="chart-wrapper">
                        <p>Votre score :</p>
                        <canvas id="quizz_score_result"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <p>Nombre de bonnes réponses :</p>
                        <canvas id="right_answer_number_result"></canvas>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; 2025 - Wiki40k, Axel Beaulieu-Luangkham. Tous droits réservés.</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="assets/scripts.js"></script>
    </body>
</html>