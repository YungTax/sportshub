( function( $ ) {
    "use strict";

    $(document).ready( function() {
    ///////////////////////////////
 
 
      $(document).on("click", ".sportshub_upload_image_button", function (e) {
         e.preventDefault();
         var $button_media = $(this);
    
    
         // Create the media frame.
         var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or upload image',
            library: { // remove these to show all
               type: 'image' // specific mime
            },
            button: {
               text: 'Select'   
            },
            multiple: false  // Set to true to allow multiple files to be selected
         });
         jQuery(this).trigger( 'change' );
         // When an image is selected, run a callback.
         file_frame.on('select', function () {
            // We set multiple to false so only get one image from the uploader
            var attachment = file_frame.state().get('selection').first().toJSON();
            $button_media.siblings('input').val(attachment.url);
            jQuery( $button_media.siblings('input') ).trigger( 'change' );
    
         });
    
         // Finally, open the modal
         file_frame.open();
      });


    //////////////////////////////
    } ); // End doc ready  ///////
    
} )( jQuery );