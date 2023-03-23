(function ($) {
    "use strict";
   
    // Create toaster using sweetalert2
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
      
    // Send ajax request to add reaction
    $('.reaction-icon').click(function(){
        let react_id    = $(this).attr('data-react-id');
        let user_id     = examReactionButton.user_id;
        let post_id     = examReactionButton.post_id;
        var data = {
            'action'        : 'exam_reaction_button_add',
            'react_id'      : react_id,
            'user_id'       : user_id,
            'post_id'       : post_id,
            '_wpnonce'      : examReactionButton.nonce
        };
        ajax_handler(data);
    });

    // Delete Reaction for a specific page
    $('.delete_reaction').click(function(){
        let user_id     = examReactionButton.user_id;
        let post_id     = examReactionButton.post_id;
        var data = {
            'action'        : 'exam_reaction_button_delete',
            'user_id'       : user_id,
            'post_id'       : post_id,
            '_wpnonce'      : examReactionButton.nonce
        };
        ajax_handler(data);
    });

    // Handle ajax request 
    function ajax_handler(data) {
        $.ajax({
            url: examReactionButton.ajaxurl,
            data: data,
            type: 'POST',
            success: function (data) {
                console.log(data);
                Toast.fire({
                    icon: 'success',
                    title: data.data.message
                }) 
            }
        });
    }
}(jQuery));