<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblPenawaran;
use backend\models\TblSpk;
/* @var $this yii\web\View */
/* @var $model backend\models\TblPembayaran */
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
                                        <h4 class="title">Pemabayaran</h4>
                                    </div>
                                    <div class="content">


                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">No. Invoice</label>
                                                <div class="col-md-8">
                                                    <?= $form->field($model, 'idpembayaran')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group">
                                                <div class="select">
                                                    <label class="col-md-2 col-form-label">SPK</label>
                                                    <div class="col-md-8">
                                                        <?= $form->field($model, 'idspk')->dropDownList(
                                                                ArrayHelper::map(TblPenawaran::find()->JoinWith('tblSpk0')->JoinWith('tblRequest')->all(),'tblSpk0.idspk', 'tblRequest.nama_pekerjaan'),
                                                                ['prompt'=>'- Choose -',
                                                                 'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                                        ?>        
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Tanggal Bayar</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'tgl_bayar')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                       

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Jumlah Bayar</label>
                                            <div class="col-md-8">
                                                <div class="form-group field-tblpenawaran-idpenawaran required">

                                                    <input type="text" id="penawaran" readonly="true" class="form-control" name="penawaran" maxlength="8" aria-required="true">

                                                    <div class="help-block"></div>
                                                </div>                                                 
                                            </div>
                                        </div>

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
