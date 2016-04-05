<?php 
ini_set('display_errors', 'off');
require_once('include/MySqlDb.php');
require_once("./include/membersite_config.php");

$Db = new MySqlDb('localhost', 'root', '', 'kingsfield_database');

if(isset($_POST['login']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL('./?action=rooms');
   }
}

if (isset($_GET['action'])){
			$action = htmlentities($_GET['action']);
		}
		else{
			$action = NULL;
			}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>Kingsfield Express Inn</title>
 <!-- styles -->
 	<link rel="shortcut icon" href="ico/icon.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/prettify.css" rel="stylesheet">
    <link href="css/tm_docs.css" rel="stylesheet">
    <link href="css/camera.css" rel="stylesheet">
	<link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    
   	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
  	<script src="js/delete.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    
    <script>
            jQuery(document).ready(function(){
                jQuery("#formID").validationEngine('attach', {promptPosition : "bottomRight", autoPositionUpdate : true});
				jQuery("#formorder").validationEngine(
				
				{
				promptPosition : "centerLeft",
				'custom_error_messages': {
					// Custom Error Messages for Validation Types
					'#check': {
						'minCheckbox': {
							'message': "Please Select Atleast One Item !"
						}
					}
				}
			});
				
				
            });
        </script>
    
    
    <!--sa calendar-->	
    	
		<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		//<![CDATA[

		/*
				A "Reservation Date" example using two datePickers
				--------------------------------------------------

				* Functionality

				1. When the page loads:
						- We clear the value of the two inputs (to clear any values cached by the browser)
						- We set an "onchange" event handler on the startDate input to call the setReservationDates function
				2. When a start date is selected
						- We set the low range of the endDate datePicker to be the start date the user has just selected
						- If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

				* Caveats (aren't there always)

				- This demo has been written for dates that have NOT been split across three inputs

		*/

		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Clear any old values from the inputs (that might be cached by the browser after a page reload)
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				// Add the onchange event handler to the start date input
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {
				// Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
				// until they become available (a maximum of ten times in case something has gone horribly wrong)

				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Check the value of the input is a date of the correct format
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				// If the input's value cannot be parsed as a valid date then return
				if(dt == 0) return;

				// At this stage we have a valid YYYYMMDD date

				// Grab the value set within the endDate input and parse it using the dateFormat method
				// N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Set the low range of the second datePicker to be the date parsed from the first
				ed.setRangeLow( dt );
				
				// If theres a value already present within the end date input and it's smaller than the start date
				// then clear the end date value
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Remove the onchange event handler set within the function initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		//]]>
		</script>
		<!--sa minus date-->
		<script type="text/javascript">
			// Error checking kept to a minimum for brevity
		 
			function setDifference(frm) {
			var dtElem1 = frm.elements['start'];
			var dtElem2 = frm.elements['end'];
			var resultElem = frm.elements['result'];
			 
		// Return if no such element exists
			if(!dtElem1 || !dtElem2 || !resultElem) {
		return;
			}
			 
			//assuming that the delimiter for dt time picker is a '/'.
			var x = dtElem1.value;
			var y = dtElem2.value;
			var arr1 = x.split('/');
			var arr2 = y.split('/');
			 
		// If any problem with input exists, return with an error msg
		if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
		resultElem.value = "Invalid Input";
		return;
			}
			 
		var dt1 = new Date();
		dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
		var dt2 = new Date();
		dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

		resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
		}
		</script>
          
    
</head>

<body>
        
<!----------------------------------------------------------------------------------------------------------------- /navbar -->
<div class="navbar navbar-inverse navbar-fixed-top">

              <div class="navbar-inner">
                <div class="container">
                  <div class="nav-collapse collapse navbar-inverse-collapse">
                  
                    <ul class="nav">
                    <?php if($action == ''){?>
                      <li class="divider-vertical"></li>
                      <li class="active"><a href='./'><i class="icon-home"></i> Home</a></li>
                      <li><a href='?action=rooms'><i class="icon-list-alt"></i> Rooms</a></li>
                      <li><a href='?action=location'><i class="icon-map-marker"></i> Location</a></li>
                    <?php }else if($action == 'rooms'){?> 
                      <li class="divider-vertical"></li>
                      <li><a href='./'><i class="icon-home"></i> Home</a></li>
                      <li class="active"><a href='?action=rooms'><i class="icon-list-alt"></i> Rooms</a></li>
                      <li><a href='?action=location'><i class="icon-map-marker"></i> Location</a></li>
                    <?php }else if($action == 'location'){?> 
                      <li class="divider-vertical"></li>
                      <li><a href='./'><i class="icon-home"></i> Home</a></li>
                      <li><a href='?action=rooms'><i class="icon-list-alt"></i> Rooms</a></li>
                      <li class="active"><a href='?action=location'><i class="icon-map-marker"></i> Location</a></li> 
                    <?php }else{?> 
                      <li class="divider-vertical"></li>
                      <li><a href='./'><i class="icon-home"></i> Home</a></li>
                      <li><a href='?action=rooms'><i class="icon-list-alt"></i> Rooms</a></li>
                      <li><a href='?action=location'><i class="icon-map-marker"></i> Location</a></li>  
                    <?php }?> 
                    </ul><!-- /nav end -->
                    
