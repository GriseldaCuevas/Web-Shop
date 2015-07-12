$(document).on('ready', jquery);

function jquery(){
	if(error_login)
		$('#error_login').modal('show');

	if(error_registro)
		$('#error_login').modal('show');
}