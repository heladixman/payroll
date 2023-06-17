<?php if (session()->has('message')) : ?>
	<div class="alert alert-success alert-dismissible fade show notification" role="alert">
    <button id="close-notification" type="button" class="btn-close close-notification font-xl" aria-label="Close"></button>
		<?= session('message') ?>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="alert alert-danger alert-dismissible fade show notification" role="alert">
    <button id="close-notification" type="button" class="btn-close close-notification font-xl" aria-label="Close"></button>
		<?= session('error') ?>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="alert alert-danger alert-dismissible fade show notification" role="alert">
    <button id="close-notification" type="button" class="btn-close close-notification font-xl" aria-label="Close"></button>
	<?php foreach (session('errors') as $error) : ?>
		<li><?= $error ?></li>
	<?php endforeach ?>
	</ul>
<?php endif ?>