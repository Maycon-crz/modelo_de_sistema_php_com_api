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
                                <!-- código para adicionar a imagem -->
                                <img src="<?= $cropperPosts->make('theme/assets/img/posts/' . $posts["data"][$k]["image"], "300"); ?>" alt="<?= $posts["data"][$k]["title"]; ?> Imagem descritiva" class="form-control imagesPosts mx-auto mt-3">
                                <div class="card-body">
                                    <!-- código para adicionar o título -->
                                    <h2 class="card-title text-wrap h5 titleCard"><?= substr($posts["data"][$k]["title"], 0, 160); ?></h2>
                                    <!-- código para adicionar a descrição -->
                                    <p class="card-text"><?= substr($posts["data"][$k]["descriptions"], 0, 200); ?></p>
                                </div>
                                <div class="card-footer">
                                    <!-- código para adicionar o botão de "Ver Mais" -->
                                    <button type="button" id="<?= $posts[$k]["id"]; ?>" class="form-control buttonShowMoreStyle buttonShowMoreModalPHP" data-bs-toggle="modal" data-bs-target="#modalPHP<?= $k ?>">Ver Mais</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalPHP<?= $k ?>" tabindex="-1" role="dialog" aria-labelledby="modalPHP<?= $k ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content text-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPHP<?= $k ?>Label"><?= $posts["data"][$k]["title"]; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="card-text border"><?= $posts["data"][$k]["descriptions"]; ?></p>
                                        <div id="divDataAdditionalForModalPHP<?= $posts["data"][$k]["id"]; ?>"></div>
                                    </div>
                                    <div class="modal-footer">
                                    <?php if(isset($_SESSION["email"]) || isset($_SESSION["email"]) !== false) : ?>
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal"><a href="usuario" class="text-dark text-decoration-none">Comprar</a></button>                                        
                                    <?php else: ?>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalLogin">Comprar</button>
                                    <?php endif; ?>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
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