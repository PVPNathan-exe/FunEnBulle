<?php

use Config\Services;

?>
<?= $this->extend('template_base_view'); ?>

<?= $this->section('content'); ?>

<div class="accueil">
    <h1>Contactez-nous</h1>
    <p>Si vous avez des questions, n'hésitez pas à nous contacter en remplissant le formulaire ci-dessous.</p>

    <!-- Formulaire de contact -->
    <?= form_open(base_url().'public/contact/envoie'); ?>

    <!-- Nom -->
    <div class="form-group">
        <label for="nom">Nom :</label>
        <?= form_input([
            'name' => 'nom',
            'id' => 'nom',
            'class' => 'form-control',
            'placeholder' => 'Votre nom',
            'value' => set_value('nom') // Garder la valeur précédente en cas d'erreur
        ]); ?>
        <?= Services::validation()->showError('nom', 'list'); ?>
    </div>

    <!-- Prénom -->
    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <?= form_input([
            'name' => 'prenom',
            'id' => 'prenom',
            'class' => 'form-control',
            'placeholder' => 'Votre prénom',
            'value' => set_value('prenom')
        ]); ?>
        <?= Services::validation()->showError('prenom', 'list'); ?>
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email :</label>
        <?= form_input([
            'name' => 'email',
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Votre email',
            'type' => 'email',
            'value' => set_value('email')
        ]); ?>
        <?= Services::validation()->showError('email', 'list'); ?>
    </div>

    <!-- Sujet -->
    <div class="form-group">
        <label for="sujet">Sujet :</label>
        <?= form_input([
            'name' => 'sujet',
            'id' => 'sujet',
            'class' => 'form-control',
            'placeholder' => 'Le sujet de votre message',
            'value' => set_value('sujet')
        ]); ?>
        <?= Services::validation()->showError('sujet', 'list'); ?>
    </div>

    <!-- Message -->
    <div class="form-group">
        <label for="message">Message :</label>
        <?= form_textarea([
            'name' => 'message',
            'id' => 'message',
            'class' => 'form-control',
            'placeholder' => 'Votre message',
            'rows' => '4',
            'value' => set_value('message')
        ]); ?>
        <?= Services::validation()->showError('message', 'list'); ?>
    </div>

    <!-- Bouton d'envoi -->
    <div class="form-group">
        <?= form_submit('submit', 'Envoyer', ['class' => 'btn btn-primary']); ?>
    </div>

    <?= form_close(); ?>

    <!-- Affichage de la confirmation ou des erreurs -->
    <?php if (isset($confirmation) && $confirmation): ?>
        <div class="confirmation">
            <h3>Merci pour votre message, <?= esc($nom); ?> !</h3>
            <p><strong>Email:</strong> <?= esc($email); ?></p>
            <p><strong>Message:</strong></p>
            <p><?= nl2br(esc($message)); ?></p>
        </div>
    <?php endif; ?>

    <?php if (isset($validation) && $validation->getErrors()): ?>
        <div class="alert alert-danger">
            <h4>Des erreurs se sont produites :</h4>
            <ul>
                <?php foreach ($validation->getErrors() as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
