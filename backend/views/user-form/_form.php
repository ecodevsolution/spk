<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblJabatan;
use backend\models\TblRole;
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
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
                                        <h4 class="title">DATA PEGAWAI</h4>
                                    </div>
                                    <div class="content">

                                      <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">NIP</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Nama</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Role</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'idrole')->dropDownList(
                                                                ArrayHelper::map(TblRole::find()->all(),'idrole', 'nama'),
                                                                ['prompt'=>'- Choose -',
                                                                 'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                                        ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Jabatan</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'idjabatan')->dropDownList(
                                                                ArrayHelper::map(TblJabatan::find()->all(),'idjabatan', 'nama_jabatan'),
                                                                ['prompt'=>'- Choose -',
                                                                 'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                                        ?>
                                                 </div>
                                            </div>
                                        </fieldset>                       
                                                        
                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">No.KTP</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Alamat KTP</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'alamat_ktp')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Alamat Korespondensi</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Tanggal Lahir</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'tgl_lahir')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>
   
                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Agama</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'agama')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">No.Telp</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Password</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                                 </div>
                                            </div>
                                        </fieldset>

                                         <fieldset>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Email</label>
                                                <div class="col-md-8">                                                
                                                    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
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