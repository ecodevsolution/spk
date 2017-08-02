<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
		<head>
			<meta charset="<?= Yii::$app->charset ?>"/>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<?= Html::csrfMetaTags() ?>
			<title>Login</title>
			<?php $this->head() ?>
		</head>
		

		<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navigation-example-2">
	                    <span class="navbar-toggler-icon"></span>
	                </button>
	                <a class="navbar-brand" href="#"></a>
	            </div>
	        </div>
	    </nav>
	    <div class="wrapper wrapper-full-page">
	        <div class="full-page login-page" data-color="blue">
	            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
	            <div class="content">
	                <div class="container">
						<?php $this->beginBody() ?>

						<?= $content ?>

						<?php $this->endBody() ?>
					</div>
            	</div>
	            <footer class="footer">
	                <div class="container">
	                   
	                    <p class="copyright float-right">
	                        &copy;
	                        <script>
	                            document.write(new Date().getFullYear())
	                        </script>
	                        <a href="#">Billy Fajri</a>
	                    </p>
	                </div>
	            </footer>
	         </div>
	    </div>
			
	</html>
<?php $this->endPage() ?>
