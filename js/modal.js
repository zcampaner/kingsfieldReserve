// JavaScript Document
		
$(document).ready(function(e) {
	
	var regerr = $('#regerr').val()
	var logerr = $('#log').val()
	var canerr = $('#canlog').val()
	var reserr = $('#reserr').val()
	var remail = $('#remail').val()
	
			
			if(regerr == 'This email is already registered'){
            $('#registermodal').modal('show')
			$('#registermodal').on('hide', function () {
  			window.location='./'
			}) 	
			}
			else if(regerr == 'This UserName is already used. Please try another username')
			{
			$('#registermodal').modal('show')
			$('#registermodal').on('hide', function () {
  			window.location='./'
			}) 	
			}
			else
			{
			$('#registermodal').modal('hide')
			}
<!---------------------------------------------------------------------------------------------------------------------------->		
			if(logerr == 'Error logging in. The username or password does not match'){
        	$('#loginerrormodal').modal('show');
			$('#loginerrormodal').on('hide', function () {
  			window.location='./'
			})
			}
			else
			{
			$('#loginerrormodal').modal('hide'); 	
			}
<!---------------------------------------------------------------------------------------------------------------------------->
			if(canerr == 'The username,password or confirmation code does not match'){
			$('#cancel').modal('show');
			$('#cancel').on('hide', function () {
  			window.location='./'
			})
			}
			else if(canerr == 'Please check your confirmation code')
			{
			$('#cancel').modal('show');
			$('#cancel').on('hide', function () {
  			window.location='./'
			})
			}
			else
			{ 	
			$('#cancel').modal('hide');
			}
<!---------------------------------------------------------------------------------------------------------------------------->			
			if(reserr == 'There is no user with email: '+remail){
			$('#reset').modal('show');
			$('#reset').on('hide', function () {
  			window.location='./'
			})
			}
			else
			{ 	
			$('#reset').modal('hide');
			}
});

