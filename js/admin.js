$('.tasks_list').on('click', '.task', el =>{
	id_task = $(el.currentTarget).attr('data-id');
	$(location).attr('href', '../edit_task.php?id=' + id_task);
});

$('.btn_edit_task').click(_=>{
	username = $('#frm_edit_username').val();
	email = $('#frm_edit_email').val();
	text_task = $('#frm_edit_task').val();
	id_task = $('.btn_edit_task').attr('data-id');
	if($('.check_finish').is(':checked'))finished = 1;
		else finished = 0;

	$.ajax({
		url: '../handler/h_edit_task.php',
		type: 'POST',
		data: {id_task : id_task, username : username, email : email, text_task : text_task, finished : finished},
		success: res=>{
			$(location).attr('href', '../admin.php');
		}
	});
});

function exitAdmin(){
	$(location).attr('href', '../handler/exit.php');
}