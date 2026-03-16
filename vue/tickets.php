<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Quizzle - Tickets</title>
    </head>

    <body>
        <header>
            <div class="header-container">
                <a href="index.php" class="retour-home">⬅ Accueil</a>

                <h1>Tickets</h1>
                
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
                <h2 class="main-title">Tickets — <?= htmlspecialchars($question_label) ?></h2>
                <table class="quizz-table">
                    <thead class="quizz-table-head">
                        <tr>
                            <th>Utilisateur</th>
                            <th>Type de ticket</th>
                            <th>Contenu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_tickets as $ticket) : ?>
                            <tr>
                                <td class="quizz-table-cell"><?= htmlspecialchars($ticket["user"]) ?></td>
                                <td class="quizz-table-cell"><?= htmlspecialchars($ticket["type"]) ?></td>
                                <td class="quizz-table-cell"><?= htmlspecialchars($ticket["contenu"]) ?></td>
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