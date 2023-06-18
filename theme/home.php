<?php $v->layout("_theme"); ?>
<section class="row">
    <article class="col-12 border">
        <h1 class="text-center">Modelo de site com API para externalizar dados</h1>        
    </article>    
</section>

<?= $v->start("modal"); ?>
    <?php include "theme/include/modalLogin.php"; ?>
<?= $v->end(); $v->start("js"); ?>
    <script src="<?= url('theme/assets/js/authentication.js'); ?>"></script>
<?= $v->end(); ?>
