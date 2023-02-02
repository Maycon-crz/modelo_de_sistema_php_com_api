<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?= $head; ?>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= url("theme/style.css"); ?>" />
</head>
<body>
	<nav class="navbar navbar-expand-lg main_nav">
		<div class="container-fluid">
			<?php if($v->section("slidebar")): 
				echo $v->section("slidebar");
			else:
				?>
				<a title="Nome do Site: Cine 7D" class="navbar-brand" href="<?= url(''); ?>">Cine 7D</a>
				<a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span>| | |</span>
                </a>
				<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li>
						<a title="" href="<?= url() ?>">SOBRE</a>
					</li><li>
					<a title="" href="<?= url("teste"); ?>">CATEGORIAS</a>
					</li><li>						
						<a title="" href="<?= url("contato"); ?>">DESTAQUES</a>
					</li><li>						
						<a title="" href="<?= url("contato"); ?>">CONTATO</a>
					</li><li>						
						<a title="" href="<?= url("contato"); ?>">ENTRAR</a>
					</li>
				</ul>
			<?php
			endif; ?>
		</div>
	</nav>
	<main class="main_content container">
		<?= $v->section("content"); ?>
	</main>
	<footer class="main_footer">
		<?= SITE; ?> - Todos os Direitos Reservados	
	</footer>
	<!-- Javascrip bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- --- -->
<?= $v->section("js"); ?>
</body>
</html>