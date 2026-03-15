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
                <a href="index.php" class="retour-home">⬅ Accueil</a>

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
<<<<<<< HEAD
                <?php foreach ($quizzes as $quizz): ?>

                <?php endforeach; ?>
=======
                <?php foreach ($all_quizzes as $quizz): ?>

                <?php endforeach; ?>

                <table class="quizz-table">
                    <thead class="quizz-table-head">
                        <tr>
                            <th>Nom</th>
                            <th>Thème</th>
                            <th>Auteur</th>
                            <th>Nombre de questions</th>
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
                                </tr>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
>>>>>>> 21cf8a92e555a037057e7dc963aba8561e37cf85
            </div>
        </main>

        <footer>
            <p>&copy; 2025 - Wiki40k, Axel Beaulieu-Luangkham. Tous droits réservés.</p>
        </footer>
    </body>
</html>