$(document).ready(function(){
    $('.post').click(function(e){
        
        e.preventDefault();
        
        // Extract form data
        var formData = $(this).attr('formData');
        var cmtid = $(this).closest('.comment-section').find('.cmtid').val();
        // alert(cmtid);
        var cmt = $(this).closest('.comment-section').find('.cmt').val();
        var text = $(this).closest('.comment-section').find('textarea.textarea').val();
        // $(".post").val(formData);
        // Send data to server using AJAX
        var url = './table.php';
        $.ajax({
            type: 'POST',
            url: 'http://localhost/jilanumatiya/Projecttask/Admin/user/table.php',
            data: {action:url, formData:formData, cmtid:cmtid , cmt:cmt , comment:text },
            success: function(msg){
                //  console.log(msg);
                // Update UI with response from server
                $(".popup-data-loadin").append(msg);
                
                $('textarea.textarea').val('');
            }
            
        });
    });
});
