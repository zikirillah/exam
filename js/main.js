// JavaScript Document
$(document).ready(function(e) {
setInterval(function(){
 $.get('php/function.php', { mode: 'online'}, function(data){
		//$('.content').html(data);																		
       });
 },1000);
});
