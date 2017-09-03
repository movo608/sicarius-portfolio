<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$alertExists = false;

/*
* Registers the @frontend/web/css/main.css stylesheet
*/
$this->registerCssFile("@web/app-assets/landing/css/main.css", [
    'depends' => [\yii\bootstrap\BootstrapAsset::className()]
]);

?>

<?=

'<style>
    #intro {
        background: url("images/overlay.png"), url("' . $intro->image . '");
    }
    #one {
        background: url("images/overlay.png"), url("' . $doing->image . '");
    }
    #two {
        background: url("images/overlay.png"), url("' . $bio->image . '");
    }
</style>'

?>

<!-- main app css file -->
<!--<link rel="stylesheet" href="css/main.css" />-->

<header id="header">
    <h1>Sicarius</h1>
    <nav>
        <ul>
            <li><?= Html::a('Portfolio', ['/portfolio/']) ?></li>
            <li><a href="#intro">Intro</a></li>
            <li><a href="#one">What I Do</a></li>
            <li><a href="#two">Who I Am</a></li>
            <li><a href="#work">My Work</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>

<div class="alert-display-area">
    <?php if (Yii::$app->session->hasFlash('error')) { $alertExists = true; ?>
        <div class="alert alert-danger" role="alert">
            <?= Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php } elseif (Yii::$app->session->hasFlash('success')) { $alertExists = true; ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php } ?>
</div>

<!-- Intro -->
<section id="intro" class="main style1 dark fullscreen">
    <div class="content">
        <header>
            <h2>Hey.</h2>
        </header>
        <p>
            <?= $intro->text ?>
        </p>
        <footer>
            <a href="#one" class="button style2 down">More</a>
        </footer>
    </div>
</section>

<!-- One -->
<section id="one" class="main style2 right dark fullscreen">
    <div class="content box style2">
        <header>
            <h2>What I Do</h2>
        </header>
        <p>
            <?= $doing->text ?>
        </p>
    </div>
    <a href="#two" class="button style2 down anchored">Next</a>
</section>

<!-- Two -->
<section id="two" class="main style2 left dark fullscreen">
    <div class="content box style2">
        <header>
            <h2>Who I Am</h2>
        </header>
        <p>
            <?= $bio->text ?>
        </p>
    </div>
    <a href="#work" class="button style2 down anchored">Next</a>
</section>

<!-- Work -->
<section id="work" class="main style3 primary">
    <div class="content">
        <header>
            <h2>My Work</h2>
            <p>
                <?= $work->text ?>
            </p>
        </header>

        <!-- Gallery  -->
            <div class="gallery">
                <?php foreach ($featuredImages as $photo) { ?>

                    <?php
                        $ok = '../../' . ltrim($photo->image, './');
                    ?>

                    <article class="from-left">
                        <a href="<?= $ok ?>" class="image fit"><img src="<?=  $ok ?>" title="<?= $photo->name ?>" alt="" /></a>
                    </article>

                <?php } ?>
            </div>

    </div>
</section>

<!-- Contact -->
<section id="contact" class="main style3 secondary">
    <div class="content">
        <header>
            <h2>Say Hello.</h2>
            <p>
                <?= $contact->text ?>
            </p>
        </header>
        <div class="box">

            <?php $form = ActiveForm::begin() ?>

                <?= $form->field($newMessage, 'name')->textInput() ?>
                <?= $form->field($newMessage, 'email')->input('email') ?>
                <?= $form->field($newMessage, 'text')->textarea(['rows' => '6']) ?>

                <div class="form-group">
                    <?= Html::submitButton() ?>
                </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</section>

<footer id="footer">

    <!-- Icons -->
        <ul class="actions">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
        </ul>

    <!-- Menu -->
        <ul class="menu">
            <li>&copy; Sicarius</li>
            <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
            <li><?= Yii::powered() ?></li>
        </ul>

</footer>

<?php if ($alertExists === true) { ?>

    <script type="text/javascript">
        
        $(function() {
            $('.alert-display-area').delay(5000).fadeOut('slow');
        });

    </script>

<?php } ?>

<?php

// register depend plug-ins
$this->registerJsFile("@web/app-assets/landing/js/jquery.poptrox.min.js");
$this->registerJsFile("@web/app-assets/landing/js/jquery.scrolly.min.js");
$this->registerJsFile("@web/app-assets/landing/js/jquery.scrollex.min.js");
$this->registerJsFile("@web/app-assets/landing/js/skel.min.js");

// registers utility javascript file
$this->registerJsFile("@web/app-assets/landing/js/util.js");

// registers main app javascript file
$this->registerJsFile("@web/app-assets/landing/js/main.js");

?>