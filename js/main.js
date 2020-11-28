	showTasks(0);	
	$current_page = $('.tasks_list').attr('data-page');
	$('.number_page[data-number='+ $current_page + ']').addClass('current');


	$(document).on('input', _=>{
	var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
	if(($('#frm_add_username').val().trim()!='') && ($('#frm_add_text').val().trim() !='') && ($('#frm_add_email').val().trim().search(pattern) == 0)) $('.btn_add_task').removeAttr('disabled');
	else $('.btn_add_task').attr('disabled', 'disabled')
	});

	$('.show_form_auth').click(_=>{
		if($('.form_auth_admin').attr('data-show') == 'false'){ 
			$('.form_auth_admin').css('display', 'block'); 
			$('.form_auth_admin').attr('data-show', 'true'); 
		}else{ 
			$('.form_auth_admin').css('display', 'none'); $('.form_auth_admin').attr('data-show', 'false');
		};

	});
	
	$('.number_page').click(el=>{
		showTasks($(el.currentTarget).attr('data-number') - 1);
		$('.current').removeClass('current');
		$(el.currentTarget).addClass('current');
	});
	
	$(document).on('click', '.radio', _=>{
		showTasks($('.current').attr('data-number') - 1);
	});

function authAdmin(){
	login = $('#form_auth_login').val().trim();
	pass = $('#form_auth_password').val().trim();
	$.ajax({
		url: 'handler/auth.php',
		type: 'POST',
		data: { login : login, pass : pass},
		success: res=>{
				if(res!=1) {
					$('#form_auth_password').css('border-color', 'maroon');
					$('#form_auth_login').css('border-color', 'maroon');
				}else{
					location.reload();
				}
			}
		});
}

function addTask(){
	username = $('#frm_add_username').val().trim();
	email = $('#frm_add_email').val().trim();
	text_task = $('#frm_add_text').val().trim();
	
	$.ajax({
		url: 'handler/h_add_task.php',
		type: 'POST', 
		data: { username : username, email : email, text_task : text_task},
		success: res =>{
			$('.msg_success_added').show('slow');
			setTimeout(function() {location.reload(); }, 6000);
		}
	});
}

function showFormAddTask(){
	if($('.formAddTask').attr('data-show') == 'false'){
		$('.btn_add_task').css('display', 'inline');		
		$('.formAddTask').attr('data-show', 'true');
		$('.formAddTask').css('display', 'flex');
		$('.show_add_task').text('Скрыть панель');
	} else {
		$('.formAddTask').css('display', 'none');
		$('.btn_add_task').css('display', 'none');
		$('.show_add_task').text('Добавить задачу');
		$('.formAddTask').attr('data-show', 'false');
	}
}
	
	function showTasks(page){
	$('.task').remove();
	
	sort = $('input[name="sort"]:checked').val();
	$.ajax({
		url: 'handler/h_show_tasks.php',
		type: 'POST',
		data: { page : page , sort : sort}, 
		success: res => {
			var data = JSON.parse(res);
			for(let i=0; i<data.length; i++){
				if (data[i].finished == 1) status_task = 'Выполнена';
				else status_task = 'Не выполнена';
				if (data[i].edited == 1) edited = "Отредактирована администратором";
				else edited = '';
				let inner = "<div class='task' data-id=" + data[i].id_task +"><p class='task_user'> Пользователь: <b>" + data[i].username + "</b></p><p class='task_email'> Электронный адрес: <b>" + data[i].user_email + "</b></p><hr><p class='task_text'>" + data[i].text_task + "</p> <div class='task_status'>" + status_task + " <br>"+ edited + "</div>"
				$('.tasks_list').append(inner);
			}
		}
	});
}	