<?php
	require_once 'DBControl.php';
	$db = getDbConnection();
	initDB();
	$res = $db->query('SELECT * FROM Posts');
	if (!$res) {
		http_response_code(500);
		exit('Internal Server Error');
	}

	$pageTitle = "Main";
?>

<?php require 'head.php'; ?>
<?php require 'header.php'; ?>

<main class="site__centr">
	<div class="site__latest">
		<h3>LATEST ARTICLES</h3>
	</div>
	<div class="site__line"></div>

	<?php while ($row = $res->fetchArray(SQLITE3_ASSOC)) { ?>
		<article class="article">
			<div class="article_img"><img src="img/<?= $row['ImageName'] ?>." alt="article_title_img"></div>
			<div class="article__body">
				<header>
					<time datetime="<?= $row['Created'] ?>" class="article__time"><?= $row['Created'] ?></time>
					<h2 class="article__title">
						<a href="article.php?article=<?= $row['ID']; ?>"><?= htmlspecialchars($row['Title']); ?></a>
					</h2>
				</header>
				<div class="article__text"><?= $row['Content'] ?></div>
			</div>
		</article>
	<?php } ?>

</main>

<div class="site__separator"></div>
<div class="site__page">PAGE 1 OF 2</div>
<div class="site__page_arrow"><a href="#"><img src="img/Right_arrow.png" alt="rihgt_arrow"></a></div>

<?php require 'footer.php'; ?>