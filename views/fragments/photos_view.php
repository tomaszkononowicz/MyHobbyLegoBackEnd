
		<form method="post">
		<section class="galery_menu">
			<input class="button" type="submit" value="Zapamiętaj wybór"/>
		</section>
        <?php foreach ($galery as $photo): ?>
			<?php if (($user['is_logged'] && isset($photo['sender']) && $photo['sender']==$user['login']) || ($photo['private']=="false")): ?>
			<section class="photo">
				<a href="images/watermark-<?= $photo['image'] ?>"><img src="images/miniature-<?= $photo['image'] ?>" alt=<?= $photo['title'] ?>/></a>
				<div class="data">
					<div class="title">Tytuł: <?= $photo['title'] ?></div>
					<div class="author">Autor: <?= $photo['author'] ?></div>
					<div class="private"><?php if ($photo['private']=="true") echo "Prywatne"; else echo "Publiczne"; ?></div>
					<?php if ($user['is_logged'] && isset($photo['sender']) && $photo['sender']==$user['login']) : ?>
						<div class="edit"><a href="edit?id=<?= $photo['_id'] ?>">Edycja</a></div>
						<div class="delete"><a href="delete?id=<?= $photo['_id'] ?>">Usuń</a></div>
					<?php endif ?>
					<div class="select">Zapamiętaj: <input type="checkbox" name="select[]" value="<?= $photo['_id'] ?>" <?php if (in_array($photo['_id'], $user['selected'])) echo "checked"; ?>/></div>
				</div>
			</section>
			<?php endif ?>
        <?php endforeach ?>
		</form>
