<?php
    use CoffeeCode\Cropper\Cropper;
    $v->layout("_theme");
    $cropperPosts = new Cropper("theme/assets/img/posts/cache");
?>
<section class="row">
    <article class="col-12 border">
        <h1 class="text-center">Modelo de site com API para externalizar dados</h1>        
    </article>    
</section>

<?php 
$qtdPosts = count($posts["data"]);
$postsPerPage = 4;
if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/iphone|android|blackberry|opera mini|mobile/', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $postsPerPage = 1;
}
?>
<section id="postsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php for ($i = 0; $i < $qtdPosts; $i += $postsPerPage) : ?>
            <div class="carousel-item <?= ($i == 0) ? 'active' : ''; ?>">
                <div class="row">
                    <?php for ($k = $i; $k < min($i + $postsPerPage, $qtdPosts); $k++) : ?>
                        <div class="col-12 col-md-3">
                            <div class="card my-3 shadow-lg bg-transparent rounded">
                                <!-- código para adicionar a imagem do filme -->
                                <img src="<?= $cropperPosts->make('theme/assets/img/posts/' . $posts["data"][$k]["image"], "300"); ?>" alt="<?= $posts["data"][$k]["title"]; ?> Imagem descritiva" class="form-control imagesPosts mx-auto mt-3">
                                <div class="card-body">
                                    <!-- código para adicionar o título do filme -->
                                    <h2 class="card-title text-wrap h5 titleCard"><?= substr($posts["data"][$k]["title"], 0, 160); ?></h2>
                                    <!-- código para adicionar a descrição do filme -->
                                    <p class="card-text"><?= substr($posts["data"][$k]["descriptions"], 0, 200); ?></p>
                                </div>
                                <div class="card-footer">
                                    <!-- código para adicionar o botão de "Ver Mais" -->
                                    <button type="button" id="<?= $posts[$k]["id"]; ?>" class="form-control buttonShowMoreStyle buttonShowMoreModalPHP" data-bs-toggle="modal" data-bs-target="#modalPHP<?= $k ?>">Ver Mais</button>
                                </div>
                            </div>
                        </div>                        
                    <?php endfor; ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <!-- botões para navegar entre os slides do carrossel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#postsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#postsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

<?= $v->start("js"); ?>
<?= $v->end(); ?>