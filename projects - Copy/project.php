﻿<?php require_once '../modules/session.php';
	  require_once '../modules/db.php'; 
	  require_once 'tempfix/profile.ajax.php'; 
	 // require_once '../modules/utilities/timeago.php'; 
	

	
					//define($project_id ,(int)$_REQUEST['id']);
					$project_id = (int)$_REQUEST['id'];
$title =  getProjectDetails($project_id,'title');
$description =  getProjectDetails($project_id,'description');
$date =  getProjectDetails($project_id,'date');
$files_status =  getProjectDetails($project_id,'files_status');
$skills =  getProjectDetails($project_id,'skills');
$budget =  getProjectDetails($project_id,'budget');
$category =  getProjectDetails($project_id,'category');
$owner_id =  getProjectDetails($project_id,'owner_id');
$owner_name =  getProjectDetails($project_id,'owner_name');



			function userIdToName($user_id){
						$mail = $user_id;
						$sql_query = mysql_query("SELECT fname,lname FROM users WHERE id = '$user_id' ");
						$count = mysql_num_rows($sql_query);
						while( $rows = mysql_fetch_assoc($sql_query)) {
						if($count == 1) {
						return $rows['fname']." ".$rows['lname'];
						}elseif($count > 1 ){
						return $count." Similar IDs";
						} else{ return false;}
						}
					}
		
		 function getProjectDetails($project_id,$mode = 'all'){
			 
				
			 
						$match_query = mysql_query("SELECT * FROM projects WHERE id ='".$project_id."' ");

						$count = mysql_num_rows($match_query);

					if($count > 0){

				while($rows = mysql_fetch_assoc($match_query)){
						 $record_set[] = array('id' => $rows['id'],
						'title' => $rows['title'],
						'description' => $rows['description'],
						'date' => timeAgo($rows['date']),
						'skills' => $rows['skills'],
						'budget' => $rows['budget'],
						'files_status' => $rows['files_status'],
						'owner_id' => $rows['owner_id'],
						'owner_name' => userIdToName($rows['owner_id']),
						'pay_status' => $rows['pay_status']);
				}
				
				if($mode == 'all') {
						return $record_set;
					
				}else{
						if(isset($record_set[0][$mode])){
							return $record_set[0][$mode];
						}
						
					}
					
					
					}else{
						echo "NO project with this ID exists on our server ! ";
					}
						
						
						
					}
					
					//bidding modules
					
					//average bids
					$avg = mysql_query("SELECT AVG(bid_price) FROM bids WHERE project_id = '".$project_id."' ");
					$average_bid = mysql_result($avg,0);

					//count bids
					$sum = mysql_query("SELECT COUNT(id) FROM bids WHERE project_id = '".$project_id."' ");
					$total_bids = mysql_result($sum,0);
					
					//user rating
					function userRating($user_to_rate_id,$rev_count = 'false'){
					$average_query = mysql_query("SELECT AVG(rating) FROM rating WHERE destination_uid = '$user_to_rate_id'");
					$avaerage_rating =  mysql_result($average_query,0);
					
					$total_query = mysql_query("SELECT COUNT(rating) FROM rating WHERE destination_uid = '$user_to_rate_id'");
					$total_query =  mysql_result($total_query,0);
					
					$avaerage_rating = floor($avaerage_rating);
					$unstared_portion =  5 - $avaerage_rating; 
					
					$star = "";
					for($i=0; $i<$avaerage_rating; $i++){
					$star = $star.' <i class="fa fa-star fa-star-red" style="color:red;"> </i>';
					}
					
					$no_star = "";
					for($i=0; $i<$unstared_portion; $i++){
					$no_star = $no_star.' <i class="fa fa-star-o"> </i>';
					}
					
					$user_calculated_rating = $star.''.$no_star;
					if($rev_count == 'true'){
					return $user_calculated_rating." (".$total_query." Reviews)"; 
					}elseif($rev_count == 'false'){
					return $user_calculated_rating.' <span id="ratingValue" class="label label-success">'.$avaerage_rating.'</span>'; 	
						
					}else{
					return $user_calculated_rating;	
						
					}
					}
					
					//check for attachment and display
		
							
					
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LancerShelf Projects - <?php echo $title; ?></title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href="fontawesome/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" href="../vendor/themify-icons/themify-icons.min.css" rel="stylesheet">
	<link type="text/css" href="../vendor/bootstrap-rating/bootstrap-rating.css" rel="stylesheet" media="screen">
	<link type="text/css" href="../vendor/sweetalert/sweet-alert.css" rel="stylesheet" media="screen">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<style>

