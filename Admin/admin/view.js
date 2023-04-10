
$(document).ready(function(){

    $(".popup-buton").click(function() {
        var popupId = $(this).attr('data-id');
		$(".popup").val(popupId);
    //  alert(popupId); 
    //     var fname = $("#fname").val();  
    // var lname = $("#lname").val();  
    $.ajax({  
       type:"GET",  
       url:"popup.php",  
       data: {action: popupId},
       
        success: function(msg){
            $(".popup-data-loadin").html(msg);
        }
    });  
 });
});