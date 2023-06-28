<?php $v->layout("_theme"); ?>

<section class="row">
    <article class="col-md-6 col-sm-12">
        <h1><span class="mainTitle">Usuário: <?= $_SESSION["full_name"]; ?></h1>
    </article>
</section>

<?php require_once("include/userOptions/postsOperationsView.php"); ?>

<?= $v->start("js"); ?>
<script src="<?= url('theme/assets/js/userOptions/registration/postRegistration.js'); ?>"></script>
<script src="<?= url('theme/assets/js/userOptions/edition/postEdition.js'); ?>"></script>
<?= $v->end(); ?>