<?php if(!$fgmembersite->CheckLogin()){?> 
		<?php if($action == ''){?>                   
                    <ul class="nav pull-right">
                      <li class="divider-vertical"></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kingsfield Express Inn <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href='#reset'data-toggle="modal"><i class="icon-repeat"></i> Reset Password</a></li>
                          <li class="divider"></li>
                          <li><a href='#cancel'data-toggle="modal"><i class="icon-remove"></i> Cancel Reservation</a></li>
                          <li class="divider"></li>
                          <li><a href='#registermodal' data-toggle="modal"><i class="icon-pencil"></i> Register</a></li>
                        </ul>
                      </li>
                    </ul><!--nav pull-right end-->                

                   
<form id="formID" class="navbar-search pull-right" action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

	<input type='hidden' name='login' id='submitted' value='1'/>
    <input id="log" type="hidden" value="<?php echo $fgmembersite->GetErrorMessage(); ?>" />
    <input placeholder="Username" type='text' class="validate[required] text-input search-query span2" name='lusername' id='username' value='<?php echo $fgmembersite->SafeDisplay('lusername') ?>'/>
    
    <input placeholder="Password" type='password' class="validate[required] text-input search-query span2" name='password' id='password' />

	<button name='Submit' type='submit' class="btn btn-primary" style="margin-top:-1px;"><i class="icon-check"></i> Sign in</button>
    
</form>

		<?php }?>


<?php }else{?>

<?php 

$id_user = $fgmembersite->Userid();

$cart = $fgmembersite->cart();

$mid = $Db->query("SELECT id_user,message_status FROM tb_message where id_user = $id_user and message_status = 1");
$reservation = $Db->query("SELECT id_user,status_id FROM tb_reservation where id_user = $id_user and status_id = 1");?>

					<ul class="nav pull-right">
                      <li class="divider-vertical"></li>
      
      <?php foreach($reservation as $key => $row){?> 
      <?php $total = count($reservation);?>
      <?php } ?> 
      
      <?php foreach($mid as $key => $row){?> 
      <?php $mtotal = count($mid);?>
      <?php } ?>  
      
      <?php if($action == 'message'){?> 
      <li class="active"><a href='?action=message'><i class="icon-comment"></i> Message <span class="badge"><?php echo $mtotal;?></span></a></li>     
      <li class="divider-vertical"></li> 
      <li><a href='?action=<?php echo $cart;?>' data-toggle="modal"><i class="icon-shopping-cart"></i> My Shopping Cart <span class="badge badge-info"><?php if($reservation == !false){echo $total;}?></span></a></li>
      <?php }else if($action == $cart){?> 
      <li><a href='?action=message'><i class="icon-comment"></i> Message <span class="badge badge-important"><?php echo $mtotal;?></span></a></li>  
      <li class="divider-vertical"></li>    
      <li class="active"><a href='?action=<?php echo $cart;?>' data-toggle="modal"><i class="icon-shopping-cart"></i> My Shopping Cart <span class="badge"><?php if($reservation == !false){echo $total;}?></span></a></li>
      <?php }else{?>
      <li><a href='?action=message'><i class="icon-comment"></i> Message <span class="badge badge-important"><?php echo $mtotal;?></span></a></li>  
      <li class="divider-vertical"></li>    
      <li><a href='?action=<?php echo $cart;?>' data-toggle="modal"><i class="icon-shopping-cart"></i> My Shopping Cart <span class="badge badge-info"><?php if($reservation == !false){echo $total;}?></span></a></li>
   	  <?php }?>
     
     
      
      
      				
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo ucwords($fgmembersite->UserFullName());?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        <li><a href="#book" data-toggle="modal"><i class="icon-shopping-cart"></i> My Shopping Cart <span class="badge badge-info"><?php if($reservation == false){echo "0";}else{echo $total;}?></span></a></li>
                          <li class="divider"></li>
                          <li><a href='?action=logout'><i class="icon-off"></i> Logout</a></li>
                        </ul>
                      </li>
                      <li class="divider-vertical"></li>
                    </ul><!--nav pull-right end-->

<?php }?>
                    
                  </div><!-- /.nav-collapse end -->
                  
                </div><!-- /container end -->
                
              </div><!-- /navbar-inner -->
              
