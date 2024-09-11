(function ($) {
   "use strict";

   $(document).ready(function () {
      // Cache the document object for better performance
      var $document = $(document);

      // Check if wp and wp.media are defined
      if (typeof wp === 'undefined' || !wp.media) {
         return;
      }

      // Create the media frame outside the click event
      var file_frame = wp.media.frames.file_frame;
      if (!file_frame) {
         file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or upload image',
            library: {
               type: 'image'
            },
            button: {
               text: 'Select'
            },
            multiple: false
         });

         // Attach the 'select' event handler
         file_frame.on('select', function () {
            var $button_media = $('.sportshub_upload_image_button');
            var attachment = file_frame.state().get('selection').first().toJSON();
            $button_media.siblings('input').val(attachment.url).trigger('change');
         });
      }

      // Event delegation for better performance
      $document.on("click", ".sportshub_upload_image_button", function (e) {
         e.preventDefault();
         // Open the media modal
         file_frame.open();
      });
   });

})(jQuery);
