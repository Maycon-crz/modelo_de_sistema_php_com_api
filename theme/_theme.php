<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title; ?></title>

	<link rel="stylesheet" href="<?= url("theme/style.css"); ?>" />
</head>
<body>
	<nav class="main_nav">
		<?php if($v->section("slidebar")): 
			echo $v->section("slidebar");
		else:
			?>
			<a title="" href="<?= url() ?>">Home</a>
			<a title="" href="<?= url("contato"); ?>">Contato</a>
			<a title="" href="<?= url("teste"); ?>">Teste</a>
		<?php
		endif; ?>
	</nav>
	<main class="main_content">
		<?= $v->section("content"); ?>
	</main>
	<footer class="main_footer">
		<?= SITE; ?> - Todos os Direitos Reservados	
	</footer>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<?= $v->section("scripts"); ?>
</body>
</html>