</div><!-- /navbar -->

<!------------------------------------------------------------------------------------------------------------ /navbar end -->
<?php if($action == ''){?>       
<!----------------------------------------------------------------------------------------------------------- /slider start-->


<div style="margin-top:60px;" class="container thumbnail">

<div class="camera_wrap camera_azure_skin" id="slider">

<?php
$result = $Db->query("SELECT * FROM tb_slider");
?>

<?php foreach($result as $key => $row){?>
		
		  <div data-thumb="img/camera/slides/thumbs/<?php echo $row['slider_image'];?>" data-src="img/camera/slides/<?php echo $row['slider_image'];?>"> 
        		        
          <div class="camera_caption fadeFromBottom">
              <h2><?php echo $row['slider_title'];?></h2>
              <p><?php echo $row['slider_details'];?></p>
              
              <?php if($fgmembersite->CheckLogin()){?>
              <a href="#book" data-toggle="modal"><button class="btn btn-primary"><i class="icon-calendar"></i> Book now</button></a>	<?php }else{?>
           	
            <div class="tooltip-demo">
     		<a data-toggle="tooltip" data-placement="right" title="Sign-in your account or Sign-up to create reservations thank you!"><button class="btn btn-primary"><i class="icon-calendar"></i> Book now</button></a> 	
            </div>  
            
              <?php }?>
              
          </div>
          
          
      </div>
<?php }?>         
    
  </div><!-- #camera_wrap_1 -->
  
</div>

<!------------------------------------------------------------------------------------------------------------ /Slider end -->
<?php }else if($action == 'rooms'){?>

<?php 
if(isset($_POST['start'])and($_POST['end'])and($_POST['result'])){
			$start = htmlentities($_POST['start']);
			$end = htmlentities($_POST['end']);
			$result = htmlentities($_POST['result']);
	}else{
		$start = NULL;
		$end = NULL;
		$result = NULL;
	}

?>
<!------------------------------------------------------------------------------------------------------------ /rooms start-->
<form id="formorder" action="?action=addtocart&start=<?php echo $start?>&end=<?php echo $end?>&result=<?php echo $result?>" method="post">

<?php $category = $Db->query("SELECT * FROM tb_category");?>
<div style="margin-top:60px;" class="container"><!--Container start-->

	<div class="row"><!--row start-->

<?php foreach($category as $key => $row){?>  
					<div class="span4"><!--span4 start-->
						<div class="thumb-pad">
                            <div class="thumbnail">
                            <img src="<?php echo $row['category_image']?>" longdesc="<?php echo $row['category_image']?>" title="<?php echo $row['category_details']?>" alt="Alone" />
                           
                              <div class="caption tooltip-demo">
                                <h3><?php echo $row['category_name']?></h3>
                                <p><?php echo $row['category_details']?></p>
                                
                                <p>
                                <?php if(!$fgmembersite->CheckLogin()){?> 
           
     		<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Sign-in your account or Sign-up to create reservations thank you!"><i class="icon-calendar"></i> Book now</a> 	
           
                                <?php }else{?>
								<div class="tooltip-demo progress progress-striped active">
                                	<?php $Db->where('category_id',$row['category_id']);
										  $room = $Db->get('tb_rooms')
									?>
                                    
                                    <?php if($result == true){?>
                                    <div class="bar thumbnail" style="width: 100%;">
                                    <?php foreach($room as $key => $row){?>
                                    
                           <?php if($row['status'] == 'Available'){$disabled = "";}else{$disabled = 'disabled="disabled"';}?>
   	<a data-toggle="tooltip" data-placement="top" title="Click to select Room: #<?php echo $row['name']?> / Status: <?php echo $row['status']?>"> 				
                    <input <?php echo $disabled;?> name="selector[]" class="validate[minCheckbox[1]] checkbox" type="checkbox" value="<?php echo $row['roomID']?>" id="check" />
                                    <input name="price[]" type="hidden" value="<?php echo $row['price']?>" />
                                    </a>
                                    
                                    
                                    <?php }?>
                                    </div>
                                    <?php }else{}?>
                                    
                                </div>
                                <?php }?>
                                <a href="#" class="btn"><i class="icon-book"></i> More Details</a>
                           		</p>
                                
                                
                              </div>
                          </div>
                                                       
						</div>
					</div><!--span4 end-->
                          
                    
<?php }?>                   
					
	</div><!--row end-->	

<?php if($fgmembersite->CheckLogin()){?>

 <script>
		$(document).ready(function(e) {
			$('#element').popover('show')			
			
        });
	</script>

<div style="margin-top:125px;" class="navbar-fixed-top"> 
	<div class="container">  
     				<div class="row">
                    	
                      <div style="margin-right:-130px;" class="pull-right">
                            <div class="thumbnail">	
                            
                            <?php if($result == true){?>	
                            <button class="btn btn-success" id="element" type="submit" name="order" data-toggle="popover" data-placement="bottom" data-content='Arrival: <?php echo $start?> / Departure: <?php echo $end?> / Days no. <?php echo sprintf('%.1f',$result)?>' title="Reservation Details"><i class="icon-shopping-cart"></i> AddtoCart</button>
                            <?php }else{?>
                            
                            <a href="#book" class="btn btn-primary" data-toggle="modal"><i class="icon-calendar"></i> Book now</a>
                            
                            <?php }?>
							</div>
                            
                      </div>
                    </div>
    </div>                		
</div>

<?php }?>

</div><!--Container end-->

</form>
<!------------------------------------------------------------------------------------------------------------- /rooms end -->

<?php }else if($action == $cart){?>
<!------------------------------------------------------------------------------------------------------------- /cart -->
<?php 
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL('./');
    exit;
}
if(isset($_GET['statusid'])){				
$statusid = $_GET['statusid'];
$sid = $fgmembersite->Sanitize($statusid);		
}

