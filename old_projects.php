<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>LancerShelf | Projects</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<body>
	<style>
	.restric-line{
white-space: nowrap;
width: 450px;
overflow: hidden;
text-overflow: ellipsis;
}

a.faded{
	
	color:#9a776e47;
}
a.faded:hover,a.faded-1,.panel-tools>a{
	
	color:#9a776e;
}
span.faded-2,panel-tools>a>span.badge{
	background-color:#9a776e !important;
}

	</style>
		<div id="app">
			<!-- sidebar -->
			<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					
				</div>
			</div>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header" style="border-right:0px;">
							<!-- <a>
							
							<img style="margin-top:3px;" src="assets/images/lancershelf4.png" alt="Lancer Shelf"/>
							</a> --->
						<a class="navbar-brand" href="#">
							
							<img style="" src="assets/images/logo.png" alt="LancerShelf"/>
						</a>
					
						
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-right">
							<!-- start: MESSAGES DROPDOWN -->
							<?php require_once 'modules/ajax.header.inbox.php'; ?>
							<!-- end: MESSAGES DROPDOWN -->
							<!-- start: ACTIVITIES DROPDOWN -->
							<?php require_once 'modules/ajax.header.activities.php' ?>
							<!-- end: ACTIVITIES DROPDOWN -->
							<!-- start: LANGUAGE SWITCHER -->
							
							<!-- start: LANGUAGE SWITCHER -->
							<!-- start: USER OPTIONS DROPDOWN -->
							<?php require_once 'modules/ajax.header.useroption.php'; ?>
							<!-- end: USER OPTIONS DROPDOWN -->
						</ul>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<div class="arrow-left"></div>
							<div class="arrow-right"></div>
						</div>
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>
					<a class="dropdown-off-sidebar sidebar-mobile-toggler hidden-md hidden-lg" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
						&nbsp;
					</a>
					<a class="dropdown-off-sidebar hidden-sm hidden-xs" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
						&nbsp;
					</a>
					<!-- end: NAVBAR COLLAPSE -->
				</header>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"><b>Browse Projects</b> </h1>
									<span class="mainDescription">Browse projects and contest on LancerShelf.
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Dashboard</span>
									</li>
									<li class="active">
										<span>Browse Projects</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: PANEL WITH HEADING -->
						
						<!-- end: PANEL WITH HEADING -->
						<!-- start: PANEL TOOLS -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15"><span class="text-bold">Filter Results</span></h5>
									<p>
										Filter Projects by your saved skills
									</p>
									
									<div class="btn-group margin-bottom-10" data-toggle="buttons">
														<label class="btn btn-primary btn-o btn-xs active">
															<input type="radio" name="options" id="option0" autocomplete="off" data-filter = "all" class="filter-button" checked="">
															Web design
														</label>
														<label class="btn btn-primary btn-o btn-xs">
															<input type="radio" name="options" id="option1" autocomplete="off" data-filter = "webdesign" class="filter-button">
															Web design
														</label>
														<label class="btn btn-primary btn-o btn-xs">
															<input type="radio" name="options" id="option2" data-filter = "marketing" class="filter-button" autocomplete="off">
															Marketing
														</label>
														<label class="btn btn-primary btn-o btn-xs">
															<input type="radio" name="options" id="option3" data-filter = "contentwriting" class="filter-button" autocomplete="off">
															Content Writing
														</label>
									</div>
									<br>
									<div class="row">
										
										<div class="col-sm-8  margin-left-0" >
									
											<div class="panel panel-white margin-left-0 filter marketing webdesign contentwriting" id="panel4">
											
												<div class="panel-heading">
													
													<div class="panel-tools" >
														<a data-original-title="Contest" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-o btn-warning btn-sm faded" href="#"><i class="fa fa-2x fa-trophy"></i></a>
														<a data-original-title="Total Bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent  btn-sm faded-1" href="#">Bids: <span class="badge faded-2">3</span></a>
														<a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
														<a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
														<a data-original-title="Close" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
														<a data-original-title="Open for bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><label class="pull-right label label-success margin-bottom-5">Guaranteed</label></a>
														
													</div>
												</div>
												<div class="panel-body">
												<a href=""><b class="panel-title  text-large margin-bottom-15" style="color:#3b5979; font-size: 1.25rem; line-height: 1.4;">Need a Wordpress Expert To help me fix a bug on my site.</b></a>
												<br>
												
												<br>
													<p>
														Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
													</p>
													<div> <a href="#"> Web design  </a>,  <a href="#"> Wordpress</a>  <a href="#">Graphic design</a></div>
													<div class="pull-right"> <a class="btn btn-danger btn-block-o btn-o"><i class="ti ti-new-window"></i>  Bid</a> </div>
												</div>
											</div>
										
										
										
											<div class="panel panel-white margin-left-0 filter webdesign" id="panel4" style="background-color: #f7f7f887;">
											
												<div class="panel-heading">
													
													<div class="panel-tools" >
														<a data-original-title="Contest" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-o btn-warning btn-sm faded" href="#"><i class="fa fa-2x fa-folder-open"></i></a>
														<a data-original-title="Total Bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm faded-1" href="#">Bids: <span class="badge faded-2">3</span></a>
														<a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
														<a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
														<a data-original-title="Close" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
														<a data-original-title="Open for bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><label class="pull-right label label-info margin-bottom-5">Open</label></a>
														
													</div>
												</div>
												<div class="panel-body">
												<a href=""><b class="panel-title  text-large margin-bottom-15" style="color:#3b5979; font-size: 1.25rem; line-height: 1.4;">Need a Wordpress Expert To help me fix a bug on my site.</b></a>
												<br>
												
												<br>
													<p>
														Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
													</p>
													<div> <a href="#"> Web design  </a>,  <a href="#"> Wordpress</a>  <a href="#">Graphic design</a></div>
													<div class="pull-right"> <a class="btn btn-danger btn-block-o btn-o"><i class="ti ti-new-window"></i>  Bid</a> </div>
												</div>
											</div>
										
										
										
											<div class="panel panel-white  margin-left-0 filter contentwriting" id="panel4">
											
												<div class="panel-heading">
													
													<div class="panel-tools" >
														<a data-original-title="Project" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm faded" href="#"><i class="fa fa-2x fa-folder-open"></i></a>
														<a data-original-title="Total Bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm faded-1" href="#">Bids: <span class="badge faded-2">3</span></a>
														<a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
														<a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
														<a data-original-title="Close" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
														<a data-original-title="Open for bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><label class="pull-right label label-info margin-bottom-5">Open</label></a>
														
													</div>
												</div>
												<div class="panel-body">
												<a href=""><b class="panel-title  text-large margin-bottom-15" style="color:#3b5979; font-size: 1.25rem; line-height: 1.4;">Need a Wordpress Expert To help me fix a bug on my site.</b></a>
												<br>
												
												<br>
													<p>
														Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
													</p>
												</div>
											</div>
										
										
										
										
											<div class="panel panel-white margin-left-0 filter marketing" id="panel4">
											
												<div class="panel-heading">
													
													<div class="panel-tools" >
														<a data-original-title="Total Bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#">Bids: <span class="badge faded-2">3</span></a>
														<a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
														<a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
														<a data-original-title="Close" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><i class="ti-close"></i></a>
														<a data-original-title="Open for bids" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-close" href="#"><label class="pull-right label label-info margin-bottom-5">Open</label></a>
														
													</div>
												</div>
												<div class="panel-body">
												<a href=""><b class="panel-title  text-large margin-bottom-15" style="font-size: 1.25rem; line-height: 1.4;">Need a Wordpress Expert To help me fix a bug on my site.</b></a>
												<br>
												
												<br>
													<p>
														Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.
													</p>
												</div>
											</div>
										
										
										
										
										
										
										</div>
										
										
										
										<div class="col-sm-4  margin-left-0" >
										
										<div class="panel panel-white panel-noshadow" style="box-shadow: 0px 0px 0px #fff !important;" id="panel0009">
											<div class="panel-heading">
											<h3> Recent Projects </h3>
											<div class="panel-tools" >
														
														<a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
														<a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
														
														
														
											</div>
											
											</div>
										<div class="panel-body cl-effect-1" >
												<div style="padding-bottom:5px;"><a href="" class="" >Need a Wordpress Expert To help me fix a bug on my site.</a><br>
												<span class="text-muted text-small"> Wordpress, Html, web design </span>
												</div>
												<div style="padding-bottom:5px;"><a href="" class="">Need a Wordpress Expert To help me fix a bug on my site.</a><br>
												<span class="text-muted text-small"> Wordpress, Html, web design </span>
												
												</div>
												<div style="padding-bottom:5px;"><a href="" class="">Need a flexible to hire me fix a bug on my site.</a><br>
												<span class="text-muted text-small"> Wordpress, Html, web design </span>
												
												</div>
												<div style="padding-bottom:5px;"><a href="" class="" >Need a Wordpress Expert To help me fix a bug on my site.</a><br>
												<span class="text-muted text-small"> Wordpress, Html, web design </span>
												</div>
												<div style="padding-bottom:5px;"><a href="" class="">Need a Wordpress Expert To help me fix a bug on my site.</a><br>
												<span class="text-muted text-small"> Wordpress, Html, web design </span>
												
												</div>
												<div style="padding-bottom:5px;"><a href="" class="">Need a flexible to hire me fix a bug on my site.</a><br>
												<span class="text-muted text-small"> Wordpress, Html, web design </span>
												
												</div>
												
												<br>
												
												<br>
													
												</div>
										
										
										
										
										</div>
										</div>
										
									</div>
								
								</div>
							</div>
						</div>
						<!-- end: PANEL TOOLS -->
						<!-- start: COLORED PANELS -->
						
						<!-- end: COLORED PANELS -->
						<!-- start: PANEL OPTIONS -->

						<!-- end: PANEL OPTIONS -->
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> LancerShelf</span>. <span>All rights reserved</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			<!-- start: OFF-SIDEBAR -->
			<?php require_once 'right_sidebar.php'; ?> 
			<!-- end: OFF-SIDEBAR -->
			<!-- start: SETTINGS -->
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
			});
			
			//skills filtering
			
			$(document).ready(function(){

    $(".filter-button").change(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).fadeOut('1000');
            $('.filter').filter('.'+value).fadeIn('1000');
            
        }
    });

});
			
		</script>
		
		<script type="text/javascript">// <![CDATA[
$(function(){
  $("p").each(function(i){
    len=$(this).text().length;
    if(len>190)
    {
      $(this).text($(this).text().substr(0,190)+'...');
    }
  });
});
// ]]></script>





		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
