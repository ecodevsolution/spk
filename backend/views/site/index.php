<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
 <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card card-blue">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="numbers text-left">
                                                <p>Visitors</p>
                                                70,340
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <span class="badge badge-default float-right">+5%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pb-3">
                                  <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="90%" data-height="50px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="false">
                                    8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card card-green">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="numbers text-left">
                                                <p>Orders</p>
                                                102
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <i class="ti-reload float-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pb-3">
                                  <div class="sparkline" data-type="bar" data-width="90%" data-height="50px" data-bar-Width="10" data-bar-Spacing="5" data-bar-Color="#f39c12">
                                                7,5,8, 10, 9, 5, 15, 17, 22, 8, 10
                                              </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card card-orange">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="numbers text-left">
                                                <p>Revenue</p>
                                                $23,100
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <span class="badge badge-default float-right">+5% <i class="ti-stats-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pb-3">
                                  <span id="compositebar">
                                                4,6,7,7,4,3,2,1,4,10,5
                                              </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="card card-brown">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="numbers text-left">
                                                <p>Followers</p>
                                                +245
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <span class="badge badge-default float-right">-12% <i class="ti-stats-down"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pb-3">
                                  <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="90%" data-height="50px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.8)">
                                                8,4,0,0,0,0,1,4,4,10,10,10,10,0,0,0,4,6,5,9,10
                                              </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8">
                          <div class="card" style="min-height: 350px">
                              <div class="header">
                                  <h4 class="title">Your Domains</h4>
                              </div>
                              <div class="content">
                                  <div class="table-full-width table-tasks">
                                      <table class="table">
                                          <thead class="text-primary">
                                              <tr>
                                                  <th></th>
                                                  <th>Domain</th>
                                                  <th>Status</th>
                                                  <th>Auto Renewal</th>
                                                  <th>Expiry Date</th>
                                                  <th></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td>
                                                      <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                          </label>
                                                  </td>
                                                  <td>abcd.com</td>
                                                  <td><span class="badge badge-success">Active</span></td>
                                                  <td><input type="checkbox" checked data-toggle="switch" class="ct-primary" /></td>
                                                  <td>Mar 7, 2018</td>
                                                  <td><button class="btn btn-info btn-fill btn-sm">Manage</button></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                          </label>
                                                  </td>
                                                  <td>abcd.com</td>
                                                  <td><span class="badge badge-success">Active</span></td>
                                                  <td><input type="checkbox" data-toggle="switch" class="ct-primary" /></td>
                                                  <td>Mar 7, 2018</td>
                                                  <td><button class="btn btn-info btn-fill btn-sm">Manage</button></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                          </label>
                                                  </td>
                                                  <td>abcd.com</td>
                                                  <td><span class="badge badge-success">Active</span></td>
                                                  <td><input type="checkbox" checked data-toggle="switch" class="ct-primary" /></td>
                                                  <td>Mar 7, 2018</td>
                                                  <td><button class="btn btn-info btn-fill btn-sm">Manage</button></td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <label class="checkbox">
                            <input type="checkbox" value="" data-toggle="checkbox">
                          </label>
                                                  </td>
                                                  <td>abcd.com</td>
                                                  <td><span class="badge badge-danger">Expired</span></td>
                                                  <td><input type="checkbox" data-toggle="switch" class="ct-primary" /></td>
                                                  <td>Mar 7, 2018</td>
                                                  <td><button class="btn btn-info btn-fill btn-sm">Manage</button></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4">
                          <div class="card" style="min-height: 350px">
                              <div class="header">
                                  <h4 class="title">Sales</h4>
                              </div>
                              <div class="content">
                                  <div id="jscharts-doughnut" class="chart chart-js-container-sales">
                                      <canvas id="doughnutChart"></canvas>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-12">
                            <div class="card" style="min-height: 485px">
                                <div class="header card-header-text">
                                    <h4 class="title">Employees Stats</h4>
                                    <p class="category">New employees on 15th December, 2016</p>
                                </div>
                                <div class="content table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Salary</th>
                                                <th>Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Bob Williams</td>
                                                <td>$23,566</td>
                                                <td>USA</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Mike Tyson</td>
                                                <td>$10,200</td>
                                                <td>Canada</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Tim Cook</td>
                                                <td>$32,190</td>
                                                <td>Netherlands</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Philip Morris</td>
                                                <td>$31,123</td>
                                                <td>UK</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Tom Hooper</td>
                                                <td>$23,789</td>
                                                <td>India</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Hulk Hogan</td>
                                                <td>$43,120</td>
                                                <td>Netherlands</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Angelina Jolie </td>
                                                <td>$12,140</td>
                                                <td>Australia</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="card" style="min-height: 485px">
                                <div class="header">
                                    <h4 class="title">Task List</h4>
                                </div>
                                <div class="content">
                                    <div class="table-full-width table-tasks">
                                        <div id="task-actions" class="dropdown float-right">
                                            <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                                                                         <i class="ti-more"></i>
                                                                         <span class="caret"></span>
                                                                  </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a href="#action" class="dropdown-item">Action</a>
                                                <a href="#action" class="dropdown-item">Another action</a>
                                                <a href="#here" class="dropdown-item">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#link" class="dropdown-item">Separated link</a>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="checkbox">
                                                                                             <input type="checkbox" value="" data-toggle="checkbox">
                                                                                        </label>
                                                    </td>
                                                    <td>Create Annual Training Plan. Get it reviewed by Mike</td>
                                                    <td class="td-actions text-right">
                                                        <div class="table-icons">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                                                 <i class="ti-pencil-alt"></i>
                                                                                        </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                                                  <i class="ti-close"></i>
                                                                                             </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="checkbox">
                                                                                             <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                                                       </label>
                                                    </td>
                                                    <td>Create Tutorials for Induction Training</td>
                                                    <td class="td-actions text-right">
                                                        <div class="table-icons">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                        <i class="ti-pencil-alt"></i>
                                                                    </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                        <i class="ti-close"></i>
                                                                    </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="checkbox">
                                                                    <input type="checkbox" value="" data-toggle="checkbox">
                                                                </label>
                                                    </td>
                                                    <td>Complete wireframe for HR Portal by end of December
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <div class="table-icons">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                        <i class="ti-pencil-alt"></i>
                                                                    </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                        <i class="ti-close"></i>
                                                                    </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="checkbox">
                                                                    <input type="checkbox" value="" data-toggle="checkbox">
                                                                </label>
                                                    </td>
                                                    <td>Recruit five developers and get them trained on the new project</td>
                                                    <td class="td-actions text-right">
                                                        <div class="table-icons">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                        <i class="ti-pencil-alt"></i>
                                                                    </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                        <i class="ti-close"></i>
                                                                    </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="card" style="min-height: 485px">
                                <div class="header">
                                    <h4 class="title">Activities</h4>
                                </div>
                                <div class="content">
                                    <div class="streamline">
                                        <div class="sl-item sl-primary">
                                            <div class="sl-content">
                                                <small class="text-muted">5 mins ago</small>
                                                <p>Williams has just joined Project X</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-danger">
                                            <div class="sl-content">
                                                <small class="text-muted">25 mins ago</small>
                                                <p>Jane has sent a request for access to the project folder</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-success">
                                            <div class="sl-content">
                                                <small class="text-muted">40 mins ago</small>
                                                <p>Kate added you to her team</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="sl-content">
                                                <small class="text-muted">45 minutes ago</small>
                                                <p>John has finished his task</p>
                                            </div>
                                        </div>
                                        <div class="sl-item sl-warning">
                                            <div class="sl-content">
                                                <small class="text-muted">55 mins ago</small>
                                                <p>Jim shared a folder with you</p>
                                            </div>
                                        </div>
                                        <div class="sl-item">
                                            <div class="sl-content">
                                                <small class="text-muted">60 minutes ago</small>
                                                <p>John has finished his task</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="header card-header-icon">
                                    <h4 class="title"><i class="ti-world"></i> Global Sales by Top Locations</h4>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="table-responsive table-sales">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../assets/img/flags/US.png" alt="">
                                                                </div>
                                                            </td>
                                                            <td>USA</td>
                                                            <td class="text-right">
                                                                2.920
                                                            </td>
                                                            <td class="text-right">
                                                                53.23%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../assets/img/flags/DE.png" alt="">
                                                                </div>
                                                            </td>
                                                            <td>Germany</td>
                                                            <td class="text-right">
                                                                1.300
                                                            </td>
                                                            <td class="text-right">
                                                                20.43%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../assets/img/flags/AU.png" alt="">
                                                                </div>
                                                            </td>
                                                            <td>Australia</td>
                                                            <td class="text-right">
                                                                760
                                                            </td>
                                                            <td class="text-right">
                                                                10.35%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../assets/img/flags/GB.png" alt="">
                                                                </div>
                                                            </td>
                                                            <td>United Kingdom</td>
                                                            <td class="text-right">
                                                                690
                                                            </td>
                                                            <td class="text-right">
                                                                7.87%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../assets/img/flags/RO.png" alt="">
                                                                </div>
                                                            </td>
                                                            <td>Romania</td>
                                                            <td class="text-right">
                                                                600
                                                            </td>
                                                            <td class="text-right">
                                                                5.94%
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flag">
                                                                    <img src="../assets/img/flags/BR.png" alt="">
                                                                </div>
                                                            </td>
                                                            <td>Brasil</td>
                                                            <td class="text-right">
                                                                550
                                                            </td>
                                                            <td class="text-right">
                                                                4.34%
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 offset-lg-1">
                                            <div id="worldMap" class="map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              