$(document).ready(function() {
$('form').submit(function(){

var flag=false;
$('input.totallynotconspicuous').each(function(index, value) {
  if ($(this).val().length != 0) {
             flag=true;
             
       } 
}); 
if(flag==true)
{
	return false;
}
        
});
});