class calc
{
	public $total;
	
	public function add($value)
	{
		$this->total += $value; 
	}
	public function getTotal()
	{
		return 	$this->getTotal();
	}
}

$getTotal = $Db->query("SELECT * FROM tb_reservation,tb_status where tb_status.status_id = $statusid and tb_reservation.id_user = $id_user and tb_reservation.status_id = tb_status.status_id");

foreach($getTotal as $key => $row)
{
	
}

?>




    
<form action="" method="POST" id="formID" > 
<div style="margin-top:60px;" class="container"><!--Container start-->

	<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
	<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn </div>

	<div class="pagination">
      <ul> 
      	<?php if($sid == 1){?>
        <li class="active"><a href='?action=<?php echo $cart;?>&statusid=1'>Pending</a></li>
        <li><a href='?action=<?php echo $cart;?>&statusid=2'>Confirm</a></li>
        <li><a class="alert-error" href=''>PRE-PAYMENT 10% :</a></li>
        <li><a class="alert-error" href=''>TOTAL :</a></li>
        <?php }else if($sid == 2){?>
        <li><a href='?action=<?php echo $cart;?>&statusid=1'>Pending</a></li>
        <li class="active"><a href='?action=<?php echo $cart;?>&statusid=2'>Confirm</a></li>
         <?php }else{?>
        	<?php  $fgmembersite->RedirectToURL('?action='.$cart.'&statusid=1');?>
        <?php }?>
      </ul>
    </div>

<table class="table table-hover table-bordered" id="example">
  <thead>
    <tr>
      <th><div align="center">Confirmation Code</div></th>
      <th><div align="center">Room no.</div></th>
      <th><div align="center">Payable</div></th>
      <th><div align="center">Arrival</div></th>
      <th><div align="center">Departure</div></th>
      <th><div align="center">Status</div></th>
      <th><div align="center">Actions</div></th>
    </tr>
  </thead>  
  <tbody>
<?php 

$orders = $Db->query("SELECT * FROM tb_reservation,tb_status where tb_status.status_id = $statusid and tb_reservation.id_user = $id_user and tb_reservation.status_id = tb_status.status_id");

?>



