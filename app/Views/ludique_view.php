<?= $this->extend('template_base_view'); ?>

<?= $this->section('content'); ?>

<div class=ludique>
    <h1><?= $titre ?></h1>
    <?= form_open(base_url() . 'public/validerRep');
    $questioncourante = "";
    $radio_id = 1;
    foreach ($questions as $question):
    if ($questioncourante != $question->question):
    if ($questioncourante == ""):
    ?>
<div class='question-block'>
<?php else : ?>
</div>
    <div class='question-block'>
        <?php
        endif;
        $questioncourante = $question->question;
        ?>
        <p><?= $question->question; ?></p>
        <?php endif;
        $radio_id = 'reponse_' . $radio_id;
        $data = array(
            'name' => $question->id,
            'id' => $radio_id,
            'value' => $question->reponse);
        ?>
        <span>
            <?= form_radio($data); ?>
            <?= form_label($question->reponse, $radio_id); ?>
        </span>
        <?php
        $radio_id++;
        endforeach;
        ?>
    </div>
    <p>
        <?php
        $data = array(
            'name' => 'submit',
            'id' => 'submit',
            'value' => 'Valider');
        echo form_submit($data);
        ?>
    </p>
    <?= form_close(); ?>

    <?= $this->endSection(); ?>

