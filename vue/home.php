<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Quizzle - Accueil</title>
    </head>

    <body>
        <header>
            <div class="header-container">
                <div class="header-left">
                    <a href="index.php" class="retour-home">⬅ Accueil</a>
                    <!-- <a href="index.php?url=questions" class="retour-home">⬅ Questions</a> -->
                </div>

                <h1>Accueil</h1>
                
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
                <h2 class="main-title">Questionnaires publics</h2>
                <?php foreach ($all_quizzes as $quizz): ?>

                <?php endforeach; ?>

                <table class="quizz-table">
                    <thead class="quizz-table-head">
                        <tr>
                            <th>Nom</th>
                            <th>Thème</th>
                            <th>Auteur</th>
                            <th>Nombre de questions</th>
                            <th>Voir les questions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_quizzes as $quizz) : ?>
                            <?php if ($quizz["publie"] == 1) : ?>
                                <tr>
                                    <td class="quizz-table-cell"><b><?= htmlspecialchars($quizz["name_quizz"]) ?></b></td>
                                    <td class="quizz-table-cell"><?= htmlspecialchars($quizz["theme"]) ?></td>
                                    <td class="quizz-table-cell"><?= htmlspecialchars($quizz["user"]) ?></td>
                                    <td class="quizz-table-cell"><?= htmlspecialchars($quizz["nb_questions"]) ?></td>
                                    <td class="quizz-table-cell">
                                        <a href="index.php?url=questions&id_questionnaire=<?= $quizz['id'] ?>">
                                            <b>Voir les questions</b>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <canvas id="quizz1"></canvas>
                <canvas id="quizz2"></canvas>
                <canvas id="quizz3"></canvas>
            </div>
        </main>

        <footer>
            <p>&copy; 2025 - Wiki40k, Axel Beaulieu-Luangkham. Tous droits réservés.</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="assets/scripts.js"></script>
    </body>
</html>