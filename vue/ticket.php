<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Quizzle - Ticket</title>
    </head>

    <body>
        <header>
            <div class="header-container">
                <a href="index.php" class="retour-home">⬅ Accueil</a>

                <h1>Créer un ticket</h1>
                
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
                <h2 class="main-title">Ticket</h2>
                <p>Question concernée : <strong><?= htmlspecialchars($question_label) ?></strong></p>

                <form method="POST" action="index.php?url=ticket-submit&id_question=<?= htmlspecialchars($id_question) ?>">
                    <div>
                        <label for="type_ticket">Type du ticket :</label>
                        <select name="type_ticket" id="type_ticket" required>
                            <option value="">-- Choisir --</option>
                            <option value="technique">Technique</option>
                            <option value="contenu">Contenu</option>
                        </select>
                    </div>
                    <div>
                        <label for="contenu">Contenu du ticket :</label>
                        <textarea name="contenu" id="contenu" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-valider">Valider</button>
                </form>
            </div>
        </main>

        <footer>
            <p>&copy; 2025 - Wiki40k, Axel Beaulieu-Luangkham. Tous droits réservés.</p>
        </footer>
    </body>
</html>