body{
	
	
	background: #FAFAFA;
    background-image: url(bg.png) !important;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: right top;
	
}
.fix-mobile{

    font-weight: bold;
    font-size: 25px;
    margin-left: 20px;
    padding: 10px;
}

.fa-star-red{
color: #c31313 !important;
}

 .right-bar {
        margin-top: -47px !important;
    }

@media screen and (max-width: 480px) {
    .right-bar {
        margin-top: 10px !important;
    }
	.media-avatar{
		display:none !important;
	}
}
.fader{
	
	color:black !important;
}

</style>

	<div class="navbar navbar-fixed-top" style="position:fixed !important; margin-bottom:10px;">
		<div class="navbar-inner text-primary" style="color:dodgerblue" >
			<div class="container">
				<ul class="btn-o pull-right fix-mobile" style="list-style-type:none">
					<li class="ti  ti-blackboard"></li>
					<li> <span class="shaded" style="font-size:10px;">Dashboard</span>  </li>
				</ul>
				<ul class="btn-o pull-right fix-mobile" style="list-style-type:none">
					<li class="ti ti-home"></li>
					<li><span class="shaded" style="font-size:10px;">Home</span></li>
				</ul>
				
			  	<a class="brand" href="index.html">
			  	<img src="../assets/images/logo.png" alt="LancerShelf"/>
			  	</a>

				
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<!--/.sidebar-->
				</div><!--/.span3-->


				<div class="span9">
					<div class="content">

						<div class="module" style="margin-top:55px;">
							<div class="module-head" style="margin-bottom:15px;">
							<hr>
								<h2><?php echo $title; ?></h2>
							</div>
							<div class="module-body">
								<div class="stream-headline">
								
												<h5 class="stream-author">
													<a href="../profiles.php?a642a77abd7d4f51bf9226ceaf891fcbb5b299b8=<?php echo $owner_id; ?>"><?php echo $owner_name; ?></a>
													<small> created <?php echo $date; ?></small>
												</h5>
												<div class="stream-text" style="font-size:15px; color:#270f0f;">
													 <?php echo $description; ?>
                                              
                                                
                                                
                                               

                                                
                                                </div>
												<br>
												<br>
												
												
												<div class="panel-group">
												  <div class="panel panel-default">
													<div class="panel-heading">
													  <h5 class="panel-title" >
														<a data-toggle="collapse" href="#collapse0"><i class="fa fa-plus-square-o"></i> Project Details</a>
													  </h5>
													</div>
													<div id="collapse0" class="panel-collapse collapse">
													  <ul class="list-group">
													    <li class="list-group-item " style="list-style-type:none"><span class="fa fa-check-circle-o"></span> Project ID :<?php echo $project_id; ?>  </li>
														<li class="list-group-item " style="list-style-type:none"><span class="fa fa-check-circle-o"></span> Bids :<?php echo $total_bids; ?>  </li>
														<li class="list-group-item" style="list-style-type:none"><span class="fa fa-check-circle-o"></span> Average Bids: &#8358; <?php echo ceil($average_bid); ?></li>
														<li class="list-group-item" style="list-style-type:none"><span class="fa fa-check-circle-o"></span> Budget : &#8358; <?php echo $budget; ?></li>
													  </ul>
													  <div class="panel-footer">Employer Details</div>
													  <ul class="list-group text-danger">
														<li class="list-group-item" style="list-style-type:none"><span class="fa fa-check-circle-o"></span><?php echo userRating($owner_id,'true'); ?>  </li>
														<li class="list-group-item" style="list-style-type:none"><span class="fa fa-check-circle-o"></span><span class="badge badge-success"> <i class="fa fa-check"></i> Verified</span></li>
														<li class="list-group-item" style="list-style-type:none"><span class="fa fa-check-circle-o"></span><span class="badge badge-primary"> <i class="fa fa-check"></i> Trusted </span></li>
														
													  </ul>
													</div>
												  </div>
												</div>
												
												
												
												<hr>
												<div class="stream-options">
												
												
												<!-- BIDDING FORM-->
												
												<?php 
												$match_query = mysql_query("SELECT * FROM bids WHERE uid = '".$active_session_id."' AND project_id ='".$project_id."'");
												$count = mysql_num_rows($match_query);
													if($count < 1 && $owner_id !== $active_session_id){
														echo '
													
												
												
												<form class="form-control" id="bid">
												<div class="control-group">
													<label class="control-label" for="basicinput">Bid Price</label>
													<div class="controls">
														<div class="input-prepend">
															<span class="add-on">&#8358;</span><input class="" name="bid_price" type="text" style="width:215px !important;" placeholder="5 000">       
														</div>
													</div>
												</div>
												
												<div class="control-group">
													<label class="control-label" for="basicinput">Finish time</label>
													<div class="controls form-inline">
														<div class="input-append">
															<input type="text" name="completion_time" placeholder="5 days" class="" style="width:242px !important;><span class="">
															
															<!---appended -->
															
															<!-- appended -->
															</span>
														</div>
													</div>
												</div>
												
									<div class="panel-group">
									  <div class="panel panel-default">
										<div class="panel-heading">
										  <h5 class="panel-title">
											<a data-toggle="collapse" href="#collapse1"> <i class="fa fa-plus-square-o"></i> Add description </a>
										  </h5>
										</div>
										<div id="collapse1" class="panel-collapse collapse">
										  <span class="text-muted"> Optionally - Describe how you want to do the job </span><br>
										  <textarea  name="bid_description" class="span5" rows="5"></textarea>
										</div>
									  </div>
									</div>
									
									<div class="panel-group">
									  <div class="panel panel-default">
										<div class="panel-heading">
										  <h5 class="panel-title">
											<a data-toggle="collapse" href="#collapse2"> <i class="fa fa-plus-square-o"></i> Add additional service </a>
										  </h5>
										</div>
										<div id="collapse2" class="panel-collapse collapse">
										  <span class="text-muted"> Optionally - Describe what additional services you can provide </span><br>
										  <textarea name="extra_services" class="span5" rows="5"></textarea>
										</div>
									  </div>
									</div>
									<input type="hidden" class="hidden" name="project_id"  value="'; if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){echo (int)$_REQUEST['id']; }  echo '">
												
												<a href="#" class="btn btn-md btn-primary clickSanta">
													<i class="icon-share "></i>
													Submit Bid
												</a>
												</form>
													';}
												
												?>
												<!-- BIDDING FORM-->
												
												
												<!--BID EDIT FORM -->
												<?php
												//if($count && ($active_session_id !== $owner_id && $count > 0)){ #14344
												if($count &&  $count > 0){
												
								$bids_edit_query = mysql_query("SELECT * FROM bids WHERE project_id = '".$project_id."' ");
								while($bidRows = mysql_fetch_assoc($bids_edit_query)){
									$bid_edit_price = $bidRows['bid_price'];
									$uid_edit = $bidRows['uid'];
									$completion_time_edit = $bidRows['completion_time'];
									$bid_description_edit = $bidRows['bid_description'];
									$extra_services_edit = $bidRows['extra_services'];
									
									
									echo '<form class="form-control" id="bid">
												<div class="control-group">
													<label class="control-label" for="basicinput">Bid Price</label>
													<div class="controls">
														<div class="input-prepend">
															<span class="add-on">&#8358;</span><input class="" name="bid_price" type="text" style="width:215px !important;" value = "'.$bid_edit_price.'" placeholder="5 000">       
														</div>
													</div>
												</div>
												
												<div class="control-group">
													<label class="control-label" for="basicinput">Finish time</label>
													<div class="controls form-inline">
														<div class="input-append">
															<input type="text" name="completion_time" placeholder="5 days" value ="'.$completion_time_edit.'" class="" style="width:242px !important;><span class="">
															
															<!---appended -->
															
															<!-- appended -->
															</span>
														</div>
													</div>
												</div>
												
									<div class="panel-group">
									  <div class="panel panel-default">
										<div class="panel-heading">
										  <h5 class="panel-title">
											<a data-toggle="collapse" href="#collapse1"> <i class="fa fa-plus-square-o"></i> Add description </a>
										  </h5>
										</div>
										<div id="collapse1" class="panel-collapse collapse">
										  <span class="text-muted"> Optionally - Describe how you want to do the job </span><br>
										  <textarea  name="bid_description" class="span5" rows="5">'.$bid_description_edit.'</textarea>
										</div>
									  </div>
									</div>
									
									<div class="panel-group">
									  <div class="panel panel-default">
										<div class="panel-heading">
										  <h5 class="panel-title">
											<a data-toggle="collapse" href="#collapse2"> <i class="fa fa-plus-square-o"></i> Add additional service </a>
										  </h5>
										</div>
										<div id="collapse2" class="panel-collapse collapse">
										  <span class="text-muted"> Optionally - Describe what additional services you can provide </span><br>
										  <textarea name="extra_services" class="span5" rows="5">'.$extra_services_edit.'</textarea>
										</div>
									  </div>
									</div>
									<input type="hidden" class="hidden" name="project_id"  value="'; if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){echo (int)$_REQUEST['id']; }  echo '">
												
												<a href="#" class="btn btn-md btn-primary clickSanta">
													<i class="fa fa-paper-plane "></i>
													Update Bid
												</a>
												</form>';
									
									
									
									
									
									
												
								}
												
												
												}
												
												?>
												
												
												<!--BID EDIT FORM -->
												
												
											</div>
												<div class="stream-attachment photo">
													<div class="responsive-photo">
													<span class="text-warning" ><span class="fa fa-paperclip"></span> Additional files </span>
														<?php 
														
							if($files_status == 'true'){
								$query_url = mysql_query("SELECT * FROM files WHERE project_id = '".$project_id."' ");
								while($fileRows = mysql_fetch_assoc($query_url)){
									$file_name = $fileRows['name'];
									$file_url = $fileRows['file_url'];
									$file_type = $fileRows['type'];
									echo '<a href="../modules/'.$file_url.'" title="'.$file_type.'">'.$file_name.'</a>';
								}
								
							}		
							
						
														
														?>
													</div>
													
												</div>
												
											</div>

								<div class="stream-list">
								
								
								
								
																
								
									<div class="media stream new-update">
										<a href="#bid">
											<i class=" fa fa-bar-chart text-primary"></i>
											<?php 
											
											if($total_bids && $total_bids > 0){
												echo $total_bids." New Bids";
												
											}
											if($total_bids == 0){
												echo "No bids for this project yet!";
												
											}
											
											?> 
										</a>
									</div>
									
									
									<?php
									
									//bids for this project
									
									$user_profile = new userprofile();
									
							$bids_query = mysql_query("SELECT * FROM bids WHERE project_id = '".$project_id."' ");
								while($bidRows = mysql_fetch_assoc($bids_query)){
									$bid_price = $bidRows['bid_price'];
									$uid = $bidRows['uid'];
									$completion_time = $bidRows['completion_time'];
									$bid_description = $bidRows['bid_description'];
									$extra_services = $bidRows['extra_services'];
									$date = timeAgo($bidRows['date']);
									$userStar = userRating($uid,'false');
									$bidder_name = $user_fullname = $user_profile->get_main_profile($uid,'fname')." ".$user_profile->get_main_profile($uid,'lname');
									$profilePic = $user_profile->get_main_profile($uid,'profilePic');
									$city = $user_profile->get_main_profile($uid,'city');
									$country = $user_profile->get_core_profile($uid,'country');
								
									echo '<div class="media stream" data-bid-id="'.$uid.'">
										<a href="#" class="media-avatar medium pull-left">';
										if($profilePic == '23se45ft67ygh86f/alt-user.png'){
											echo '<img src="../assets/images/lancershelf4.png">';
										}else{
											
											echo '<img src="../modules/'.$profilePic.'" alt="'.$bidder_name.' avatar">';
										}
										echo '</a>
										<div class="media-body">
											<div class="stream-headline">
												<h5 class="stream-author">
													'.$bidder_name.'
													<small>'.$date.'</small>
												</h5>
												<div class="stream-text">
												
													Will do the job,  &#8358; '.$bid_price.'  for '.$completion_time.'
												
													
												</div>
												<div class="pull-right text-primary right-bar" >
												
												
												<div class="margin-bottom-30 text-extra-large" id="">
																'.$userStar.'
												</div>
												<i class="list-group-item"><span class="badge badge-success"> <i class="fa fa-check"></i> Verified</span></i><br>
												<span class="text-muted">'.$city.','.$country.' </span>
												
												</div>
											</div><!--/.stream-headline-->
															<div class="stream-options">';
											if($active_session_id == $owner_id ){
											echo '
												<a href="#" class="btn btn-xs btn-success accept-bid" id="'.$uid.'">
													<i class="fa fa-check-square-o "></i>
													Accept
												</a>
												<a href="#" class="btn btn-xs btn-danger report-bid" id="Report_'.$uid.'">
													<i class="fa fa-flag"></i>
													Report
											</a>';
											}
												if($active_session_id == $uid){
													echo '<a href="#" class="btn btn-xs btn-default edit-bid" id="Edit_'.$uid.'">
													<i class="fa fa-pencil"></i>
													Edit
												</a>';
												}
												
											echo' </div>

											
                                          
										</div>
									</div><!--/.media .stream-->';
								}
									
									?>
									
									

									<div class="media stream load-more">
										<a class="" href="#">
											<i class="fa fa-refresh shaded"></i>
											show more...
										</a>
										
									</div>
								</div><!--/.stream-list-->
							</div><!--/.module-body-->
						</div><!--/.module-->
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2018 LancerShelf - lancershelf.com </b> All rights reserved.
		</div>
	</div>

	
	
</body>
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../vendor/bootstrap-rating/bootstrap-rating.min.js"></script>
	<script src="../assets/js/ui-elements.js"></script>
	<script src="../vendor/sweetalert/sweet-alert.min.js"></script>
	<script src="../assets/js/ui-notifications.js"></script>
	
	<script> 
		jQuery(document).ready(function() {
		UINotifications.init();
		deepClone();
		});
		
//init form submission

$("form#bid").on('submit', function(event){
				
					event.preventDefault();
    var formData = new FormData(this); 
	
	var dateObj = new Date();
var newDateString = dateObj.getMilliseconds();
        $.ajax({
            url: '../modules/ajax.bidder.php?id='+ newDateString,
            type: 'POST',
            data: formData,
            success: function (data) {
				
				//$('#post-response').html(data);
				
				var res = data.match(/successful/gi); 
				
			   if(res.length > 0) {  
			   //do stuffs
			   }
			   
            },
            cache: false,
            contentType: false,
            processData: false
        });
            
    });  
	
	
	
	function AcceptBid(var_6b8a05034c4deffe97fdac7088cd43f1){
		var var_6b8a05034c4deffe97fdac7088cd43f2 = '<?php echo $project_id; ?>';
	        $.ajax({
            url: '../modules/ajax.acceptbid.php?var_6b8a05034c4deffe97fdac7088cd43f1='+var_6b8a05034c4deffe97fdac7088cd43f1 +'&var_6b8a05034c4deffe97fdac7088cd43f2='+var_6b8a05034c4deffe97fdac7088cd43f2,
            type: 'POST',
            data: '',
			
            success: function (data) {
				
				//$('#post-response').html(data);
				
				var res = data.match(/successful/gi);
					var res2 = data.match(/failure/gi);
				
			   if(res.length > 0) {  
			   //do nothing for now
			   }
			   if(res2.length > 0) {  
			   swal("oh snap! An error Occured", "", "error");
			   }
			   
            },
            cache: false,
            contentType: false,
            processData: false
        });
	}
	
	
	 function deepClone(){
		
		<?php 
		$check_selected = mysql_query("SELECT accepted_uid FROM project_status WHERE project_id = '".$project_id."'");
		if($check_selected && mysql_num_rows($check_selected) !== 0){
			
			echo "var CLONE_TARGET = '".mysql_result($check_selected,0)."';";
			echo '';
		}
		
		?>
		
		$('[data-bid-id="'+CLONE_TARGET+'"]')
		.clone(false).css('background-color','rgb(238, 238, 238)')
		.prependTo('.stream-list')
		.hide().fadeIn(3000).find('.stream-options').css('display','none');
		$('<div class="media stream new-update"> <a href=""> <img width="32px" height="32px"  src="images/medal.png" alt="medal" /> Selected Bid </a> 	</div>').prependTo('.stream-list');
		//background-color: rgb(238, 238, 238);
	};
	</script>
	
</html>