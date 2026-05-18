<?php require 'includes/header.php'; ?>

<div class="container-center">

    <div class="form-card">

        <div class="form-header">

            <h2>Créer un compte</h2>

            <p>
                Rejoignez NoLeak et commencez vos QCM en toute sécurité.
            </p>

        </div>

        <?php if(isset($erreur)): ?>

            <p class="meta">

                <?= htmlspecialchars($erreur) ?>

            </p>

        <?php endif; ?>

        <form action="index.php?page=register" method="POST">

            <div class="form-group">

                <label for="username">
                    Nom d'utilisateur*
                </label>

                <input 
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Votre nom d'utilisateur"
                    autocomplete="off"
                    required
                >

            </div>

            <div class="form-group">

                <label for="email">
                    Adresse Email*
                </label>

                <input 
                    type="email"
                    id="email"
                    name="email"
                    placeholder="email@example.com"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Mot de passe*
                </label>

                <input 
                    type="password"
                    id="password"
                    name="password"
                    placeholder="6 caractères minimum"
                    required
                >

            </div>

            <div class="checkbox">

                <input type="checkbox" required>

                <span>
                    J'accepte les conditions d'utilisation *
                </span>

            </div>

            <button type="submit" class="btn-primary" style="width:100%;">

                S'inscrire

            </button>

        </form>

        <div class="form-footer">

            Déjà un compte ?

            <a href="index.php?page=login">

                Se connecter

            </a>

        </div>

    </div>

</div>

<?php require 'includes/footer.php'; ?>