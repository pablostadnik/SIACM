$(document).ready(function(){
	function TriggerAlert(alert_selector, alert_message_selector, message){
		alert_message_selector.val(message);
		alert_selector.css('visibility', 'visible');
		setTimeout(function(){
			alert_selector.css('visibility', 'hidden');
		}, 2000);
	}	
	
	/*
	 * --Orden de las columnas:
	 * [0] = Nombre especialista
	 * [1] = Especialidad
	 * [2] = Telefono
	 * [3] = Email
	 * ------------------------ 
	 */
	$(".telefono_util").click(function(){
		var selected_tr = $(this).parent();
		
		$("#modal-content").load("../views/modalNewTelefonoUtil.html", function() {
		/*	ID's importantes
			#message_modal_title => título que se visualiza en el modal pop up 
			#panel_event_title => título que se visualiza en el content del modal (header de panel)
			#panel_event_content => contenido del panel situado en el content del modal pop-up
		 */
			var nombre = $(selected_tr.children("td")[0]).text().split(' ')[0];
			var apellido = $(selected_tr.children("td")[0]).text().split(' ')[1];
			var especialidad = $(selected_tr.children("td")[1]).text();
			var telefono_linea = $(selected_tr.children("td")[2]).text().split('/')[1];
			var telefono_celular = $(selected_tr.children("td")[2]).text().split('/')[0];
			var mail = $(selected_tr.children("td")[3]).text();
			
			$("#txtNombre input").val(nombre);
			$("#txtApellido input").val(apellido);
			$("#ddlEspecialidad").val(1);
			$("#txtTelefono input").val(telefono_linea);
			$("#txtCelular input").val(telefono_celular);
			$("#txtMail input").val(mail);
			
			$("#message_modal_title").html("Edición de teléfono útil");
			

			$('#myModal').modal('show');
			
			$("#btnSaveTelefono").click(function(){	
				TriggerAlert($("#success_message"), $("#success_message_content"), "El edificio ha sido creado con éxito!");
				$('#myModal').modal('hide');
			});
		});
	});
	
	$("#lnkNewTelefonoUtil").click(function(){
		$("#modal-content").load("../views/modalNewTelefonoUtil.html", function(){
			
			function TriggerAlert(alert_selector, alert_message_selector, message){
				alert_message_selector.val(message);
				alert_selector.css('visibility', 'visible');
				setTimeout(function(){
					alert_selector.css('visibility', 'hidden');
				}, 2000);
			}
			
			$("#btnSaveTelefono").click(function(){
				TriggerAlert($("#success_message"), $("#success_message_content"), "El edificio ha sido creado con éxito!");
				$('#myModal').modal('hide');
			});
		});
	});	
	
	$('.ddlEdificio').multiselect({
		nonSelectedText: 'Seleccione un edificio',
        nSelectedText: 'seleccionados',
        allSelectedText: 'Todos',
        numberDisplayed: 2
	});
});