<?php foreach($orders as $key => $row){
	$id = $row['reservation_id'];
	?>    
  
    <tr style="font-size:11px" class="del<?php echo $id;?>">
      <td><div align="center"><?php echo $row['confirmation']?></div></td>
      <td><div align="center"><?php echo $row['roomID']?></div></td>
      <td><div align="center"><?php echo sprintf("%.2f",$row['payable'])?></div></td>
      <td>
      <div align="center">
      <?php echo $row['arrival']; ?>
      </div>
      </td>
      <td>
      <div align="center">
      <?php echo $row['departure'];?>
      </div>
      <input type="hidden" name="result" id="result" />
      </td>
      <td><div align="center"><?php echo $row['status_name']?></div></td>
      <td width="40px;">
      <?php if($row['status_id'] == 1){?>
      	<div align="center" class="tooltip-demo">
<a id="<?php echo $id; ?>" data-toggle="tooltip" data-placement="top" title="Click to delete item" class="btn btn-danger"><i class="icon-trash"></i></a>
		</div>
      <?php }else{?> 
      	<div align="center" class="tooltip-demo">  
<a href="#" data-toggle="tooltip" data-placement="top" title="Click to update or to cancel reservations" class="btn btn-info"><i class="icon-edit"></i></a>
		</div>
      <?php }?>
      </td>
    </tr>  
    
<?php }?>    
  </tbody> 
</table>

</div>


<?php if($statusid==1){?>
<div style="margin-top:10px;" class="container">
    
	<div class="pull-right tooltip-demo">
    <a data-toggle="tooltip" data-placement="right" title="Click to confirm all reservation">
    <button class="btn btn-primary" name="Submit" type="submit"><i class="icon-check"></i> Pay Orders</button>
    </a>
    </div>   
    
</div>
<?php }?>


</form> 
<!------------------------------------------------------------------------------------------------------------- /cart end -->
<?php }else if($action == 'location'){?>
<!-------------------------------------------------------------------------------------------------------------- /category -->
<div style="margin-top:60px;" class="container"><!--Container start-->

<div class="thumbnail">
<iframe width="930" height="505" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=fil&amp;geocode=&amp;q=Tagum+City+city+hall&amp;aq=&amp;sll=7.448212,125.809424&amp;sspn=0.385361,0.676346&amp;ie=UTF8&amp;hq=Tagum+City+city+hall&amp;t=m&amp;ll=7.447752,125.804057&amp;spn=0.006383,0.012542&amp;z=17&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=fil&amp;geocode=&amp;q=Tagum+City+city+hall&amp;aq=&amp;sll=7.448212,125.809424&amp;sspn=0.385361,0.676346&amp;ie=UTF8&amp;hq=Tagum+City+city+hall&amp;t=m&amp;ll=7.447752,125.804057&amp;spn=0.006383,0.012542&amp;z=17&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
</div>

</div>
<!----------------------------------------------------------------------------------------------------------- /category end -->
<!----------------------------------------------------------------------------------------------------------- /logout start -->
<?php }else if($action == 'message'){?>
	<?php 
    if(!$fgmembersite->CheckLogin())
    {
        $fgmembersite->RedirectToURL('./');
        exit;
    }
    ?>
<div style="margin-top:60px;" class="container">

		<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
        </div>
        
    <div class="pagination">
      <ul> 
        <li class="active"><a href=''>Send</a></li>
        <li><a href=''>Draft</a></li>
      </ul>
    </div>

<table  class="table table-hover table-bordered" id="example">
  <thead>
    <tr>
      <th><i class="icon-signal"></i> Message no.</th>
      <th><i class="icon-user"></i> Sender</th>
      <th><i class="icon-envelope"></i> Message</th>
      <th><i class="icon-calendar"></i> Date</th>
      <th><i class="icon-time"></i> Time</th>
      <th> Status</th>
      <th><i class="icon-tasks"></i> Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
$Db->where('id_user',$id_user);
$message = $Db->get('tb_message');
foreach($message as $key => $row){
	$id = $row['message_id'];
?> 

    <tr style="font-size:11px;" align="center" class="del<?php echo $id?>">
      <td><?php echo $id;?></td>
      <td> 
	  <?php $ids = $row['sender_id'];
	  		$Db->where('id_user',$ids);
			$sender = $Db->get('tb_guest');
	  		foreach($sender as $key => $rows)
			{
			echo $rows['name'];	
			}
	  ?>  
      </td>
      <td><?php echo $row['message'];?></td>
      <td></td>
      <td></td> 
      <td><?php switch($row['message_status']){
		  
				case '1':
				echo 'Unread';
				break;
				
				case '2':
				echo 'Read';
				break;
				
				default:
		  
		  }?></td>
      <td width="90px;"><div align="center" class="tooltip-demo">
      		  	<a href="" data-toggle="tooltip" data-placement="top" title="Click to reply" class="btn"><i class="icon-envelope"></i></a>
      			<a id="<?php echo $id;?>" data-toggle="tooltip" data-placement="top" title="Click to delete message" class="btn btn-warning"><i class="icon-trash"></i></a>
      </div></td>
    </tr>
<?php }?>    
  </tbody>
</table>
</div>



<?php }else if($action == 'logout'){?>

	<?php 
    $fgmembersite->LogOut();
    $fgmembersite->RedirectToURL('./');
    ?>
<?php }else if($action == 'addtocart'){?>  

	<?php if(isset($_POST['order'])){
	
			$start = htmlentities($_GET['start']);
			$end = htmlentities($_GET['end']);
			$result = htmlentities($_GET['result']);
			$id = $_POST['selector'];
			
	$fgmembersite->addtocart($id,$start,$end,$id_user,$result);
	
	}?> 
<?php }else{?>    
        
  	 <?php $fgmembersite->RedirectToURL('./');?>

<?php }?>


