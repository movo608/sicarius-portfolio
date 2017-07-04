<?php 

use yii\helpers\Html;

$this->title = 'Sicarius :: ' . $category->name;

/*
* Register the @frontend/site/photos/css/main.css file for the photos page.
*/
$this->registerCssFile("@web/app-assets/photos/css/main.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()]
]);

?>

<!-- Main -->
<div id="main">

<!-- Header -->
	<header id="header">
		<h1><?= $category->name ?></h1>
		<p><?php if (is_object($nextCategory)) echo 'Next category: ' . Html::a($nextCategory->name, ['/portfolio/photos', 'id' => $nextCategory->id]) ?></p>
		<p><?php if (is_object($previousCategory)) echo 'Previous category: ' . Html::a($previousCategory->name, ['/portfolio/photos', 'id' => $previousCategory->id]) ?></p>
		<h3><?= Html::a('<i class="fa fa-backward"></i> &nbsp; Back to categories', ['/portfolio']) ?></h4>
		<h2><?= Html::a('<i class="fa fa-home"></i> Home', ['/']) ?></h2>
		<ul class="icons">
			<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
			<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
			<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
		</ul>
	</header>

<!-- Thumbnail -->
	<section id="thumbnails">
		<?php foreach ($photos as $photo) { ?>
			<article>
				<a class="thumbnail" href="<?= $photo->image ?>"><img src="<?= $photo->image ?>" alt="Image could not be loaded." /></a>
				<h2><?= $photo->name ?></h2>
				<p><?= $photo->description ?></p>
		</article>
		<?php } ?>
	</section>

<!-- Footer -->
	<footer id="footer">
		<ul class="copyright">
			<li>&copy; Sicarius.</li>
			<li>Design: <a href="http://html5up.net">HTML5 UP</a>.</li>
			<li><?= Yii::powered() ?></li>
		</ul>
	</footer>

</div>

<?php 

/*
* Register skel.min.js and main.js Javascript files.
*/
$this->registerJsFile("@web/app-assets/photos/js/skel.min.js");
$this->registerJsFile("@web/app-assets/photos/js/main.js");
?>

<script type="text/javascript">
	
	// function which supresses all error messages.
	window.onerror = function (message, url, lineNumber) {
		return true;
	};

</script>