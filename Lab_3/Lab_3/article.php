<?php
	if (empty($_GET['article'])) {
		header('Location: index.php');
		exit();
	}
	require_once 'DBControl.php';
	$db = getDbConnection();
	$ID = SQLite3::escapeString($_GET["article"]);
	$article = $db->query("SELECT * FROM Posts where ID='{$ID}'")->fetchArray(SQLITE3_ASSOC);
	if (!$article) {
		http_response_code(404);
		exit('Not found');
	}
	$pageTitle = htmlspecialchars($article['Title']);
?>

<?php require 'head.php'; ?>
<?php require 'header.php'; ?>

<main class="site__centr">
	<div class="site__latest">
		<h3>ARTICLE</h3>
	</div>

	<div class="site__line"></div>
	<article class="article">
		<div class="article__body">
			<header>
				<time datetime="<?= $article['Created'] ?>" class="article__time"><?= $article['Created'] ?></time>
				<h1 class="article__title">
					<a href="article.php?article=<?= $article['ID']; ?>"><?= $pageTitle; ?></a>
				</h1>
			</header>
			<div class="article__text"><?= $article['Content'] ?></div>
		</div>
	</article>
</main>

<div class="site__separator"></div>

<?php require 'footer.php'; ?>