<!----------------------------------------------------------------------------------------------------------- /logout end -->
<!-------------------------------------------------------------------------------------------------------- /counter start -->
<div style="margin-top:20px;" class="container"><!--container counter-->

    <div style="margin-left:235px;">
    	
    	<div id="counter"></div>	
    
    </div>
     			

</div><!--container counter end-->
<!---------------------------------------------------------------------------------------------------------- /counter end -->
<!--------------------------------------------------------------------------------------------------------- /footer start -->
 <footer>
  	<center>&copy; Kingsfield Express Inn, All right reserved 2014.</center>
 </footer>
<!----------------------------------------------------------------------------------------------------------- /footer end -->

</body>

	
	<link href="fullsize/fullsize.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="fullsize/jquery.fullsize.minified.js"></script>
    <script language="javascript" type="text/javascript">
    $(function(){
                    $("div.thumbnail img").fullsize();
                });
    </script>
    
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>
    
    <script src="js/prettify.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
    
    <script src="js/application.js"></script>
   
   	<link rel="stylesheet" href="css/demo.css" type="text/css" media="all">
   	<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
    
    <script src="js/jquery.cookie.js"></script>
    <script src="js/jquery.mobile.customized.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script> 
    <script src="js/camera.min.js"></script>
    
    <script>
		jQuery(function(){
		  
		  jQuery('#slider').camera({
			thumbnails: true
		  });
	
		});
  	</script>  
    
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
 	<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script>
		jQuery(document).ready(function(){
			jQuery("#formID").validationEngine('attach', {promptPosition : "bottomRight", autoPositionUpdate : true});
			jQuery("#cancelform").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			jQuery("#register").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
			jQuery("#resetform").validationEngine('attach', {promptPosition : "topRight", autoPositionUpdate : true});
		});
		
	</script>
    
    
</html>

<!------------------------------------------------------------------------------------------------------------- /Modal -->

<div id="book" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Check for availability</h3>
  </div>
  <div class="modal-body">

<form id="bookform" class="form-horizontal" action="?action=rooms" method="POST">

  <div class="control-group">
    <label class="control-label" for="inputEmail">Arrival</label>
    <div class="controls">
      <input name="start" type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" id="sd" value="" maxlength="10" readonly="readonly" />
    </div>  
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Departure</label>
    <div class="controls">
      <input name="end" type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" id="ed" value="" maxlength="10" readonly="readonly" />
    </div>
  </div>
  <input type="hidden" name="result" id="result" />
  <div class="control-group">
    <div class="controls">
     <button class="btn btn-success" type="submit" onclick="setDifference(this.form);" name="Submit"><i class="icon-ok"></i> Submit</button>
     <a href="#" data-dismiss="modal" aria-hidden="true" class="btn"><i class="icon-remove"></i> Close</a>
    </div>
  </div>
  
  
  </div>
 
  
</form>  
  <div class="modal-footer">
       
  </div>
   
</div>



<!------------------------------------------------------------------------------------------------------------- /Modal end -->
<!--------------------------------------------------------------------------------------------------- /modal register start-->
<?PHP
require_once("./include/register_config.php");

if(isset($_POST['submitted']))
{
   if($register->RegisterUser())
   {
		echo '<script>'.
		"$(document).ready(function(e) {
        $('#thanks').modal('show')
		$('#thanks').on('hide', function () {
  		window.location='./';
			}) 
        });".'</script>';
   }
}

?>

<script src="js/modal.js"></script>

