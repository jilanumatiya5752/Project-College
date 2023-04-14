$(document).ready(function(){

    $(".popup-buton").click(function() {
        var popupId = $(this).attr('data-id');
		$(".popup").val(popupId);
        
    $.ajax({  
       type:"GET",  
       url:"popupuser.php",  
       data: {action: popupId},
       
        success: function(msg){
            $(".popup-data-loadin").html(msg);
            // $('#cmt').open();
        }
        
    });  
 });
});