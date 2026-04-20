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

                <h1>Questions</h1>
                
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
                <h2 class="main-title">Questions — <?= htmlspecialchars($questionnaire_nom) ?></h2>
                <table class="quizz-table">
                    <thead class="quizz-table-head">
                        <tr>
                            <th>N°</th>
                            <th>Label</th>
                            <th>Type</th>
                            <th>Ticket</th>
                            <th>Voir les tickets</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_questions as $question) : ?>
                            <tr>
                                <td class="quizz-table-cell"><?= htmlspecialchars($question["num"]) ?></td>
                                <td class="quizz-table-cell"><?= htmlspecialchars($question["label"]) ?></td>
                                <td class="quizz-table-cell"><?= htmlspecialchars($question["type"]) ?></td>
                                <td class="quizz-table-cell">
                                    <a href="index.php?url=ticket&id_question=<?= $question['id'] ?>">
                                        <button class="generic-button">Ticket</button>
                                    </a>
                                </td>
                                <td class="quizz-table-cell">
                                    <a href="index.php?url=tickets&id_question=<?= $question['id'] ?>">
                                        <button class="generic-button">Tous les tickets</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <footer>
            <p>&copy; 2025 - Wiki40k, Axel Beaulieu-Luangkham. Tous droits réservés.</p>
        </footer>
    </body>
</html>