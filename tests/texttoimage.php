<!DOCTYPE html>
<html>
<head>
<script src="http://code.jquery.com/jquery-2.2.4.min.js" ></script>
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
canvas {
    margin-right: 10px;
    float: left;
}
.left {
    width: 100%; position: absolute; right: 1000000px;
}
.right {
    width: 100%;
}
</style>
</head>
<body>
<input type="file" multiple id="images"> <input type="button" onclick="createImage();" value="Genrate">
<br/>
<div class="left"></div> 
<div id="right">
</div>
</body>
<script type="text/javascript">
function createImage(){
	i = 1;
    $("#right").html("");
	$(".left div").each(function(index, el) {
		html2canvas(document.querySelector(".leftrow"+i)).then(canvas => {
	    	document.getElementById("right").appendChild(canvas);
	    	//$("#right").append("<br/>");
		});
		i++;
	});
}
$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
        var k = 1;
        $(placeToInsertImagePreview).html("");
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var image = new Image();
				    image.src = event.target.result;
				    
				    image.onload = function(realWith) {
				        realWith = this.width;
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
    $('#images').on('change', function() {
        imagesPreview(this, 'div.left');
    });
});
</script>
</html>