<?php

use yii\helpers\Html;

$this->registerCssFile("@web/app-assets/portfolio/css/main.css", [
'depends' => [\yii\bootstrap\BootstrapAsset::className()]
]);

?>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
        <header id="header">
            <h1><?= Html::a('&copy; <strong>Sicarius</strong> 2017', ['/']) ?></h1>
            <nav>
                <ul>
                    <li><?= Html::a('Home', ['/']) ?></li>
                </ul>
            </nav>
        </header>

    <!-- Main -->
        <div id="main">
            <?php foreach ($categories as $category): ?>

                <article class="thumb">
                    <?= Html::a(Html::img($category->image), ['/portfolio/photos', 'id' => $category->id], ['class' => 'image']) ?>
                    <h2 style="font"><?= $category->name ?></h2>
                </article>

            <?php endforeach ?>
        </div>

</div>

<?php 

$this->registerJsFile("@web/app-assets/portfolio/js/skel.min.js");
$this->registerJsFile("@web/app-assets/portfolio/js/util.js");
$this->registerJsFile("@web/app-assets/portfolio/js/main.js");

?>

<script type="text/javascript">
    
window.onerror = function (message, url, lineNumber) {

    return true;
};

</script>