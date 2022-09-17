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

    mediaUploader.on("select", function () {
      attachment = mediaUploader.state().get("selection").first().toJSON();
      $("#profile-picture").val(attachment.url);

      //image preview with background image css
      // $('#profile-picture-preview').css('background-image','url(' + attachment.url + ')');
      //image url replace for preview image
      $("#profile-picture-preview").attr("src", attachment.url)
      // image title 
      // $("#profile-picture-preview").attr("alt", attachment.title)
      // console.log(attachment);
        
    });
    mediaUploader.open();
  });
});
