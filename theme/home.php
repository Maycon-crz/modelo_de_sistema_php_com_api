<?php $v->layout("_theme"); ?>
<div class='users'>
	<?php if ($users):
		foreach($users as $user):
			?>
			<article class="users_user">
				<h3><?= $user->first_name, " ", $user->last_name;?></h3>
			</article>
			<?php
		endforeach;
	else:
		?>
		<h4>Não existem usuários cadastrados</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<?php
	endif;?>
</div>