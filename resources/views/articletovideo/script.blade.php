<script type="text/javascript">

$(document).ready(function(e) {
	$(document).on("click", ".genrator a#add_paragraph" , function(event) {
        ttsyt.addParagraph();
    });
	
	var ttsyt = {
		 addParagraph : function (){
		 	html = $(".genrator #paragraph_html").html();
		 	count = $(".genrator .paragraph_html").length;
		 	html = html.replace(/{=count=}/g, count);
		 	$(".genrator .box-body").append(html);

		}
	}
});
</script>