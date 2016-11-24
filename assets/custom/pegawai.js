var manageMemberTablePegawai;

$(document).ready(function() {
	manageMemberTablePegawai = $("#manageMemberTablePegawai").DataTable({
		'ajax': 'index.php/pegawai/fetchMemberDataPegawai',
		'orders': []
	});	
});

function addMemberModelPegawai() 
{
	$("#createFormPegawai")[0].reset();

	//remove textdanger
	$(".text-danger").remove();

	// remove form-group
	$(".form-group").removeClass('has-error').removeClass('has-success');

	$("#createFormPegawai").unbind('submit').bind('submit', function() {
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
					$("#addMemberPegawai").modal('hide');

					// update the manageMemberTablePegawai
					manageMemberTablePegawai.ajax.reload(null, false); 

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

function removeMemberPegawai(id) 
{
	if(id) {
		$("#removeMemberBtnPegawai").unbind('click').bind('click', function() {
			$.ajax({
				url: 'index.php/pegawai/removePegawai' + '/' + id,
				type: 'post',				
				dataType: 'json',
				success:function(response) {
					if(response.success === true) {
						$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
						  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
						'</div>');

						// hide the modal
						$("#removeMemberModalPegawai").modal('hide');

						// update the manageMemberTablePegawai
						manageMemberTablePegawai.ajax.reload(null, false); 

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

function editMemberPegawai(id = null) 
{	
	if(id) {
		$("#editFormPegawai")[0].reset();
		$('.form-group').removeClass('has-error').removeClass('has-success');
		$('.text-danger').remove();

		$.ajax({
			url: 'index.php/pegawai/getSelectedMemberInfoPegawai/'+id,
			type: 'post',
			dataType: 'json',
			success:function(response) {
				$("#editNama_pegawai").val(response.nama_pegawai);			
				$("#editTlp_pegawai").val(response.tlp_pegawai);
				$("#editId_jk").val(response.id_jk);
				var jk = $('input[name=editId_jk]').val();
				if (jk==2){
					$('input[name=editId_jk][value=2]').prop('checked', true);
				} else {
					$('input[name=editId_jk][value=1]').prop('checked', true);					
				}
				$("#editId_kota").val(response.id_kota);
				$("#editId_posisi").val(response.id_posisi);

				$(document).on('submit',"#editFormPegawai", function() {
					var form = $(this);
					$.ajax({
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
								$("#editMemberModalPegawai").modal('hide');

								// update the manageMemberTablePegawai
								manageMemberTablePegawai.ajax.reload(null, false); 

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