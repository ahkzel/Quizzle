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

                <h1>Répondre au questionnaire</h1>
                
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
                <form action="index.php?url=submit-answer-quizz" method="POST" class="generic-form">
                    <input type="hidden" name="id_questionnaire" value="<?= $id_questionnaire ?>">
                    <?php foreach ($all_questions as $question) : ?>
                        <fieldset class="question-block">
                            <legend><?= htmlspecialchars($question['label']) ?></legend>
                            <div class="answers-grid">
                                <?php foreach ($question['reponses'] as $reponse) : ?>
                                    <label class="answer-label">
                                        <input type="radio" name="question_<?= $question['id'] ?>" value="<?= $reponse['id'] ?>"required>
                                        <?= htmlspecialchars($reponse['label']) ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </fieldset>
                    <?php endforeach; ?>
                    <button type="submit" class="btn-submit">Soumettre</button>
                </form>
            </div>
        </main>

        <footer>
            <p>&copy; 2025 - Wiki40k, Axel Beaulieu-Luangkham. Tous droits réservés.</p>
        </footer>
    </body>
</html>