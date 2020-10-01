(function( $ ) {
    'use strict';
    $(document).ready(function () {

        const data = {
            'action': 'is_last_post',
        }

        $.ajax({
            url: obj_params.ajaxurl,
            data: data,
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                if (obj_params.isPage !== '') {
                    if (response.data.lastPostId  === obj_params.postId) {
                        console.log("-----",'hello world');
                    }
                }
            }
        });
    });

})( jQuery );
