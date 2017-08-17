<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use backend\models\TblSpk;
    use backend\models\UserForm;
    use wbraganca\dynamicform\DynamicFormWidget;
    /* @var $this yii\web\View */
    /* @var $model backend\models\TblJadwal */
    /* @var $form yii\widgets\ActiveForm */
    ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <?php 
                        $form = ActiveForm::begin([
                        'options'=>[                        			
                        			'role'=>'form',
                        			'class'=>'form-horizontal',
                        			'id' => 'dynamic-form']
                        			
                        			]); ?>                                
                    <div class="header card-header-text">
                        <h4 class="title">Jadwal Kerja</h4>
                    </div>
                    <div class="content">
                        <fieldset>
                            <div class="form-group">
                                <div class="select">
                                    <label class="col-md-2 col-form-label">SPK</label>
                                    <div class="col-md-8">
                                        <?= $form->field($model, 'idspk')->dropDownList(
                                            ArrayHelper::map(TblSpk::find()->all(),'idspk', 'idspk'),
                                            ['prompt'=>'- Choose -',
                                             'style'=>'height: calc(3.25rem + 2px);','required'=>true])->label(false);                 
                                            ?>         
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div id="view_jadwal"></div>
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
<?php 
    $this->registerJs("
    	( function($) {
    		
    		$(document).ready(function()
    		{
    			$('#tbljadwal-idspk').change(function()					
    			{
    				var id=$(this).val();						
    				var dataString = 'id='+ id;    				
    				$.ajax
    				({
    					type: 'GET',
    					url: '?r=tbl-jadwal/detail',
    					data: dataString,
    					cache: false,
    					success: function(html)
    					{    						
    						$('#view_jadwal').html(html);								
    					} 
    				});
    			});
    		});



    	}) ( jQuery );
    ");
    ?>