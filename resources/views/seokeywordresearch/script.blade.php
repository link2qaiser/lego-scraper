<script type="text/javascript">

$(document).ready(function(e) {
	$(document).on("click", ".star_keyword" , function(event) {
        var id  = $(this).attr("data-id");
        var keyword  = $(this).attr("data-keyword");
  		if ($(this).hasClass("stared")) {
		  action = 1;
		}else {
			action = 0;
		}
		var btn = this;
  		$.ajax({
  	    	type: "GET",
          	cache: false,
  	        url:$(this).attr("data-url")+"/"+id+"?keyword="+keyword+"&action="+action,
  	        dataType: "json",
  	        headers    :    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  	        success:function(res){
  	        	if(res.flag == true){
  	        		toastr["success"](res.msg, "Completed!");
  	        	}else {
                	toastr["success"](res.msg, "Warning!");
  	        	}
  	        	$(btn).toggleClass('stared');
  	        }
        });
    });

});
</script>