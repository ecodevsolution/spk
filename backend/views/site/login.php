<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?> 

                    <div class="row">
                        <div class="col-lg-4 col-md-6 offset-lg-4 offset-md-3">

                               <p     class="text-center"> <img src="img/logo.png" alt="Logo" style="width: 120px;height: 120px;">

                            <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>
                                <div class="card card-login card-hidden">
                                    <div class="header text-center">

                                        <h3 class="title">Login</h3>
                                        
                                    </div>
                                    <div class="content">

                                       
                                        <div class="form-group">

                                            <?= $form
                                                ->field($model, 'username')
                                                ->label('Username')
                                                ->textInput(['class'=>'form-control input-no-border','placeholder' => $model->getAttributeLabel('username')])?>                                            
                                        </div>
                                        <div class="form-group">                                            
                                             <?= $form
                                                ->field($model, 'password')
                                                ->label('Password')
                                                ->passwordInput(['class'=>'form-control input-no-border','placeholder' => $model->getAttributeLabel('password')]) ?>                                            
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <?= Html::submitButton('Sign in', ['class' => 'btn btn-rose btn-wd btn-lg', 'name' => 'login-button']) ?>                                        
                                       

                                    </div>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
               
    