<!-- Modal -->
<div id="registermodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Registration Form</h3>
  </div>
  
  		
        
  	<div class="modal-body">
    
    	<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
            <input type='hidden' id='regerr' value='<?php echo $register->GetErrorMessage(); ?>'/>
            <span class='text-reg'><?php echo $register->GetErrorMessage(); ?></span>
        </div>

        
        <form name="clock" class="form-horizontal" id='register' action='<?php echo $register->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
        <input type='hidden' name='submitted' id='submitted' value='1'/>
        
        <input type='text' id="spmhidip" name='<?php echo $register->GetSpamTrapInputName(); ?>' />
       
          <div class="control-group">
            <label class="control-label" for="inputEmail">Fullname</label>
            <div class="controls">
           <input type='text' class="validate[required] text-input"  name='name' id='name' value='<?php echo $register->SafeDisplay('name') ?>' />
           <input  class="form-control" id="trans" type="hidden"  name="face" value="">
            </div>
          </div>
          
       
          <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
           <input type='text' class="validate[required,custom[email]] text-input" name='email' value='<?php echo $register->SafeDisplay('email') ?>'/>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="inputEmail">Username</label>
            <div class="controls">
           <input type='text' class="validate[required,custom[onlyLetterNumber],maxSize[20]] text-input" name='username' value='<?php echo $register->SafeDisplay('username') ?>' />
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="inputEmail">Cell no.</label>
            <div class="controls">
           <input type='text' class="validate[required,minSize[11]] text-input" name="phone" value="<?php echo $register->SafeDisplay('phone') ?>"/>
            </div>
          </div> 
          	         
          <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                <noscript>
           <input type='password' name='password' id='password' maxlength="50" value="" />
                </noscript>  
            </div>
          </div> 
          
          <div class="control-group">
            <div class="controls">
            	
              <label class="checkbox">
       <input style="margin-top:1px;" name="agree2" id="agree2"  type="checkbox" class="validate[required] checkbox"><span style="font-size:10px;"> I agree & accept <a href="#myModal" data-toggle="modal">terms & conditions</a></span>
              </label>
              	
            </div>
          </div>
          
  	
 	</div> <!--Modal Body end--> 
    
                 
		  <div class="modal-footer">
          <button type="submit" name="Submit" class="btn btn-success"><i class="icon-check"></i> Sign up</button>
          <button class="btn" id="closereg" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
          </div>
          
          </form>
  
</div>

<!----------------------------------------------------------------------------------------------------- /modal register end-->
<!----------------------------------------------------------------------------------------------------- /modal cancel start-->
<?php 
require_once("./include/cancel_config.php");

if(isset($_POST['confirmcancel']))
{
   if($cancel->Cancel())
   {
        echo '<script>'.
		"$(document).ready(function(e) {
         $('#cancelmodal').modal('show')
		 $('#cancelmodal').on('hide', function () {
  		 window.location='./';
			}) 
         });".'</script>';
   }
}

?>

<div id="cancel" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Cancelation Form</h3>
  </div>
  <div class="modal-body">
  		<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
            <span class='text-reg'><?php echo $cancel->GetErrorMessage(); ?></span>
        </div>
    	
        <form method="POST" id="cancelform" class="form-horizontal" action="<?php echo $cancel->GetSelfScript(); ?>">
        	<input type="hidden" id="canlog" value="<?php echo $cancel->GetErrorMessage(); ?>" />
        	<input type='hidden' name='confirmcancel' id='submitted' value='1'/>
          <div class="control-group">
            <label class="control-label" for="inputEmail">Confirmation Code</label>
            <div class="controls">
    <input class="validate[required] text-input" name="confirmcode" type="text" value="<?php echo $cancel->SafeDisplay('confirmcode') ?>">
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="inputEmail">Username</label>
            <div class="controls">
    <input class="validate[required] text-input" name="cusername" type="text" value="<?php echo $cancel->SafeDisplay('cusername') ?>">
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
              <input class="validate[required] text-input" name="password" type="password">
            </div>
          </div>
          
           <div class="control-group">
            <div class="controls">
              <label class="checkbox">
       <input style="margin-top:1px;" name="agree" id="agree" type="checkbox" class="validate[required] checkbox"><span style="font-size:10px;"> I agree & accept <a href="#myModal" data-toggle="modal">terms & conditions</a></span>
              </label>
              <button type="submit" name="Submit" class="btn btn-success"><i class="icon-remove-circle"></i> Cancel</button>
            </div>
          </div>
          
		</form>
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>
<!------------------------------------------------------------------------------------------------------- /modal cancel end-->
<!------------------------------------------------------------------------------------------------------ /modal reset start-->

