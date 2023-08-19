$(document).ready(function(){
	$("#lnkNewNotification").click(function(){
		$("#modal-content").load("../views/modalNewNotificationPartial.html", function(){
			function TriggerAlert(alert_selector, alert_message_selector, message){
				alert_message_selector.val(message);
				alert_selector.css('visibility', 'visible');
				setTimeout(function(){
					alert_selector.css('visibility', 'hidden');
				}, 2000);
			}
			
			$("#btnSaveNotification").click(function(){
				TriggerAlert($("#success_message"), $("#success_message_content"), "El edificio ha sido creado con éxito!");
				$('#myModal').modal('hide');
			});
		});
	});	

	/*
	 * --Orden de las columnas:
	 * [0] = Tipo de mensaje
	 * [1] = Preview de mensaje
	 * [2] = Remitente
	 * [3] = Fecha recibido
	 * ------------------------ 
	 */
	$("#tblNotification tbody tr").click(function(){
		var selected_tr = $(this);
		
		$("#modal-content").load("../views/messagePartial.html", function() {
		/*	ID's importantes
			#message_modal_title => título que se visualiza en el modal pop up 
			#panel_event_title => título que se visualiza en el content del modal (header de panel)
			#panel_event_content => contenido del panel situado en el content del modal pop-up
		 */
			
			$("#message_modal_title").html("<p>" + $(selected_tr.children("td")[0]).text() + "</p></br><h5>Remitente: " + $(selected_tr.children("td")[2]).text() + " - " + $(selected_tr.children("td")[3]).text() + "</h5>");
			$("#panel_event_content").html("<p>" + $(selected_tr.children("td")[1]).text() + "</p>");

			$('#myModal').modal('show');
		});
	});
});