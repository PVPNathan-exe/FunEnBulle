<?= $this->extend('template_base_view'); ?>

<?= $this->section('content'); ?>
<div class="pratique">
    <h1>Infos Pratiques</h1>
    <div class="section">
        <h2><span class="icon"></span> Tarifs</h2>
        <div class="tarif">
            <p><strong>Adultes :</strong> 10 euros</p>
            <p><strong>Moins de 16 ans :</strong> gratuits</p>
        </div>
    </div>
    <hr>
    <div class="section">
        <h2><span class="icon">⏰</span> Horaires</h2>
        <div class="jour">
            <p><strong>Vendredi 20 JUIN 2025</strong></p>
            <p>14h30 à 18h00</p>
        </div>
        <div class="jour">
            <p><strong>Samedi 21 JUIN 2025</strong></p>
            <p>10h00 à 18h00</p>
        </div>
        <div class="jour">
            <p><strong>Dimanche 22 JUIN 2025</strong></p>
            <p>10h00 à 17h00</p>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
