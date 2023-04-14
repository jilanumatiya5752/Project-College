$(document).ready(function(){
    $('.post').click(function(e){
        
        e.preventDefault();
        
        // Extract form data
        var formData = $(this).attr('formData');
        var cmtid = $(this).closest('.comment-section').find('.cmtid').val();
        // alert(cmtid);
        var cmt = $(this).closest('.comment-section').find('.cmt').val();
        // alert(cmt);
        var text = $(this).closest('.comment-section').find('textarea.textarea').val();
        // alert(text);
        // $(".post").val(formData);
        // Send data to server using AJAX
        var url = './tabledt.php';
        $.ajax({
            type: 'POST',
            url: 'http://localhost/jilanumatiya/Projecttask/Admin/admin/tabledt.php',
            data: {action:url, formData:formData, cmtid:cmtid , cmt:cmt , comment:text },
            success: function(msg){
                //  alert(msg);
                // Update UI with response from server
                // console.log(msg);
                $(".popup-data-loadin").append(msg);
                $('textarea.textarea').val('');
            }
            
        });
    });
});
