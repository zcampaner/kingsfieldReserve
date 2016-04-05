// JavaScript Document
$(document).ready( function() {
    
    $('.btn-danger').click( function() {
        
        var id = $(this).attr("id");
      
        if(confirm("Are you sure you want to delete this Record?")){
            
        
            $.ajax({
            type: "POST",
            url: "include/delete_order.php",
            data: ({id: id}),
            cache: false,
            success: function(html){
            $(".del"+id).fadeOut('slow'); 
            } 
            }); 
            }else{
            return false;}
        });                
    	});
		
	$('.btn-warning').click( function() {
        
        var id = $(this).attr("id");
      
        if(confirm("Are you sure you want to delete this Record?")){
            
        
            $.ajax({
            type: "POST",
            url: "include/delete_message.php",
            data: ({id: id}),
            cache: false,
            success: function(html){
            $(".del"+id).fadeOut('slow'); 
            } 
            }); 
            }else{
            return false;}
        });              
		
		
				var timerID = null;
		        var timerRunning = false;
		        function stopclock (){
		            if(timerRunning)
		                clearTimeout(timerID);
		            timerRunning = false;
		        }
		        function showtime () {
		            var now = new Date();
		            var hours = now.getHours();
		            var minutes = now.getMinutes();
		            var seconds = now.getSeconds()
		            var timeValue = "" + ((hours >12) ? hours -12 :hours)
		            if (timeValue == "0") timeValue = 12;
		            timeValue += ((minutes < 10) ? ":0" : ":") + minutes
		            timeValue += ((seconds < 10) ? ":0" : ":") + seconds
		            timeValue += (hours >= 12) ? " P.M." : " A.M."
		            document.clock.face.value = timeValue;
		            timerID = setTimeout("showtime()",1000);
		            timerRunning = true;
		        }
		        function startclock() {
		            stopclock();
		            showtime();
		        }

		        window.onload=startclock;