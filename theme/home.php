<?php $v->layout("_theme"); ?>
<section class="row">
    <article class="col-6 border">
        <h1>Título</h1>
        <button type="button">Comprar meu ingresso</button>
    </article>
    <article class="col-6 border">Imagem</article>
</section>

<section class="row">
    <article class="col-4 border">
        <img class="d-block mx-auto" src="<?= url('theme/assets/img/logo_provisorio.PNG'); ?>">
        <h3 class="border">Título do Filme</h3>
        <p class="border">Descrição do filme, aqui vai ser descrito um pouco sobre o filme</p>
        <p class="border">Exibição: <time datetime="2008-02-14 20:00">Hoje: 10:00</time></p>
    </article>
    <article class="col-4 border">
        <img class="d-block mx-auto" src="<?= url('theme/assets/img/logo_provisorio.PNG'); ?>">
        <h3 class="border">Título do Filme</h3>
        <p class="border">Descrição do filme, aqui vai ser descrito um pouco sobre o filme</p>
        <p class="border">Exibição: <time datetime="2008-02-14 20:00">Hoje: 10:00</time></p>
    </article>
    <article class="col-4 border">
        <img class="d-block mx-auto" src="<?= url('theme/assets/img/logo_provisorio.PNG'); ?>">
        <h3 class="border">Título do Filme</h3>
        <p class="border">Descrição do filme, aqui vai ser descrito um pouco sobre o filme</p>
        <p class="border">Exibição: <time datetime="2008-02-14 20:00">Hoje: 10:00</time></p>
    </article>
</section>
<section class="row">
    <article class="col-4 border">
        <img class="d-block mx-auto" src="<?= url('theme/assets/img/logo_provisorio.PNG'); ?>">
        <h3 class="border">Título do Filme</h3>
        <p class="border">Descrição do filme, aqui vai ser descrito um pouco sobre o filme</p>
        <p class="border">Exibição: <time datetime="2008-02-14 20:00">Hoje: 10:00</time></p>
    </article>
    <article class="col-4 border">
        <img class="d-block mx-auto" src="<?= url('theme/assets/img/logo_provisorio.PNG'); ?>">
        <h3 class="border">Título do Filme</h3>
        <p class="border">Descrição do filme, aqui vai ser descrito um pouco sobre o filme</p>
        <p class="border">Exibição: <time datetime="2008-02-14 20:00">Hoje: 10:00</time></p>
    </article>
    <article class="col-4 border">
        <img class="d-block mx-auto" src="<?= url('theme/assets/img/logo_provisorio.PNG'); ?>">
        <h3 class="border">Título do Filme</h3>
        <p class="border">Descrição do filme, aqui vai ser descrito um pouco sobre o filme</p>
        <p class="border">Exibição: <time datetime="2008-02-14 20:00">Hoje: 10:00</time></p>
    </article>
</section>
<section class="row p-5">
    <div class="col-12 rounded-pill bg-dark text-center pt-5 pb-1">
        <h6 class="h1 mt-5">Ver Mais <br> Ingressos</h6>
        <div class="bg-secondary d-block mx-auto mt-5 boder rounded-circle inconeMaisIngressos">⌵︎</div>
    </div>
</section>

<?= $v->start("modal"); ?>
    <?php include "theme/include/modalLogin.php"; ?>
<?= $v->end(); $v->start("js"); ?>
    <script src="<?= url('theme/assets/js/authentication.js'); ?>"></script>
<?= $v->end(); ?>



