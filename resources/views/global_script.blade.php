<script type="text/javascript">
/*
*
* CREATED AT 26 JULY 2017
* AUTHER : QAISER
* TWITTER: @LINK2QAISER
*
*/
var site_url = "{{url('/')}}";
$(document).ready(function() {
    $('.list thead input[type="checkbox"]').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.list tbody input[type="checkbox"]').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.list tbody input[type="checkbox"]').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    $('.singcheck input[type="checkbox"]').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.mulcheck input[type="checkbox"]').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.mulcheck input[type="checkbox"]').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    $(document).on("click", ".delete" , function(event) {
        var remvove  = $(this).attr("data-remove");
  		  addWait(this,'Deleting..');
  		  $.ajax({
  	    	type: "GET",
          	cache: false,
  	        url:$(this).attr("data-url"),
  	        dataType: "json",
  	        headers    :    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  	        success:function(res){
  	        	if(res.flag == true){
  	        		toastr["success"](res.msg, "Completed!");
  	        	}else {
                toastr["success"](res.msg, "Warning!");
  	        	}
              $("."+remvove).remove();
  	          
  	        }
        });
  	 });
    
    /*
    *
    *FORM VALIDATION CODE
    *
    */
  	$(document).on("submit", "form.validate" , function(event) {
  		res = validateForm("form.validate");
  		if(res.flag == false){
        res.dom.focus().scrollTop();
  		}
  		return res.flag; //SUBMIT FUNCTION OR NOT
      //console.log(res);
      //return false;

  	});
    /*
    *
    *SEARCH FILTER
    *
    */
    $(document).on("submit", "form.searchfilter" , function(event) {
        var form = $( this ).serialize();
        addWait("form.searchfilter button[type=submit]","searching...");
        $.ajax({
            type: "GET",
            cache: false,
            url:$(this).attr("action")+"?"+form,
            //dataType: "json",
            headers    :    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(res){
              removeWait("form.searchfilter button[type=submit]",'<i class="fa fa-search"></i> Search');
              if(res != "")
                $("#data_list").html(res);
            }
        });
        return false;
    });
    /*
    *
    *MAKE AJAX CALL
    *
    */
    $(document).on("submit", "form.make_ajax" , function(event) {
        var form = $( this ).serialize();
        var btn = "form.make_ajax button[type=submit]";
        var btntxt = $(btn).html();
        res = validateForm("form.make_ajax");
        if(res.flag == false){res.dom.focus().scrollTop(); return false;}
        type = $(this).attr("method");

        addWait(btn,"working...");
        $.ajax({
            type: $(this).attr("method"),
            cache: false,
            data: form,
            url:$(this).attr("action"),
            //url:$(this).attr("action")+"?"+form,
            dataType: "json",
            type: type,
            headers    :    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(res){
              removeWait(btn,btntxt);
              toastr["success"](res.msg, "Completed!");
              if(res.action == 'reload')
                window.location.reload();
            }
        });
        return false;
    });
    
  	
});

function validateForm(dom){
	var $inputs = $(dom+" input[type=text],"+dom+" textarea,"+dom+" select,"+dom+" input[type=password]");
	var res = {};
	res.flag = true;
    $inputs.each(function() {
        
        val = $(this).val();
        req = $(this).attr("required");
        //console.log(req);
        if(val == "" && req == 'required'){
        	if(res.flag == true)
        		res.dom = $(this);
        	res.flag = false;
        	$(this).parent().addClass('has-danger');
        }else {
        	type = $(this).attr('data-type');
        	if (typeof(type) != "undefined"){
        		if(form.validate(type,val) == false){
        			if(res.flag == true)
        				res.dom = $(this);
        			res.flag = false;
        			$(this).parent().addClass('has-danger');
        		}else {
        			$(this).parent().removeClass('has-danger');
        		}
        	}else{
            $(this).parent().removeClass('has-danger');
          }
        }
    });
    return res; 
}
var form = {
	val : "",
  type : "",
	validate: function(type,val){
        this.val = val;
        this.type = type;
        switch (this.type) {
            case "email":
                return this.isEmail();
                break;
            case "integer":
                return this.isInteger();
                break;
            case "url":
                return this.isUrl();
                break;
            
        }
    },
    isEmail: function(){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(this.val);
    },
    isInteger: function(){
        return /^\d+$/.test(this.val);
    },
    isUrl: function(){
        var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
        return regexp.test(this.val);
    }
}
function loadModal(url,param)	{
	$("#data_modal .modal-content").html('<p style="text-align: center;"><i class="fa fa-spinner fa-spin"></i>  Please wait loading...</p>');
	if (typeof(param)==='undefined') param = null;
	url	=	site_url+"/modal/"+url+"?param="+param;
  console.log(url);
	$.ajax({
		  type: "GET",
		  cache: false,
		  url:url,
		  //dataType: "json",
		  success:function(result){
			  $("#data_modal .modal-content").html(result);
		  }
	});
}


