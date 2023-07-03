<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?= $head; ?>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= url("theme/assets/css/style.css"); ?>" />
</head>
<body>
	<nav class="navbar navbar-expand-lg main_nav">
		<div class="container-fluid">
			<?php if($v->section("slidebar")): 
				echo $v->section("slidebar");
			else:
				?>
				<a title="Nome do Site: MODELO" class="navbar-brand" href="<?= url(''); ?>">MODELO</a>
				<a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span>| | |</span>
                </a>
				<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li>
						<a title="" href="<?= url() ?>">SOBRE</a>
					</li><li>
						<a title="" href="<?= url("teste"); ?>">CATEGORIAS</a>
					</li><li>						
						<a title="" href="<?= url("contato"); ?>">CONTATO</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">					
					<?php if (!isset($_SESSION["email"]) || isset($_SESSION["email"]) === false) : ?>
					<li>
						<button type="button" class="form-control btn btn-outline-success py-2 my-2" data-bs-toggle="modal" data-bs-target="#modalLogin">ENTRAR</button>
					</li>
					<?php else: ?>
					<li>
						<a title="" class="py-2 my-2 mx-4" href="<?= url("user"); ?>">Painel</a>
					</li>
					<li>					
						<button type="button" id="buttonLogOut" class="form-control btn btn-outline-danger py-2 my-2">SAIR</button>
					</li>
					<?php endif; ?>					
				</ul>
			<?php endif; ?>
		</div>
	</nav>
	<main class="main_content container-fluid">
		<?= $v->section("content"); ?>
	</main>	
	<div class="loadingGif"></div>
	<footer class="row px-5 pt-5 mt-5">
		<section class="col-12 rounded-pill bg-dark text-center text-white pt-5 pb-5 mb-5">
			<div class="row">
				<div class="col-4">
					<div class="d-flex">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svgIcons"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>
						<h4>Cidade</h4>
					</div>
					<label>----------------------------</label>
				</div>
				<div class="col-4">
					<div class="d-flex">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svgIcons"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z"/></svg>					
						<h4>Entre em contato</h4>
					</div>
					<label>--------</label>
				</div>
				<div class="col-4">
					<h4>Envie uma mensagem</h4>
					<div class="d-flex text-center">
						<label>--------</label>
					</div>
				</div>
			</div>
		</section>
		<section class="col-12  pt-5 pb-1 my-5">
			<div class="row">
				<div class="col-3 border-end">
					<h4 class='h1'>Logo</h4>
					<label></label>
				</div>
				<div class="col-3 border-end">
					<ul class="list-unstyled">
						<li>SOBRE</li>
						<li>CATEGORIAS</li>
					</ul>	
				</div>
				<div class="col-3 border-end">
					<h4 class='h6'>DÚVIDAS FREQUENTES</h4>
					<label></label>
				</div>
				<div class="col-3">
					<h4 class='h6'>SOCIALIZE  CONOSCO PELAS REDES SOCIAIS</h4>
					<ul class="list-unstyled">
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svgIconsFooter p-1"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svgIconsFooter p-1"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svgIconsFooter p-1"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
						</li>
						<li>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svgIconsFooter p-1"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svgIconsFooter p-1"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svgIconsFooter p-1"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"/></svg>
						</li>
					</ul>										
				</div>
			</div>
		</section>
		<section class="text-center">
			<?= SITE; ?> - Todos os Direitos Reservados	
		</section>
	</footer>
	<form><input type="hidden" name="urlSite" id="urlSite" value="<?= url() ?>"></form>
	<!-- Javascrip bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- --- -->
	<!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- --- -->
	<script src="<?= url('theme/assets/js/authentication/session.js'); ?>"></script>
	<?php if (!isset($_SESSION["token"]) || $_SESSION["token"] === false) : ?>	
		<?php include "theme/include/modalLogin.php"; ?>
		<script src="<?= url('theme/assets/js/authentication/login.js'); ?>"></script>
		<script src="<?= url('theme/assets/js/authentication/userRegistration.js'); ?>"></script>		
	<?php else: ?>
		<script src="<?= url('theme/assets/js/authentication/logOut.js'); ?>"></script>
	<?php endif; ?>
	<?= $v->section("js"); ?>

</body>
</html>