(function($){
    "use strict"; // Start of use strict
    
    /* ---------------------------------------------
     Scripts ready
     --------------------------------------------- */
    $(document).ready(function() { 
        
        init_mailchimp();
    });
    /* ---------------------------------------------
     Mailchimp
     --------------------------------------------- */
    function init_mailchimp(){
        
        $( 'body' ).on( 'submit', '.mailchimp-form', function ( e ){
            e.preventDefault();
            var $mForm = $(this),
                $button = $mForm.find('.mailchimp-submit'),
                $error = $mForm.find('.mailchimp-error').fadeOut(),
                $success = $mForm.find('.mailchimp-success').fadeOut();
            
            $button.addClass('loading').html($button.data('loading'));
            
            var data = {
                action: 'frontend_mailchimp',
                security : ajax_mailchimp.security,
                email: $mForm.find('input[name=email]').val(),
                list_id: $mForm.find('input[name=list_id]').val(),
                opt_in: $mForm.find('input[name=opt_in]').val()
            };
            
            $.post(ajax_mailchimp.ajaxurl, data, function(response) {
                $button.removeClass('loading').html($button.data('text'));
                
                if(response.error == '1'){
                    $error.html(response.msg).fadeIn();
                }else{
                    $success.fadeIn();
                }
            }, 'json');
        });
    }
})(jQuery); // End of use strict