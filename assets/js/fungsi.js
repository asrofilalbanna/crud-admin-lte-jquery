$(document).on("click",".hapus",function() {
	id = $(this).attr('id');
	if (confirm("Did you wanna erase this data?")){
	$.ajax({
		method: "POST",
		url: 'delete.php?id='+id,
		success: function(){
		}
	});	
	$(this).parent().parent().fadeOut(500);
	} return false;
});