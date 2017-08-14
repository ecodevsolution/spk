<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDaftarharga */
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
                                        <h4 class="title">Master Daftar Harga</h4>
                                    </div>
                                    <div class="content">

 										 <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Item Pekerjaan</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'item_pekerjaan')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                          <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Harga Pekerjaan</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'harga_pekerjaan')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                          <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Satuan</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'satuan')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
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


  
