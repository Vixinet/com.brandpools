$(document).ready(function() {
	
	$('.ctrl-delete').on('click', cbCtrlDelete);
});

var cbCtrlDelete = function() {
	var target = $(this).attr('href');
	$('#modal .modal-body').html('<span>Do you really want to delete <strong>'+$(this).attr('label')+'</strong>?');
	$('#modal .btn-confirm').click(function(){
		$('#modal').modal('hide');
		window.location.href = target;
	});
	$('#modal').modal('show');
	return false;
};