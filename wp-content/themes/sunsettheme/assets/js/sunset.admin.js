jQuery(document).ready(function ($) {
  // alert("Hello");

  var mediaUploader;

  $("#upload-button").on("click", function (e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    mediaUploader = wp.media.frames.items = wp.media({
      title: "Choose a profile picture",
      button: {
        text: "Choose Picture",
      },
      library: {
        type: "image",
      },
      multiple: false,
    });

    mediaUploader.on('select', function(){
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-picture').val(attachment.url);
    });
    mediaUploader.open();
  });
});


