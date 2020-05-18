<script type="text/javascript">

$(document).ready(function(e) {
  $(document).on("change", "#type" , function(event) {
    appmanangement.updateHtml($(this).val());
  });
  $(".image-preview").change(function() {
    appmanangement.showImage(this);
  });
  $('.image-preview-multiple').on('change', function() {
        appmanangement.showImageMultiple(this, 'div#m-image-preview');
  });
  var appmanangement = {
    updateHtml : function(val){
      for(i = 1; i <= 3; i++){
        $("#type_"+i).hide();
      }
      $("#type_"+val).show();
    },
    showImage : function(input) {
      dom = $(input).attr("data-target");
    
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $(dom).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    },
    showImageMultiple :function(input, placeToInsertImagePreview) {
      console.log("test");
      if (input.files) {
          var filesAmount = input.files.length;

          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();

              reader.onload = function(event) {
                  $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
              }

              reader.readAsDataURL(input.files[i]);
          }
      }

    }
  };
	

});
</script>