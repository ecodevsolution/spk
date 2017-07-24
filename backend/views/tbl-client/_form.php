<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use backend\models\TblRole;
    use yii\web\View;

    /* @var $model backend\models\TblClient */
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
                        <h4 class="title">DATA CLIENT</h4>
                    </div>
                    <div class="content">
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Username</label>
                                <div class="col-md-8">                                                
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nama Client</label>
                                <div class="col-md-8">                                                
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>

                       <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-8">
                                    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'P' => 'Perempuan', 'L' => 'Laki-Laki'],  ['prompt'=>'- Choose -',
                                         'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                        ?>
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
                                <label class="col-md-2 col-form-label">Nama Perusahaan</label>
                                <div class="col-md-8">                                                
                                    <?= $form->field($model, 'perusahaan')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
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
                        <?php
                            if($model->isNewRecord){
                        ?>
                            <fieldset>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Password</label>
                                    <div class="col-md-8">                                                
                                        <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>
                                    </div>
                                </div>
                            </fieldset>
                        <?php }else {
                                echo "";
                            }
                        ?>
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