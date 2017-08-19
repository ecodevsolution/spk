<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use backend\models\TblSpk;
    use yii\web\View;
    /* @var $this yii\web\View */
    /* @var $model backend\models\TblAbsensi */
    /* @var $form yii\widgets\ActiveForm */

      $this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.js",
        ['position' => View::POS_HEAD]);
    

    ?>

<!-- <script>            
   	( function($) {
    		
    		$(document).ready(function()
    		{
    			$('#tblabsensi-idspk').change(function()					
    			{
    			    alert('aa');
    			});
    		});



    	}); -->
</script>

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
                        <h4 class="title">Absensi</h4>
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
                                             'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                            ?>         
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div id="list-absensi"></div>
                        

                        <div class="form-group">
                            <div class="col-md-3">
                                <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'myDIV']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $this->registerJs("
    	( function($) {
    		
    		$(document).ready(function()
    		{
    			$('#tblabsensi-idspk').change(function()					
    			{
                    
    				var id=$(this).val();						
    				var dataString = 'id='+ id;    				
    				$.ajax
    				({
    					type: 'GET',
    					url: '?r=tbl-absensi/list-absensi',
    					data: dataString,
    					cache: false,
    					success: function(html)
    					{    						
    						$('#list-absensi').html(html);
                            var che = document.getElementById('checkx').value;                                                
                            var x = document.getElementById('myDIV');
                            if (che == 0) {
                                x.style.display = ' none';
                            } else {
                                x.style.display = 'block';
                            }						
    					} 
    				});

                   
                    
    			});
    		});



    	}) ( jQuery );
    ");
    ?>