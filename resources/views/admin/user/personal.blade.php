<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
    <style type="text/css">

        body{ background:#EEEEEE;margin:0; padding:0; font-family:"微软雅黑", Arial, Helvetica, sans-serif; }

        a{ color:#006600; text-decoration:none;}

        a:hover{color:#990000;}

        .top{ margin:5px auto; color:#990000; text-align:center;}

        .info select{ border:1px #993300 solid; background:#FFFFFF;}

        .info{ margin:5px; text-align:center;}

        .info #show{ color:#3399FF; }

        .bottom{ text-align:right; font-size:12px; color:#CCCCCC; width:1000px;}

    </style>

</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-city.jpg')">
    <!--   Creative Tim Branding   -->
    <a href="#">
         <div class="logo-container">
            <div class="logo">
                <img src="assets/img/new_logo.png">
            </div>
            <div class="brand">
                Creative Tim
            </div>
        </div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="green" id="wizard">
                <form action="#" method="post">
                <!--        You can switch ' data-color="green" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>我的</b> 个人信息 <br>
                        	   <small>信不信在你,写不写在我.</small>
                        	</h3>
                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#location" data-toggle="tab">地址</a></li>
	                            <li><a href="#type" data-toggle="tab">类型</a></li>
	                            <li><a href="#facilities" data-toggle="tab">好友</a></li>
	                            <li><a href="#description" data-toggle="tab">个性</a></li>
	                        </ul>
						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="location">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <h4 class="info-text"> 基本信息</h4>
                                  </div>
                                  <div class="info">

                                      <div>

                                          <select id="s_province" name="s_province"></select>  

                                          <select id="s_city" name="s_city" ></select>  

                                          <select id="s_county" name="s_county"></select>

                                          <script class="resources library" src="{{asset('/admin/area.js')}}" type="text/javascript"></script>



                                          <script type="text/javascript">_init_area();</script>

                                      </div>

                                      <div id="show"></div>

                                  </div>

                                  <script type="text/javascript">

                                      var Gid  = document.getElementById ;

                                      var showArea = function(){

                                          Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +

                                              Gid('s_city').value + " - 县/区" +

                                              Gid('s_county').value + "</h3>"

                                      }

                                      Gid('s_county').setAttribute('onchange','showArea()');

                                  </script>


                              </div>
                            </div>
                            <div class="tab-pane" id="type">
                                <h4 class="info-text">What type of location do you have? </h4>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if you have a house.">
                                                <input type="radio" name="type" value="House">
                                                <div class="icon">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <h6>House</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if you have an appartment">
                                                <input type="radio" name="type" value="Appartment">
                                                <div class="icon">
                                                    <i class="fa fa-building"></i>
                                                </div>
                                                <h6>Appartment</h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="facilities">
                                <h4 class="info-text">Tell us more about facilities. </h4>
                                <div class="row">
                                    <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Your place is good for</label>
                                          <select class="form-control">
                                            <option disabled="" selected="">- type -</option>
                                            <option>Business</option>
                                            <option>Vacation </option>
                                            <option>Work</option>
                                          </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-group">
                                          <label>Is air conditioning included ?</label>
                                          <select class="form-control">
                                            <option disabled="" selected="">- response -</option>
                                            <option>Yes</option>
                                            <option>No </option>
                                          </select>
                                      </div>
                                     </div>
                                     <div class="col-sm-5 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Does your place have wi-fi?</label>
                                          <select class="form-control">
                                            <option disabled="" selected="">- response -</option>
                                            <option>Yes</option>
                                            <option>No </option>
                                          </select>
                                       </div>
                                      </div>
                                      <div class="col-sm-5">
                                       <div class="form-group">
                                          <label>Is breakfast included?</label>
                                          <select class="form-control">
                                            <option disabled="" selected="">- response -</option>
                                            <option>Yes</option>
                                            <option>No </option>
                                          </select>
                                       </div>
                                      </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="description">
                                <div class="row">
                                    <h4 class="info-text"> Drop us a small description. </h4>
                                    <div class="col-sm-6 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Place description</label>
                                            <textarea class="form-control" placeholder="" rows="9">

                                            </textarea>
                                          </div>
                                    </div>
                                    <div class="col-sm-4">
                                         <div class="form-group">
                                            <label>Example</label>
                                            <p class="description">"The place is really nice. We use it every sunday when we go fishing. It is so awesome."</p>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            	<div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-success btn-wd btn-sm' name='next' value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-success btn-wd btn-sm' name='finish' value='Finish' />

                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             made with <i class="fa fa-heart heart"></i> by <a href="#">Creative Tim</a>. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
        </div>
    </div>
</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</html>

