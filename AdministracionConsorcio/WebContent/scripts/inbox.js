$(document).ready(function(){
	$("#txtFecha").datepicker({ dateFormat: 'dd-mm-yy' });
	
	/*
	 * --Orden de las columnas:
	 * [0] = Tipo de mensaje
	 * [1] = Preview de mensaje
	 * [2] = Remitente
	 * [3] = Fecha recibido
	 * ------------------------ 
	 */
	$("#tblInbox tbody tr,#tblInbox2 tbody tr").click(function(){
		var selected_tr = $(this);
		
		$("#modal-content").load("../views/messagePartial.html", function() {
		/*	ID's importantes
			#message_modal_title => título que se visualiza en el modal pop up 
			#panel_event_title => título que se visualiza en el content del modal (header de panel)
			#panel_event_content => contenido del panel situado en el content del modal pop-up
		 */
			if($(selected_tr.children("td")[0]).text() == "Sugerencia"){
				$("#btnExtra").css('visibility', 'visible');
				$("#btnExtra").text("Generar tema de interés!");
			}
			
			$("#message_modal_title").html("<p>" + $(selected_tr.children("td")[0]).text() + "</p></br><h5>Remitente: " + $(selected_tr.children("td")[2]).text() + " - " + $(selected_tr.children("td")[3]).text() + "</h5>");
			$("#panel_event_content").html("<p>" + $(selected_tr.children("td")[1]).text() + "</p>");

			$('#myModal').modal('show');
		});
	});

	$("#ddlTipoMensaje").multiselect({
		nonSelectedText: 'Tipo de mensaje...',
        nSelectedText: 'seleccionados',
        allSelectedText: 'Todos',
	});
});