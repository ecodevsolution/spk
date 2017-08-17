<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use backend\models\UserForm;
    use yii\web\View;
    use backend\models\TblPenawaran;
    use wbraganca\dynamicform\DynamicFormWidget;
        
    
    
    /* @var $this yii\web\View */
    /* @var $model backend\models\TblSpk */
    /* @var $form yii\widgets\ActiveForm */
    
    $this->registerJsFile("https://code.jquery.com/jquery-1.12.4.js",
    ['position' => View::POS_HEAD]);
    
    $this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.js",
    ['position' => View::POS_HEAD]);
    
    ?>
<script>
    $( function() {
      $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    } );
    
     $( function() {
      $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    } );
</script>
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
                        <h4 class="title">Surat Perintah Kerja</h4>
                    </div>
                    <div class="content">
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">ID SPK</label>
                                <div class="col-md-8">
                                    <?= $form->field($model, 'idspk')->textInput(['maxlength' => true,'class'=>'form-control' , 'value'=>$spk])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="select">
                                    <label class="col-md-2 col-form-label">Penawaran</label>
                                    <div class="col-md-8">
                                        <?= $form->field($model, 'idpenawaran')->dropDownList(
                                            ArrayHelper::map(TblPenawaran::find()->all(),'idpenawaran', 'idpenawaran'),
                                            ['prompt'=>'- Choose -',
                                             'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                            ?>         
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Area Pekerjaan</label>
                                <div class="col-md-8">                                                
                                    <?= $form->field($model, 'area_pekerjaan')->textArea(['maxlength' => true,'class'=>'form-control','rows'=>5])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>
                        <div id="detail-spk"></div>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Tanggal Mulai</label>
                                <div class="col-md-8">                                                
                                    <?= $form->field($model, 'tgl_mulai')->textInput(['maxlength' => true,'class'=>'form-control','id'=>'datepicker1'])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Tanggal Selesai</label>
                                <div class="col-md-8">                                                
                                    <?= $form->field($model, 'tgl_selesai')->textInput(['maxlength' => true,'class'=>'form-control','id'=>'datepicker2'])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>
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
                                                            <?php                                                              
                                                                $connection = \Yii::$app->db;
                                                                $sql = $connection->createCommand("SELECT * FROM `user` WHERE id NOT IN (SELECT DISTINCT b.idpegawai FROM tbl_spk a join tbl_detailspk b ON a.idspk = b.idspk WHERE DATE(NOW()) <=  a.tgl_selesai) AND idrole <> 2");
                                                                $modelx = $sql->queryAll();
                                                                $data = array();
                                                            ?>
                                                            <?php
																foreach ($modelx as $modelxy)
																$data[$modelxy['id']] = $modelxy['username'] . ' - '. $modelxy['name'];     
																echo $form->field($modeldetails, "[{$i}]idpegawai")->dropDownList($data ,array('prompt' => '--Choose--', 'style'=>'height: calc(3.25rem + 2px)','required'=>true))->label(false);	 
														
															?>														
                                                            <!--<?= $form->field($modeldetails, "[{$i}]idpegawai")->dropDownList(
                                                                ArrayHelper::map(UserForm::find()->where(['status'=>10])->AndWhere(['idrole'=>1])->all(),'id', 'name'),
                                                                ['prompt'=>'- Choose -',
                                                                'style'=>'height: calc(3.25rem + 2px);'])->label('Nama Pegawai');                 
                                                                ?>-->
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
<?php 
    $this->registerJs("
    	( function($) {
    		
    		$(document).ready(function()
    		{
    			$('#tblspk-idpenawaran').change(function()					
    			{
    				var id=$(this).val();						
    				var dataString = 'id='+ id;    				
    				$.ajax
    				({
    					type: 'GET',
    					url: '?r=tbl-spk/detail-spk',
    					data: dataString,
    					cache: false,
    					success: function(html)
    					{    						
    						$('#detail-spk').html(html);								
    					} 
    				});
    			});
    		});
    	}) ( jQuery );
    ");
    ?>