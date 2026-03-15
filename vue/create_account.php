<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Quizzle - Créer un compte</title>
    </head>

    <body>
        <header>
            <div class="header-container">
                <a href="index.php" class="retour-home">⬅ Accueil</a>
            </div>
        </header>

        <main>
            <div class="main-content">
                <form action="index.php?url=submit-create-account" method="POST" class="form-account">
                    <h2 class="main-title">Créer un compte</h2>

                    <?php if (isset($_SESSION["error_msg"])) : ?>
                        <h3><?= htmlspecialchars($_SESSION["error_msg"]);?></h3>
                    <?php endif; ?>

                    <label for="first_name">Prénom :</label>
                    <input type="first_name" id="first_name" name="first_nameU" required>

                    <label for="name">Nom :</label>
                    <input type="name" id="name" name="nameU" required>

                    <label for="email">Email :</label>
                    <input type="email" id="email" name="emailU" required>

                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="passwordU" required>

                    <button type="submit" class="submit-account">Valider</button>
                </form>
            </div>
        </main>
    </body>
</html>