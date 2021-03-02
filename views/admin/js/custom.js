$(document).ready(function() {
	var i=1;

	$(document).on("click",".add-more",function() {
    var html="<div class='answer' id='answer_"+i+"' data-id="+i+">";
     html+="<div class='col s12 m10 l10'>";
	 html+="<input type='text' name='answer[]' required value=''>";
	 html+="</div>";
     html+="<div class='col s12 m2 l2'>";
     html+="<a class='remove-more' data-id="+i+">Remove Rows</a>";
     html+="</div>";
     html+="</div>";
     i++;
     $(".append_html").append(html);
   });
     

     $(document).on("click",".remove-more",function() {
    
         var id = $(this).attr('data-id');
      
         $("#answer_"+id+"").remove();
     });



     $("a[rel*=facebox]").click(function() {
			var action = $(this).attr('myAction');
			var id = $(this).attr('myID');
			var location = '<?php echo site_url('extensions/nova_ext_honeypot/Ajax/del_setting/');?>/' + id;
			
			$.facebox(function() {
				$.get(location, function(data) {
					$.facebox(data);
				});
			});
			
			return false;
		});


});