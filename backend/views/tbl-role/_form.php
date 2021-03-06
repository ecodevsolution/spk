<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblRole */
/* @var $form yii\widgets\ActiveForm */
?>
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                 <?php $form = ActiveForm::begin([
                                            'options'=>[
                                                'class'=>'form-horizontal',
                                            ]
                                        ]); ?>                                
                                    <div class="header card-header-text">
                                        <h4 class="title">Role</h4>
                                    </div>
                                    <div class="content">

                                     <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Nama</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'nama')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

   										 <div class="form-group">
                                            <div class="col-md-3">
                                                <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>
                                        </div>

                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>