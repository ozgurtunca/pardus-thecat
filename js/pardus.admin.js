jQuery(document).ready(function ($) {
  var mediaUploader;

  $("#upload-button").on("click", function (e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: "Choose a Profile Picture",
      button: {
        text: "Choose Picture",
      },
      multiple: false,
    });

    mediaUploader.on("select", function () {
      attachment = mediaUploader.state().get("selection").first().toJSON();
      fileName = decodeURIComponent(attachment.filename);

      $("#profile-image").val(attachment.url);
      $("#profile-image-preview").css(
        "background-image",
        "url(" + attachment.url + ")"
      );
      $("#image-file").text("" + fileName + "");
    });
    mediaUploader.open();
  });

  $("#remove-picture").on("click", function (e) {
    e.preventDefault();
    var answer = confirm("Do you really want to remove profile Image ?");
    if (answer == true) {
      $("#profile-image").val("");
      $("#profile-image-preview").css("background-image", "url('')");
      $(".pardus-general-form").submit();
      $("#image-file").text("Please save settings");
    } else {
      console.log("NO");
    }
  });
});
