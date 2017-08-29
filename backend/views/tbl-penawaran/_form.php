<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use backend\models\TblRequest;
    use backend\models\TblDaftarharga;
    use wbraganca\dynamicform\DynamicFormWidget;
    use backend\models\TblPenawaran;
    
    /* @var $this yii\web\View */
    /* @var $model backend\models\TblPenawaran */
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
                        			'data-style'=>'circle',
                        			'role'=>'form',
                        			'class'=>'form-horizontal',
                        			'id' => 'dynamic-form']
                        			
                        			]); ?>
                    <div class="header card-header-text">
                        <h4 class="title">Penawaran</h4>
                    </div>
                    <div class="content">
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ID Penawaran</label>
                                <div class="col-md-8">

                                    <?= $form->field($model, 'idpenawaran')->textInput(['maxlength' => true,'class'=>'form-control', 'value'=>$ask])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="select">
                                    <label class="col-md-2 col-form-label">Nama required</label>
                                    <div class="col-md-8">
                                     <?php
                                            $array = TblPenawaran::find()
                                                    ->select('idrequest')
                                                    ->asArray()
                                                    ->all();                                                                                      
                                        ?>
                                        <?= $form->field($model, 'idrequest')->dropDownList(
                                            ArrayHelper::map(TblRequest::find()->where(['not in','idrequest',$array])->all(),'idrequest', 'nama_pekerjaan'),
                                            ['prompt'=>'- Choose -',
                                             'style'=>'height: calc(3.25rem + 2px);','required'=>true])->label(false);                 
                                            ?>         

                                              
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div id = "view_penawaran"></div>
                        
                       
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
                                                            <?= $form->field($modeldetails, "[{$i}]kode_pekerjaan")->dropDownList(
                                                                ArrayHelper::map(TblDaftarharga::find()->all(),'kode_pekerjaan', 'item_pekerjaan'),
                                                                ['prompt'=>'- Choose -',
                                                                'style'=>'height: calc(3.25rem + 2px);','required'=>true])->label('Nama Pekerjaan');                 
                                                            ?>
                                                        </div>
                                                    </div>
                                                   
                                                        <div class="col-sm-6 col-xs-12">	
                                                             <div class="form-group">
                                                            <?= $form->field($modeldetails, "[{$i}]quantity")->textInput(['style'=>'margin-left: 60px;width: 20%;margin-top:32px;','required'=>true,'placeholder'=>'Qty'])->label(false)?>                                                                                                              
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
                                        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
</div>
<?php 
    $this->registerJs("
    	( function($) {
    		
    		$(document).ready(function()
    		{
    			$('#tblpenawaran-idrequest').change(function()					
    			{
    				var id=$(this).val();						
    				var dataString = 'id='+ id;    				
    				$.ajax
    				({
    					type: 'GET',
    					url: '?r=tbl-penawaran/detail-penawaran',
    					data: dataString,
    					cache: false,
    					success: function(html)
    					{    						
    						$('#view_penawaran').html(html);								
    					} 
    				});
    			});
    		});
    	}) ( jQuery );
    ");
    ?>