<?php
    /* @var $this yii\web\View */
    use backend\models\TblRequest;
    use backend\models\TblSpk;
    use backend\models\TblJadwal;
    use backend\models\TblPembayaran;
    
    $this->title = 'Dashboard';
    ?>
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-blue">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="numbers text-left">
                            <p>Request</p>
                            <?php
                                $request = TblRequest::find()
                                            ->count();
                                echo $request;
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                </div>
            </div>
            <div class="text-center pb-3">
                
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-green">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="numbers text-left">
                            <p>SPK</p>
                            <?php
                                $spk = TblSpk::find()
                                            ->count();
                                echo $spk;
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                </div>
            </div>
            <div class="text-center pb-3">
                
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-orange">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="numbers text-left">
                            <p>Jadwal</p>
                             <?php
                                $jadwal = TblJadwal::find()
                                            ->count();
                                echo $jadwal;
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                </div>
            </div>
            <div class="text-center pb-3">
               
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card card-brown">
            <div class="content">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="numbers text-left">
                            <p>Finish</p>
                            <?php
                                $bayar = TblPembayaran::find()
                                            ->count();
                                echo $bayar;
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                </div>
            </div>
            <div class="text-center pb-3">
               
            </div>
        </div>
    </div>
</div>
