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
                                             'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                            ?>         
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div id="view_jadwal"></div>
                       
                        <fieldset>
                            <legend>Pekerjaan</legend>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-user"></i> Data Pekerjaan </h4>
                                </div>
                                <div class="panel-body">
                                    <?php DynamicFormWidget::begin([
                                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                        'widgetBody' => '.container-items', // required: css class selector
                                        'widgetItem' => '.item', // required: css class
                                        'limit' => 100, // the maximum times, an element can be cloned (default 999)
                                        'min' => 1, // 0 or 1 (default 1)
                                        'insertButton' => '.tambah-item', // css class
                                        'deleteButton' => '.hapus-item', // css class
                                        'model' => $modeldetail[0],
                                        'formId' => 'dynamic-form',
                                        'formFields' => [
                                        	'kode_pekerjaan',
                                        	'quantity',
                                        	'satuan_harga',												
                                        ],
                                        ]);											
                                        ?>
                                    <div class="container-items">
                                        <!-- widgetContainer -->
                                        <?php foreach ($modeldetail as $i => $modeldetails): ?>
                                        <div class="item panel panel-default">
                                            <!-- widgetBody -->
                                            <div class="panel-heading">
                                                <div class="pull-right">
                                                    <button type="button" class="tambah-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                                    <button type="button" class="hapus-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">															
                                                            <?= $form->field($modeldetails, "[{$i}]idpegawai")->dropDownList(
                                                                ArrayHelper::map(UserForm::find()->where(['status'=>10])->AndWhere(['idrole'=>2])->all(),'id', 'name'),
                                                                ['prompt'=>'- Choose -',
                                                                'style'=>'height: calc(3.25rem + 2px);'])->label('Nama Pegawai');                 
                                                                ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .row -->
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                    </div>
                                </div>
                                <?php DynamicFormWidget::end(); ?>
                            </div>
                    </div>
                    </fieldset>		
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