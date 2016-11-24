var manageMemberTablePosisi;

$(document).ready(function() {
	manageMemberTablePosisi = $("#manageMemberTablePosisi").DataTable({
		'ajax': 'index.php/posisi/fetchMemberDataPosisi',
		'orders': []
	});	
});

function addMemberModelPosisi() 
{
	$("#createFormPosisi")[0].reset();

	//remove textdanger
	$(".text-danger").remove();

	// remove form-group
	$(".form-group").removeClass('has-error').removeClass('has-success');

	$("#createFormPosisi").unbind('submit').bind('submit', function() {
		var form = $(this);

		// remove the text-danger
		$(".text-danger").remove();
		$.ajax({
			url: '/path/to/file',
			type: 'default GET (Other values: POST)',
			dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: {param1: 'value1'},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
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
					$("#addMemberPosisi").modal('hide');

					// update the manageMemberTablePosisi
					manageMemberTablePosisi.ajax.reload(null, false); 

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

function removeMemberPosisi(id) 
{
	if(id) {
		$("#removeMemberBtnPosisi").unbind('click').bind('click', function() {
			$.ajax({
				url: 'index.php/posisi/removePosisi' + '/' + id,
				type: 'post',				
				dataType: 'json',
				success:function(response) {
					if(response.success === true) {
						$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
						  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
						'</div>');

						// hide the modal
						$("#removeMemberModalPosisi").modal('hide');

						// update the manageMemberTablePosisi
						manageMemberTablePosisi.ajax.reload(null, false); 

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

function editMemberPosisi(id = null) 
{	
	if(id) {
		$("#editFormPosisi")[0].reset();
		$('.form-group').removeClass('has-error').removeClass('has-success');
		$('.text-danger').remove();

		$.ajax({
			url: 'index.php/posisi/getSelectedMemberInfoPosisi/'+id,
			type: 'post',
			dataType: 'json',
			success:function(response) {
				$("#editNama_posisi").val(response.nama_posisi);			

				$("#editFormPosisi").unbind('submit').bind('submit', function() {
					
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
								$("#editMemberModalPosisi").modal('hide');

								// update the manageMemberTablePosisi
								manageMemberTablePosisi.ajax.reload(null, false); 

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