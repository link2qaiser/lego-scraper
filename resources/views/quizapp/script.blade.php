<script type="text/javascript">
$(document).ready(function(){

	$('#title').on('keyup', function() {
		$(this).css('border', '1px solid red');
		$('#slug').val($(this).val().seoURL({'transliterate': false, 'lowercase': true}));
	});
});
</script>