var manageMemberTableKota;

$(document).ready(function() {
	manageMemberTableKota = $("#manageMemberTableKota").DataTable({
		'ajax': 'index.php/kota/fetchMemberDataKota',
		'orders': []
	});	
});

function addMemberModelKota() 
{
	$("#createFormKota")[0].reset();

	//remove textdanger
	$(".text-danger").remove();

	// remove form-group
	$(".form-group").removeClass('has-error').removeClass('has-success');

	$("#createFormKota").unbind('submit').bind('submit', function() {
		var form = $(this);

		// remove the text-danger
		$(".text-danger").remove();

		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success:function(response) {
				if(response.success === true) {
					$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
						'</div>');

					// hide the modal
					$("#addMemberKota").modal('hide');

					// update the manageMemberTableKota
					manageMemberTableKota.ajax.reload(null, false); 

				} else {
					if(response.messages instanceof Object) {
						$.each(response.messages, function(index, value) {
							var id = $("#"+index);

							id
							.closest('.form-group')
							.removeClass('has-error')
							.removeClass('has-success')
							.addClass(value.length > 0 ? 'has-error' : 'has-success')
							.after(value);

						});
					} else {
						$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							'<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			}
		});	

		return false;
	});

}

function removeMemberKota(id) 
{
	if(id) {
		$("#removeMemberBtnKota").unbind('click').bind('click', function() {
			$.ajax({
				url: 'index.php/kota/removeKota' + '/' + id,
				type: 'post',				
				dataType: 'json',
				success:function(response) {
					if(response.success === true) {
						$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
						  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
						'</div>');

						// hide the modal
						$("#removeMemberModalKota").modal('hide');

						// update the manageMemberTableKota
						manageMemberTableKota.ajax.reload(null, false); 

					} else {
						$('.text-danger').remove()
						if(response.messages instanceof Object) {
							$.each(response.messages, function(index, value) {
								var id = $("#"+index);

								id
								.closest('.form-group')
								.removeClass('has-error')
								.removeClass('has-success')
								.addClass(value.length > 0 ? 'has-error' : 'has-success')										
								.after(value);										

							});
						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign">aa</span> </strong>'+response.messages+
							'</div>');
						}
					}
				} // /succes
				
			}); // /ajax
		});
	}
}

function editMemberKota(id = null) 
{	
	if(id) {
		$("#editFormKota")[0].reset();
		$('.form-group').removeClass('has-error').removeClass('has-success');
		$('.text-danger').remove();

		$.ajax({
			url: 'index.php/kota/getSelectedMemberInfoKota/'+id,
			type: 'post',
			dataType: 'json',
			success:function(response) {
				$("#editNama_kota").val(response.nama_kota);			

				$("#editFormKota").unbind('submit').bind('submit', function() {
					
					var form = $(this);

					$.ajax({
						// alert(id);	
						url: form.attr('action') + '/' + id,
						type: 'post',
						data: form.serialize(),
						dataType: 'json',
						success:function(response) {
							if(response.success === true) {
								$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
								  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
								  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
								'</div>');

								// hide the modal
								$("#editMemberModalKota").modal('hide');

								// update the manageMemberTableKota
								manageMemberTableKota.ajax.reload(null, false); 

							} else {
								$('.text-danger').remove()
								if(response.messages instanceof Object) {
									$.each(response.messages, function(index, value) {
										var id = $("#"+index);

										id
										.closest('.form-group')
										.removeClass('has-error')
										.removeClass('has-success')
										.addClass(value.length > 0 ? 'has-error' : 'has-success')										
										.after(value);										

									});
								} else {
									$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>');
								}
							}
						} // /succes
					}); // /ajax

					return false;
				});
				
			}
		});
	}
}