function addWait(dom,lable)	{
	$(dom).attr("disabled","disabled");
	string	=	'<i class="fa fa-spinner fa-spin"></i> '+lable;
	$(dom).html(string);
}
function removeWait(dom,lable)	{
	$(dom).removeAttr("disabled");
	$(dom).html(lable);
}
toastr.options = {
  "closeButton": true,
  "debug": false,
  "positionClass": "toast-top-right",
  "onclick": null,
  "showDuration": "1000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.upload-image-preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('.select2').select2({
  theme:"bootstrap",
  allowClear:true,
  dropdownParent: $('#data_modal')
});
$(".upload-image").change(function() {
  readURL(this);
});
$('.select2-tags').on('change', function(e){
    tags = $(this).val();
    keyword_id = $(this).attr('data-id');
    $(this).closest('tr').css("background-color","#bdbcbc");
    $.ajax({
        type: 'POST',
        cache: false,
        data: {'tags':tags},
        url:site_url+'/seooutreach/keyword/update-tags?keyword_id='+keyword_id,
        //url:$(this).attr("action")+"?"+form,
        dataType: "json",
        
        headers    :    {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(res){
          
        }
    });
});
/*$('.select2-tags').on('select2:change', function (e) {
    var data = e.params.data;
    console.log(data);
    
});*/
/*
EDIT THE NOTE / DESCRIPTION 
*/
$(document).on("click", "#edit_note", function(event) {
    var prehtml = $(this).closest('.des_box').find('#des_text').text();
    var textarea = '<textarea style= "width: 100%;">' + prehtml + '</textarea>';
    $(this).closest('.des_box').find('#des_text').html(textarea);
    $(this).closest('.des_box').find('#save_note').show();
    $(this).closest('.des_box').find('#cancel_note').show();
    $(this).closest('.des_box').find('#edit_note').hide();

});
$(document).on("click", "#save_note", function(event) {
    var selector = $(this);

    selector.find('a').text('saving....');
    var prehtml = selector.closest('.des_box').find('textarea').val();
    var action = selector.find('a').attr('data-action');
    selector.removeAttr('id');
    $.ajax({
        type: "POST",
        cache: false,
        url: action,
        dataType: "json",
        data: { 'note': prehtml },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(res) {
            console.log(res);
            selector.attr('id', 'save_note');
            selector.closest('.des_box').find('#des_text').html(prehtml);
            selector.closest('.des_box').find('#save_note').hide();
            selector.closest('.des_box').find('#cancel_note').hide();
            selector.closest('.des_box').find('#edit_note').show();
            //selector.closest('.des_box').find('#edit_by').text('Last Edit: ' + res.data.edit_by);

            selector.find('a').text('save');
            //
        }
    });
});
$(document).on("click", "#cancel_note", function(event) {
    var selector = $(this);

    var prehtml = selector.closest('.des_box').find('textarea').val();
    selector.closest('.des_box').find('#des_text').html(prehtml);
    selector.closest('.des_box').find('#save_note').hide();
    selector.closest('.des_box').find('#cancel_note').hide();
    selector.closest('.des_box').find('#edit_note').show();
});
</script>
@if(session()->has('message'))
<script type="text/javascript">toastr["success"]('{{ session()->get('message') }}',"Completed!" );</script>
@endif
