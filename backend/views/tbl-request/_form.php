<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use backend\models\TblClient;
    
    /* @var $this yii\web\View */
    /* @var $model backend\models\TblRequest */
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
                        <h4 class="title">Request Pekerjaan</h4>
                    </div>
                    <div class="content">
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ID Request</label>
                                <div class="col-md-8"> 
                                    <?= $form->field($model, 'idrequest')->textInput(['maxlength' => true,'value'=>$req])->label(false) ?>                                               
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Client</label>
                                <div class="col-md-8"> 
                                   
                                    <?= $form->field($model, 'idclient')->dropDownList(
                                        ArrayHelper::map(TblClient::find()->where(['idrole'=>2])->all(),'id', 'name'),
                                        ['prompt'=>'- Choose -',
                                         'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                        ?>  
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nama Pekerjaan</label>
                                <div class="col-md-8"> 
                                    <?= $form->field($model, 'nama_pekerjaan')->textArea(['rows'=>5])->label(false) ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">                                
                                <div class="col-md-8"> 
                                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </fieldset>                                                    
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>