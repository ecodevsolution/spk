<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblAbsensi;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPenggajian */
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
                                        <h4 class="title">Penggajian</h4>
                                    </div>
                                    <div class="content">

                                         <fieldset>
                                            <div class="form-group">
                                                <div class="select">
                                                    <label class="col-md-2 col-form-label">Absensi</label>
                                                    <div class="col-md-8">
                                                        <?= $form->field($model, 'idabsensi')->dropDownList(
                                                                ArrayHelper::map(TblAbsensi::find()->all(),'idabsensi', 'idabsensi'),
                                                                ['prompt'=>'- Choose -',
                                                                 'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                                        ?>         
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Total Gaji</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'total_gaji')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Tanggal Gaji</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'tgl_gaji')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>
 
 								<div class="form-group">
                                            <div class="col-md-3">
                                                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                            </div>
                                        </div>

                                    </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>