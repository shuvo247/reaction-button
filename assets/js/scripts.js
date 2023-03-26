(function ($) {
    "use strict";

    // get user_id and post_id from global constant
    let user_id     = examReactionButton.user_id;
    let post_id     = examReactionButton.post_id;
    // console.log(user_id);
    // Check authenticated user 
    function check_auth() {
        if( user_id != 0 ) {
            return true;
        }else{
            // Fire toaster for message
            Toast.fire({
                icon: 'error',
                title: 'Unauthorized Access',
            });
            return false;
        }
    }

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
    $(document).on('click','.reaction-icon.inactive',function(){
        if( check_auth()  ) {
            let react_id    = $(this).attr('data-react-id');
            var data = {
                'action'        : 'exam_reaction_button_add',
                'react_id'      : react_id,
                'user_id'       : user_id,
                'post_id'       : post_id,
                'type'          : 'add',
                '_wpnonce'      : examReactionButton.nonce
            };
            ajax_handler(data,this);
        }

    });

    // Delete Reaction for a specific page or post
    $(document).on('click','.reaction-icon.active',function(){
        if( check_auth() ) {
            let react_id    = $(this).attr('data-react-id');
            var data = {
                'action'        : 'exam_reaction_button_delete',
                'user_id'       : user_id,
                'post_id'       : post_id,
                'react_id'      : react_id,
                'type'          : 'remove',
                '_wpnonce'      : examReactionButton.nonce
            };
            ajax_handler(data,this);
        }
    });

    // Handle ajax request 
    function ajax_handler(__data,__this) {
        $.ajax({
            url: examReactionButton.ajaxurl,
            data: __data,
            type: 'POST',
            success: function (data) {
                // update count number
                let count_react_obj = data.data.count_react;
                for ( let key in count_react_obj ) {
                    $('.reaction-icon[data-react-id="'+key+'"]').children('span').text( count_react_obj[key] );
                }

                $(__this).children('span').text(data.data.count);
                // update active/inactive class based on action
                if( __data.type == 'add' ) {
                    $('.reaction-icon').removeClass('active').addClass('inactive');
                    $(__this).addClass('active').removeClass('inactive');
                }else if( __data.type == 'remove' ) {
                    $('.reaction-icon').addClass('inactive').removeClass('active');
                }

                // Fire toaster for message
                Toast.fire({
                    icon: 'success',
                    title: data.data.message
                }) 
            }
        });
    }

}(jQuery));