$(document).ready(function(){
    $('.popup-buton-er').click(function(e){
        
        e.preventDefault();
        
        // Extract form data
        var save = $(this).attr('save');
        // var status = $(this).find('.status').val();
        // alert(status);
        
        var status = $(this).closest('.selectsection').find('.status').val();
        var userid = $(this).closest('.selectsection').find('.userid').val();
        // alert(userid);
        var url = './save.php';
        $.ajax({
            type: 'POST',
            url: 'http://localhost/jilanumatiya/Projecttask/Admin/user/save.php',
            data: {action:url,save:save, status:status, userid:userid},
            success: function(msg){
                //  console.log(msg);
                // alert(msg);
                // Update UI with response from server
                // $(".popup-data-loadin").append(msg);
                
                // $('textarea.textarea').val('');
            }
            
        });
    });
});
