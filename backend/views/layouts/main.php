<?php
    /* @var $this \yii\web\View */
    /* @var $content string */
    
    use backend\assets\AppAsset;
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\widgets\Breadcrumbs;
    use common\widgets\Alert;
    
    AppAsset::register($this);
    
    if (Yii::$app->controller->action->id === 'login') { 
    /**
     * Do not use this code in your template. Remove it. 
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
        echo $this->render(
            'main-login',
            ['content' => $content]
        );
    } else {
    
    ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <div class="sidebar">
                <div class="logo">
                    <a href="#" class="simple-text">
                    <img src="img/logo.png" alt="Billy" height="42" width="42">
                    </a>
                </div>
                <div class="logo logo-mini">
                    <a href="#" class="simple-text">
                    I
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav flex-column">
                        <li class="d-flex active flex-column">
                            <a class="nav-link" href="<?= Yii::$app->homeUrl; ?>">
                                <i class="nav-icon fa fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="d-flex flex-column">
                            <a data-toggle="collapse" href="#pegawai" class="collapsed nav-link" aria-expanded="false">
                                <i class="nav-icon fa fa-child"></i>
                                <p>Pegawai
                                    <i class="fa fa-sort-desc submenu-toggle"></i>
                                </p>
                            </a>
                            <div class="collapse" id="pegawai" role="navigation" aria-expanded="false" style="height: 0px;">
                                <ul class="nav flex-column">
                                    <li>
                                        <a class="nav-link" href="index.php?r=user-form/index">Data Pegawai</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="index.php?r=tbl-role/index">Role</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="index.php?r=tbl-jabatan/index">Jabatan</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="index.php?r=tbl-absensi/index">Absensi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex flex-column">
                            <a data-toggle="collapse" href="#Cient" class="collapsed nav-link" aria-expanded="false">
                                <i class="nav-icon fa fa-group"></i>
                                <p>Client
                                    <i class="fa fa-sort-desc submenu-toggle"></i>
                                </p>
                            </a>
                            <div class="collapse" id="Cient" role="navigation" aria-expanded="false" style="height: 0px;">
                                <ul class="nav flex-column">
                                    <li>
                                        <a class="nav-link" href="index.php?r=tbl-client/index">Data Client</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="index.php?r=tbl-request/index">Form Request</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex flex-column">
                            <a data-toggle="collapse" href="#pekerjaan" class="collapsed nav-link" aria-expanded="false">
                                <i class="nav-icon ti-package"></i>
                                <p>Pekerjaan
                                    <i class="fa fa-sort-desc submenu-toggle"></i>
                                </p>
                            </a>
                            <div class="collapse" id="pekerjaan" role="navigation" aria-expanded="false" style="height: 0px;">
                                <ul class="nav flex-column">
                                    <li><a class="nav-link" href="index.php?r=tbl-spk/index">SPK</a></li>
                                    <li><a class="nav-link" href="index.php?r=tbl-jadwal/index">Jadwal Kerja</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex flex-column">
                            <a data-toggle="collapse" href="#pembayaran" class="collapsed nav-link" aria-expanded="false">
                                <i class="nav-icon fa fa-dollar"></i>
                                <p>Pembayaran
                                    <i class="fa fa-sort-desc submenu-toggle"></i>
                                </p>
                            </a>
                            <div class="collapse" id="pembayaran" role="navigation" aria-expanded="false" style="height: 0px;">
                                <ul class="nav flex-column">
                                    <li><a class="nav-link" href="index.php?r=tbl-pembayaran/index">Data Pembayaran</a></li>
                                    <li><a class="nav-link" #href="index.php?r=/index">Riwayat Pembayaran</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex flex-column">
                            <a data-toggle="collapse" href="#penggajian" class="collapsed nav-link" aria-expanded="false">
                                <i class="nav-icon fa fa-money"></i>
                                <p>Penggajian
                                    <i class="fa fa-sort-desc submenu-toggle"></i>
                                </p>
                            </a>
                            <div class="collapse" id="penggajian" role="navigation" aria-expanded="false" style="height: 0px;">
                                <ul class="nav flex-column">
                                    <li><a class="nav-link" href="index.php?r=tbl-penggajian/index">Data Penggajian</a></li>
                                    <li><a class="nav-link" #href="tables/data-tables.html">Riwayat Penggajian</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="d-flex flex-column">
                            <a data-toggle="collapse" href="#penawaran" class="collapsed nav-link" aria-expanded="false">
                                <i class="nav-icon ti-gift"></i>
                                <p>Penawaran
                                    <i class="fa fa-sort-desc submenu-toggle"></i>
                                </p>
                            </a>
                            <div class="collapse" id="penawaran" role="navigation" aria-expanded="false" style="height: 0px;">
                                <ul class="nav flex-column">
                                    <li><a class="nav-link" href="index.php?r=tbl-penawaran/index">Data Penawaran</a></li>
                                    <li><a class="nav-link" href="index.php?r=tbl-daftarharga/index">Master Daftar Harga</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-default navbar-toggleable-md navbar-inverse">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="ti-arrow-left"></i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarsItems" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarItems">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle nav-link" id="notificationList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-bell nav-icon"></i>
                                    <span class="notification">6</span>
                                    <p class="hidden-lg-up">
                                        Notifications
                                        <i class="fa fa-sort-desc submenu-toggle"></i>
                                    </p>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="notificationList">
                                    <a class="dropdown-item" href="#">You have 5 new messages</a>
                                    <a class="dropdown-item" href="#">You're now friend with Mike</a>
                                    <a class="dropdown-item" href="#">Wish Mary on her birthday!</a>
                                    <a class="dropdown-item" href="#">5 warnings in Server Console</a>
                                    <a class="dropdown-item" href="#">Jane completed 'Induction Training'</a>
                                    <a class="dropdown-item" href="#">'Prepare Marketing Report' is overdue</a>
                                </div>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="ti-layout-grid3-alt nav-icon"></i>
                                    <p class="hidden-lg-up">Apps</p>
                                </a>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="ti-user nav-icon"></i>
                                    <p class="hidden-lg-up">Profile</p>
                                </a>
                            </li>
                            <li>
                                <?= Html::a(
                                    ' Logout',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'gcon gcon-log-out rs-dropdown-icon']
                                    ) ?>
                            </li>
                            <li class="separator hidden-lg-up"></li>
                        </ul>
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">
                        <?= Alert::widget() ?>
                        <?= $content ?>
                    </div>
                </div>
                <!-- footer -->
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
<?php } ?>