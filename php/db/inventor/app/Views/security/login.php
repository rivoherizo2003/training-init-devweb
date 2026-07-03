<?php

use Codemdg\Core\Views\BlockBuilder;

BlockBuilder::startBlock("additionnal_css");
?>
<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
<?php
BlockBuilder::endBlock();
?>
<?php
BlockBuilder::startBlock("content");
?>
<div class="login-page">

    <!-- Section gauche : Logo et nom de l'application -->
    <section class="login-brand">
        <img src="/assets/images/logo.png" alt="Logo Kanban" class="login-brand__logo">
        <span class="login-brand__name">INVENTOR</span>
    </section>

    <!-- Section droite : Formulaire de connexion -->
    <section class="login-form-section">
        <div class="login-form-container">

            <!-- En-tête avec petit logo et titres -->
            <div class="login-form-header">
                <img src="/assets/images/logo.png" alt="Logo Kanban" class="login-form-header__logo">
                <h1 class="login-form-header__title">Log in to your account</h1>
                <p class="login-form-header__subtitle">Welcome back! Please enter your details.</p>
            </div>

            <!-- Formulaire -->
            <form action="#" method="post">

                <!-- Champ Email -->
                <div class="form-group">
                    <label for="email" class="form-group__label">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-group__input"
                        placeholder="Enter your email"
                        required>
                </div>

                <!-- Champ Password -->
                <div class="form-group">
                    <label for="password" class="form-group__label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-group__input"
                        placeholder="••••••••"
                        required>
                </div>

                <!-- Options : Remember me + Forgot password -->
                <div class="login-options">
                    <label class="login-options__remember">
                        <input type="checkbox" name="remember">
                        Remember for 30 days
                    </label>
                    <a href="#" class="login-options__forgot">Forgot password</a>
                </div>

                <!-- Bouton Sign in -->
                <button type="submit" class="btn btn--primary">Sign in</button>

                <!-- Bouton Sign in with Google -->
                <button type="button" class="btn btn--outline">
                    <img
                        src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                        alt="Google"
                        class="btn__icon">
                    Sign in with Google
                </button>

            </form>

            <!-- Footer : lien vers inscription -->
            <p class="login-footer">
                Don't have an account? <a href="#" class="login-footer__link">Sign up</a>
            </p>

        </div>
    </section>

</div>
<?php BlockBuilder::endBlock() ?>