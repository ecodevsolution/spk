<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use backend\models\TblPenawaran;
    use backend\models\TblSpk;
    use yii\web\View;
    /* @var $this yii\web\View */
    /* @var $model backend\models\TblPembayaran */
    /* @var $form yii\widgets\ActiveForm */
     $this->registerJsFile("https://code.jquery.com/jquery-1.12.4.js",
    ['position' => View::POS_HEAD]);
    
    $this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.js",
    ['position' => View::POS_HEAD]);
    
    ?>

<script>
    $( function() {
      $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }).val();
    } );

</script>

<script>
    function myFunction() {
        var total = document.getElementById("total").value;
        var bayar = document.getElementById("tblpembayaran-total_bayar").value;
        if(bayar > total){
            document.getElementById("demo").innerHTML = "Pembayaran Melebihi Total Biaya";
        }else if(bayar < total){
            document.getElementById("demo").innerHTML = "Pembayaran Kurang dari Total Biaya";
        }else{
            return true;
        }
        return false;
    }
</script>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php $form = ActiveForm::begin([
                        'options'=>[
                            'class'=>'form-horizontal',
                            'onsubmit'=>'return myFunction()'                            
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
                                    <?= $form->field($model, 'idpembayaran')->textInput(['maxlength' => true,'class'=>'form-control','value'=> $model->isNewRecord ? $noInvoice : '' ])->label(false); ?>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <div class="select">
                                    <label class="col-md-2 col-form-label">SPK</label>
                                    <div class="col-md-8">
                                        <!--<?= $form->field($model, 'idspk')->dropDownList(
                                            ArrayHelper::map(TblPenawaran::find()->JoinWith('tblSpk0')->JoinWith('tblRequest')->all(),'tblSpk0.idspk', 'tblRequest.nama_pekerjaan'),
                                            ['prompt'=>'- Choose -',
                                             'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                            ?>        -->

                                             <?= $form->field($model, 'idspk')->dropDownList(
                                                ArrayHelper::map(TblSpk::find()->all(),'idspk', 'idspk'),
                                                ['prompt'=>'- Choose -',
                                                'style'=>'height: calc(3.25rem + 2px);'])->label(false);                 
                                            ?>     
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div id = "view_bayar"></div>
                      
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Tanggal Bayar</label>
                                <div class="col-md-8">           
                                    <?= $form->field($model, 'tgl_bayar')->textInput(['maxlength' => true,'class'=>'form-control','id'=>'datepicker'])->label(false); ?>                                                                         
                                </div>
                            </div>
                        
                        <fieldset>
                            <label class="col-md-2 col-form-label">Jumlah Bayar</label>
                            <div class="col-md-8">
                                <div class="form-group field-tblpenawaran-idpenawaran required">
                                    <?= $form->field($model, 'total_bayar')->textInput(['maxlength' => true,'class'=>'form-control'])->label(false); ?>                                    
                                    <style> 
                                        #demo{
                                            color:red;

                                        }
                                    </style>
                                    <div id="demo"></div>
                                </div>
                            </div>
                       </fieldset>
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
</div>

<?php 
    $this->registerJs("
    	( function($) {
    		
    		$(document).ready(function()
    		{
    			$('#tblpembayaran-idspk').change(function()					
    			{
    				var id=$(this).val();						
    				var dataString = 'id='+ id;    				
    				$.ajax
    				({
    					type: 'GET',
    					url: '?r=tbl-pembayaran/detail',
    					data: dataString,
    					cache: false,
    					success: function(html)
    					{    						
    						$('#view_bayar').html(html);								
    					} 
    				});
    			});
    		});



    	}) ( jQuery );
    ");
    ?>