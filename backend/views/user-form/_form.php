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
                                        <h4 class="title">Role</h4>
                                    </div>
                                    <div class="content">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'idjabatan')->dropDownList(
                                                                ArrayHelper::map(TblJabatan::find()->all(),'idjabatan', 'nama_jabatan'),
                                                                ['prompt'=>'- Choose -',
                                                                 'style'=>'height: calc(3.25rem + 2px);'])->label('Jabatan');                 
                                                        ?>      

 <?= $form->field($model, 'idrole')->dropDownList(
                                                                ArrayHelper::map(TblRole::find()->all(),'idrole', 'nama'),
                                                                ['prompt'=>'- Choose -',
                                                                 'style'=>'height: calc(3.25rem + 2px);'])->label('Role');                 
                                                        ?>      
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

     <?= $form->field($model, 'jenis_kelamin')->textInput() ?>


       <?= $form->field($model, 'agama')->textInput() ?>
   

    <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'perusahaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
                        </div>
                       
                    </div>
                </div>
            </div>