<?PHP
require_once("./include/reset_config.php");;

$emailsent = false;
if(isset($_POST['resetpassword']))
{
   if($reset->EmailResetPasswordLink())
   {
        echo '<script>'.
		"$(document).ready(function(e) {
         $('#resetmodal').modal('show')
		 $('#resetmodal').on('hide', function () {
  		 window.location='./';
			}) 
         });".'</script>';

   }
}

?>


<div id="reset" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Reset Password</h3>
  </div>
  <div class="modal-body">
  		<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
            <span class='text-reg'><?php echo $reset->GetErrorMessage(); ?></span>
        </div>

        <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            A link to reset your password will be sent to the email address
        </div>
    	
        <form method="POST" id="resetform" class="form-horizontal" action="<?php echo $reset->GetSelfScript(); ?>">
        	<input type='hidden' id="reserr" value='<?php echo $reset->GetErrorMessage(); ?>'/>
        	<input type='hidden' name='resetpassword' value='1'/>
          <div class="control-group">
            <label class="control-label" for="inputEmail">Your Email Address</label>
            <div class="controls">
            <input class="validate[required,custom[email]] text-input"  type='text' name='email' id='remail' value='<?php echo $reset->SafeDisplay('email') ?>'/>
            </div>
          </div>
          
          
           <div class="control-group">
            <div class="controls">
              <button type="submit" name="Submit" class="btn btn-success"><i class="icon-repeat"></i> Reset password</button>
            </div>
          </div>
          
		</form>
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>
<!-------------------------------------------------------------------------------------------------------- /modal reset end-->
<!---------------------------------------------------------------------------------------------------- /modal success start-->

<div id="cancelmodal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Succesful Cancelation</h3>
  </div>
  <div class="modal-body">
  		<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
        </div>
    <p>Your cancelation was successful please check your email thank you</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>

<div id="loginerrormodal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Error Logging in</h3>
  </div>
  <div class="modal-body">
  		<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
        </div>
    	<p>	
        	<div class="alert alert-error fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    			Error logging in. The username or password does not match
    		</div>
        </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>

<div id="thanks" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Thanks for registering!</h3>
  </div>
  <div class="modal-body">
  		<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
        </div>
    	<p>	
        	<div class="alert alert-error fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    			Your confirmation email is on its way. Please click the link in the email to complete the registration.
    		</div>
        </p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>

<!---------------------------------------------------------------------------------------------------- /modal success start-->
<!----------------------------------------------------------------------------------------------------- /modal agreem start-->


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Kingsfield Express Inn Terms & Conditions</h3>
  </div>
  <div class="modal-body">
  
  		<div class="alert alert-info fade in">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<img src="ico/icon.png" width="15px" height="15px" /> Kingsfield Express Inn
        </div>
   
<p>Kingsfield Express Inn Terms & Conditions</p>
    
<p>1.All prices charged to you are VAT and other taxes included. We will provide you with a detailed invoice, so that you know exactly for what items you are paying. We accept most credit cards.</p>
    
<p>2.A cancellation of the event would result in a considerable loss for the hotel, should you need to cancel your reservation, please refer to the following cancellation terms: If you will not attend the day u reserved/booked we will consider it no show, 10% that you pay will be forfeited.</p>

<p>3.It is not permitted to bring food or beverages into the inn, unless you have asked us for our consent. If we agree to you providing your own food the inn accepts no responsibility should you suffer as a result.</p>

<p>4.Our rule is: “You break, you pay”. Consequently, we shall only be liable to you loss or damage to property. Similarly, we shall hold you liable for any loss or damage to our property.</p>

<p>5.If u want to re-schedule your book room, u must re-schedule 2 days before the day you arrive unless we will not entertain you.</p>

<p>Thank you for taking time to read our terms and conditions.
We have tried to keep them as simple and straightforward as possible. You can now confirm your reservation by signing this page below, and returning it to us. Please note that we hold the right to release your reservation if we have not received this agreement, duly signed where indicated. Should you however have any further questions, then please do not hesitate to contact any member of the hotel staff. They will be glad to assist you.
</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div>

<!---------------------------------------------------------------------------------------------------- /modal agree end-->

			<script type='text/javascript'>
			
				var pwdwidget = new PasswordWidget('thepwddiv','password');
				pwdwidget.MakePWDWidget();
			
			</script>
            
            
			 
      