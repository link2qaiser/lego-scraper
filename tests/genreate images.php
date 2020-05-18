<!DOCTYPE html>
<html>
<head>
	<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
	<style type="text/css">
	
.imageHolder {
    position: relative;
	width: 650px;
  
}
.imageHolder .caption {
    position: absolute;
    width: 100%;
    height: 50px;
    bottom: 0px;
    left: 0px;
    color: #ffffff;
    background: green;
	text-align:center;
	font-weight:bold;

}
	</style>
	</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<input type="file" multiple id="gallery-photo-add"> <input type="button" onclick="createImage();" value="Genrate">
<br/>
<div class="left" style="width: 100%; position: absolute; top: -10000px;"></div> 
<div id="right" style="width: 100%;">
</div>

</body>

<script type="text/javascript">
function createImage(){
	i = 1;
	$(".left div").each(function(index, el) {
		html2canvas(document.querySelector(".leftrow"+i)).then(canvas => {
	    	document.getElementById("right").appendChild(canvas);
	    	$("#right").append("<br/>");
		});
		i++;
	});
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$(function() {
    // Multiple images preview in browser
    var k = 1;
    var realWith = 0;
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {                	
                    //$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                   /* var image = new Image();
                    image.src = event.target.result;*/
                    var image = new Image();
				    image.src = event.target.result;
				    
				    
				    image.onload = function(realWith) {
				        realWith = this.width;
				        console.log(realWith); 
	                    html = '<div class="leftrow'+k+' imageHolder" style="width:'+realWith+'px;">'
	                    html += '<img src="'+event.target.result+'">';
	                    html +='<h1 class="caption" >Image '+k+'</h1></div>';
	                    $(placeToInsertImagePreview).append(html);
	                    k++;
				    };
				    
                }
                reader.readAsDataURL(input.files[i]);
            }
        }

    };
    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.left');
    });
});
</script>
</html>