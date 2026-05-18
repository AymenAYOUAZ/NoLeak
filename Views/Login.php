<?php 
require 'includes/header.php';

// Rediriger si déjà connecté
if(isset($_SESSION['user'])) {
    header('Location: /NoLeak/index.php?page=home');
    exit();
}
?>

<div class="container-center">

    <div class="login-card">
         <?php if(isset($erreur)): ?>

            <p class="meta">
                <?= htmlspecialchars($erreur) ?>
            </p>

        <?php endif; ?>

        <h2>Bienvenue !</h2>

        <p class="login-subtitle">
            Connectez-vous à votre compte pour continuer.
        </p>

       



        <form action="index.php?page=login" method="POST">

            <div class="form-group">

                <label>Email</label>

                <input 
                    type="email" 
                    name="email"
                    placeholder="Entrez votre email"
                    required
                >

            </div>

            <div class="form-group">

                <label>Mot de passe</label>

                <input 
                    type="password"
                    name="password"
                    placeholder="Entrez votre mot de passe"
                    required
                >

            </div>

            <div class="remember-row">

                <div class="checkbox">

                    <input type="checkbox">

                    <span>Se souvenir de moi</span>

                </div>

                <a href="index.php?page=forgot" class="forgot-link">
                    Mot de passe oublié ?
                </a>

            </div>

            <button type="submit" class="login-btn">
                Se connecter
            </button>

        </form>

    
        <p class="register-text">

            Pas encore de compte ?

            <a href="index.php?page=register">
                S'inscrire
            </a>

        </p>

    </div>

</div>

<?php require 'includes/footer.php'; ?>