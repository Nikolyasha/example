$(document).ready(function(){

	//======================================
	//==        КЛИЕНТСКАЯ СТОРОНА        ==
	//======================================

	//Проверка E-mail на валидность
	function ValidationEmail(email)
	{
    	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    	return pattern.test(email);
    }

    function randomInt(min,max)
	{
	    return Math.floor(Math.random() * (max - min + 1) + min);
	}

    //Обработчик кнопки "Авторизоваться" на странице входа
	$("#login_password_form_submit").click(function(){
		var email = $("#login_input").val();
		var password = $("#password_input").val();
		var check_email = 0;
		var check_password = 0;
		var check_rem = "false";
		if (ValidationEmail(email))
		{
			check_email = 1;
		}
		else
		{
			check_email = 0;
			$("#login_input").addClass("is-invalid");
		}
		if (password != "")
		{
			check_password = 1;
		}
		else
		{
			check_password = 0;
			$("#password_input").addClass("is-invalid");
		}
		if ($("#checkbox").prop('checked'))
		{
			check_rem = "true";
		}
		else
		{
			check_rem = "false";
		}
		if ((check_email == 1) && (check_password == 1))
		{
			$.ajax({
				type: "POST",
				url: "handlers/auth.php",
				data: ({
					email : email,
					password : password,
					check_rem : check_rem
				}),
				beforeSend: function() {
					$("#login_password_form_submit").hide();
					$("#login_password_form_loader").show();
			    },
			    success: function(data) {
					if (data == "Yes")
			    	{
			    		$("#login_password_form_submit").show();
						$("#login_password_form_loader").hide();
			    		document.location.href = "homepage";
			    	}
			    	if (data == "Yes(admin)")
			    	{
			    		$("#login_password_form_submit").show();
						$("#login_password_form_loader").hide();
			    		document.location.href = "homepage";
			    	}
					if (data == "Yes(no admin)")
			    	{
			    		$("#login_password_form_submit").show();
						$("#login_password_form_loader").hide();
			    		document.location.href = "/sertificate/index";
			    	}
			    	if (data == "No (password)")
			    	{
			    		$("#login_password_form_submit").show();
						$("#login_password_form_loader").hide();
			    		$("#login_password_form_message").html("Неправильно введен пароль");
			    		$("#login_password_form_message").show(500);
			    	}
			    	if (data == "No (email)")
			    	{
			    		$("#login_password_form_submit").show();
						$("#login_password_form_loader").hide();
			    		$("#login_password_form_message").html("Пользователя с таким E-mail-ом не существует");
			    		$("#login_password_form_message").show(500);
			    	}
			    }
			})
		}
	});

	$("#login_input, #password_input").keydown(function(e){
		$(this).removeClass("is-invalid");
		$("#login_password_form_message").hide(500);
	});

	//Ссылка в меню "Главная"
	$("#left_menu_home").click(function(){
		document.location.href = "homepage";
	});

	//Ссылка в меню "Логи"
	$("#left_menu_logs").click(function(){
		document.location.href = "logs";
	});

	//Ссылка в меню "Настройки"
	$("#left_menu_settings").click(function(){
		document.location.href = "settings";
	});

	//Ссылка в меню "Выход"
	$("#left_menu_exit").click(function(){
		$.ajax({
			type: "POST",
			url: "handlers/logout.php",
			success: function(data) {
				if (data == "logout")
				{
					document.location.href = "index";	
				}
			}
		})
	});

	//Создание записи
	$("#create_data").click(function(){
		// $("#Modal1").modal("show");
		// $("#data_number_cert").val("");
		// $("#data_topic").val("");
		// $("#data_date_receiving").val("");
		// $("#data_lastname").val("");
		// $("#data_firstname").val("");
		// $("#data_image_input").val("");
		document.location.href = "sertificate/index";
		console.log("sdsd")
	});

	//Добавление записи в систему
	$("#submit_request_data").click(function() {
		var number_cert = $("#data_number_cert").val();
		var topic = $("#data_topic").val();
		var date_receiving = $("#data_date_receiving").val();
		var lastname = $("#data_lastname").val();
		var firstname = $("#data_firstname").val();
	    var file_data = $("#data_image_input").prop("files")[0];
	    var check_number_cert = 0;
	    var check_topic = 0;
	    var check_date_receiving = 0;
	    var check_lastname = 0;
	    var check_firstname = 0;
	    if (file_data)
	    {
	    	if (number_cert != "")
	    	{
	    		check_number_cert = 1;
	    	}
	    	else
	    	{
	    		check_number_cert = 0;
	    		$("#data_number_cert").addClass("is-invalid");
	    	}
	    	if (topic != "")
	    	{
	    		check_topic = 1;
	    	}
	    	else
	    	{
	    		check_topic = 0;
	    		$("#data_topic").addClass("is-invalid");
	    	}
	    	if (date_receiving != "")
	    	{
	    		check_date_receiving = 1;
	    	}
	    	else
	    	{
	    		check_date_receiving = 0;
	    		$("#data_date_receiving").addClass("is-invalid");
	    	}
	    	if (lastname != "")
	    	{
	    		check_lastname = 1;
	    	}
	    	else
	    	{
	    		check_lastname = 0;
	    		$("#data_lastname").addClass("is-invalid");
	    	}
	    	if (firstname != "")
	    	{
	    		check_firstname = 1;
	    	}
	    	else
	    	{
	    		check_firstname = 0;
	    		$("#data_firstname").addClass("is-invalid");
	    	}
	    	if ((check_number_cert == 1) && (check_topic == 1) && (check_date_receiving == 1) && (check_lastname == 1) && (check_firstname == 1))
	    	{
		    	var form_data = new FormData();
			    form_data.append("file", file_data);
			    $.ajax({
			        type: "POST",
			        url: "handlers/data_create_image.php",
			        dataType: "text",
			        cache: false,
			        contentType: false,
			        processData: false,
			        data: form_data,
			        success: function(data)
			        {
			        	$.ajax({
					    	type: "POST",
					    	url: "handlers/data_create.php",
					    	data: ({
					    		number_cert : number_cert,
					    		topic : topic,
					    		date_receiving : date_receiving,
					    		firstname : firstname,
					    		lastname : lastname,
					    		image : $("#data_image_input").prop("files")[0].name
					    	}),
					    	success: function(data1) {
					    		if (data1 == "1")
					    		{
					    			document.location.reload();	
					    		}
					    	}
					    });
			        }
			    });
			}
	    }
	    else
	    {
	    	if (number_cert != "")
	    	{
	    		check_number_cert = 1;
	    	}
	    	else
	    	{
	    		check_number_cert = 0;
	    		$("#data_number_cert").addClass("is-invalid");
	    	}
	    	if (topic != "")
	    	{
	    		check_topic = 1;
	    	}
	    	else
	    	{
	    		check_topic = 0;
	    		$("#data_topic").addClass("is-invalid");
	    	}
	    	if (date_receiving != "")
	    	{
	    		check_date_receiving = 1;
	    	}
	    	else
	    	{
	    		check_date_receiving = 0;
	    		$("#data_date_receiving").addClass("is-invalid");
	    	}
	    	if (lastname != "")
	    	{
	    		check_lastname = 1;
	    	}
	    	else
	    	{
	    		check_lastname = 0;
	    		$("#data_lastname").addClass("is-invalid");
	    	}
	    	if (firstname != "")
	    	{
	    		check_firstname = 1;
	    	}
	    	else
	    	{
	    		check_firstname = 0;
	    		$("#data_firstname").addClass("is-invalid");
	    	}
	    	if ((check_number_cert == 1) && (check_topic == 1) && (check_date_receiving == 1) && (check_lastname == 1) && (check_firstname == 1))
	    	{
				$.ajax({
			    	type: "POST",
			    	url: "handlers/data_create.php",
			    	data: ({
			    		number_cert : number_cert,
			    		topic : topic,
			    		date_receiving : date_receiving,
			    		firstname : firstname,
			    		lastname : lastname
			    	}),
			    	success: function(data) {
			    		if (data == "1")
			    		{
			    			document.location.reload();	
			    		}
			    	}
			    });
			}
	    }
	});

	//Увеличение изображения при клике
	$("#data_table, #data_table_search").on("click", ".image_cert", function(){
		var src = $(this).attr("src");
		$("body").append("<div class='popup'><div class='popup_bg'></div><img src='"+src+"' class='popup_img' /></div>");
		$(".popup").fadeIn(300);
		$(".popup_bg").click(function(){   
			$(".popup").fadeOut(800);
			setTimeout(function(){
				$(".popup").remove();
			}, 300);
		});
	});

	//Открытие модалки подтверждения удаления
	$("#data_table").on("click", ".data_delete", function(){
		$("#Modal2").modal("show");
		$("#delete_data_password").val("");
		$("#delete_data_password").removeClass("is-invalid");
		$("#delete_modal_check_password").css("display", "none");
		$("#submit_delete_data").attr("data-src", $(this).attr("data-src"));
	});

	//Обработчик удаления записи
	$("#submit_delete_data").click(function(){
		var id = $(this).attr("data-src");
		var password = $("#delete_data_password").val();
		var check_password = 0;
		if (password != "")
		{
			check_password = 1;
		}
		else
		{
			check_password = 0;
			$("#delete_data_password").addClass("is-invalid");
		}
		if (check_password == 1)
		{
			$.ajax({
				type: "POST",
				url: "handlers/data_delete.php",
				data: ({
					id : id,
					password : password
				}),
				success: function(data) {
					if (data == "1")
					{
						$("#Modal2").modal("hide");
						document.location.reload();
					}
					if (data == "0")
					{
						$("#delete_modal_check_password").css("display", "block");
					}
				}
			});
		}
	});

	$("#delete_data_password").keydown(function(e){
		$(this).removeClass("is-invalid");
		$("#delete_modal_check_password").css("display", "none");
	});

	$("#data_number_cert, #data_topic, #data_date_receiving, #data_lastname, #data_firstname, #data_search1").keydown(function(e){
		$(this).removeClass("is-invalid");
	});

	$("#settings_title_input, #settings_description_input").keydown(function(e){
		$(this).removeClass("is-invalid");
	});

	//Инициализации красивых выпадающих списков
	$("#select_group1").selectpicker();
	$("#select_group2").selectpicker();
	$("#select_group3").selectpicker();

	//Обработчик изменения количества отображаемых записей в админке
	$("#select_group2").change(function(){
		var index = $(this).val();
		$.ajax({
			type: "POST",
			url: "handlers/count_row.php",
			data: ({
				index : index
			}),
			success: function(data) {
				if (data == "1")
				{
					document.location.href = "homepage";
				}
			}
		});
	});

	//Выбор типа поиска в админке
	$("#select_group1").change(function(){
		$("#data_search").removeAttr("disabled");
		$("#clear_search").removeAttr("disabled");
	});

	//Выбор типа поиска на главной странице
	$("#select_group3").change(function(){
		$("#data_search1").removeAttr("disabled");
		$("#clear_search1").removeAttr("disabled");
	});

	//Обработчик поиска в админке
	$("#data_search").keyup(function(){
		var type_search = $("#select_group1").val();
		var text_search = $(this).val();
		if ($(this).val().length >= 2)
		{
			$.ajax({
				type: "POST",
				url: "handlers/data_search.php",
				data: ({
					type_search : type_search,
					text_search : text_search
				}),
				success: function(data) {
					$("#pagination_menu").css("display", "none");
					$("#count_row_div").css("display", "none");
					$("#data_table tbody > tr").remove();
					$("#data_table tbody").append(data);
				}
			})
		}
	});

	//Обработчик поиска на главной странице
	$("#s_search1").click(function(){
		var type_search = $("#select_group3").val();
		var text_search = $("#data_search1").val();
		if ($("#data_search1").val().length >= 2)
		{
			$.ajax({
				type: "POST",
				url: "handlers/search.php",
				data: ({
					type_search : type_search,
					text_search : text_search
				}),
				beforeSend: function() {
					$("#data_table_search tbody > tr").remove();
					$(".loaderr").css("display", "block");
				},
				success: function(data) {
					$(".loaderr").css("display", "none");
					$("#data_table_search tbody").append(data);
				}
			})
		}
		else
		{
			$("#data_search1").addClass("is-invalid");
		}
	});

	//Подключение кнопки "Наверх"
	$().UItoTop({ easingType: 'easeOutQuart' });

	//Очистка поиска в админке
	$("#clear_search").click(function(){
		document.location.reload();
	});

	//Очистка поиска на главной странице
	$("#clear_search1").click(function(){
		$(".loaderr").css("display", "none");
		$("#data_search1").val("");
		$("#data_table_search > tbody > tr").remove();
	});

	//Изменение настроек главной страницы
	$("#settings_save_changes").click(function() {
		var title = $("#settings_title_input").val();
		var description = $("#settings_description_input").val();
	    var check_title = 0;
	    var check_description = 0;
    	if (title != "")
    	{
    		check_title = 1;
    	}
    	else
    	{
    		check_title = 0;
    		$("#settings_title_input").addClass("is-invalid");
    	}
    	if (description != "")
    	{
    		check_description = 1;
    	}
    	else
    	{
    		check_description = 0;
    		$("#settings_description_input").addClass("is-invalid");
    	}
    	if ((check_title == 1) && (check_description == 1))
    	{
			$.ajax({
		    	type: "POST",
		    	url: "handlers/settings_edit.php",
		    	data: ({
		    		title : title,
		    		description : description
		    	}),
		    	success: function(data) {
		    		if (data == "1")
		    		{
		    			document.location.reload();	
		    		}
		    	}
		    });
		}
	});

	$("#settings_image_input").change(function(){
		var file_data = $("#settings_image_input").prop("files")[0];
		var form_data = new FormData();
	    form_data.append("file", file_data);
	    $.ajax({
	        type: "POST",
	        url: "handlers/settings_edit_image.php",
	        dataType: "text",
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,
	        beforeSend: function() {
	        	$("#settings_loader1").css("display", "block");
	        },
	        success: function(data)
	        {
	        	$.ajax({
			    	type: "POST",
			    	url: "handlers/st_edit.php",
			    	data: ({
			    		image : $("#settings_image_input").prop("files")[0].name
			    	}),
			    	success: function(data1) {
			    		if (data1 == "1")
			    		{
			    			$("#image1").attr("src", "img/" + $("#settings_image_input").prop("files")[0].name);
			    			$("#settings_image_input").val("");
			    			$("#settings_loader1").css("display", "none");
			    		}
			    	}
			    });
	        }
	    });
	});

	$("#settings_image_input2").change(function(){
		var file_data = $("#settings_image_input2").prop("files")[0];
		var form_data = new FormData();
	    form_data.append("file", file_data);
	    $.ajax({
	        type: "POST",
	        url: "handlers/settings_edit_image.php",
	        dataType: "text",
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,
	        beforeSend: function() {
	        	$("#settings_loader2").css("display", "block");
	        },
	        success: function(data)
	        {
	        	$.ajax({
			    	type: "POST",
			    	url: "handlers/st_edit2.php",
			    	data: ({
			    		image : $("#settings_image_input2").prop("files")[0].name
			    	}),
			    	success: function(data1) {
			    		if (data1 == "1")
			    		{
			    			$("#image2").attr("src", "img/" + $("#settings_image_input2").prop("files")[0].name);
			    			$("#settings_image_input2").val("");
			    			$("#settings_loader2").css("display", "none");
			    		}
			    	}
			    });
	        }
	    });
	});

	$("#settings_image_input3").change(function(){
		var file_data = $("#settings_image_input3").prop("files")[0];
		var form_data = new FormData();
	    form_data.append("file", file_data);
	    $.ajax({
	        type: "POST",
	        url: "handlers/settings_edit_image.php",
	        dataType: "text",
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,
	        beforeSend: function() {
	        	$("#settings_loader3").css("display", "block");
	        },
	        success: function(data)
	        {
	        	$.ajax({
			    	type: "POST",
			    	url: "handlers/st_edit3.php",
			    	data: ({
			    		image : $("#settings_image_input3").prop("files")[0].name
			    	}),
			    	success: function(data1) {
			    		if (data1 == "1")
			    		{
			    			$("#image3").attr("src", "img/" + $("#settings_image_input3").prop("files")[0].name);
			    			$("#settings_image_input3").val("");
			    			$("#settings_loader3").css("display", "none");
			    		}
			    	}
			    });
	        }
	    });
	});

});