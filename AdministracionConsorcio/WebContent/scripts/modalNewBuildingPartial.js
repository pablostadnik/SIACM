$(document).ready(function(){
	
		$("#rdbEdif").click(function(){
			$("#ddlPiso").attr("disabled", false);
			$("#ddlDepto").attr("disabled", false);
			$("#ddlPiso").val(1);
			$("#ddlDepto").val(1);
			
			$("#ddlLote").attr('disabled', 'disabled');
			$("#ddlLote").val(1);
		});
		
		$("#rdbLote").click(function(){
			$("#ddlPiso").attr("disabled", 'disabled');
			$("#ddlDepto").attr("disabled", 'disabled');
			$("#ddlPiso").val(1);
			$("#ddlDepto").val(1);
			
			$("#ddlLote").attr('disabled', false);
			$("#esquema").html("");
		});
	
		$("#ddlPiso,#ddlDepto").change(function(){
			var esquema_html = '<div class="row"><div class="col-md-4">&nbsp;</div>';
			//Para cada departamento, dibujo el header de la tabla
			for (i = 1; i <= $("#ddlDepto").val(); i++) {
				esquema_html += '<div class="col-md-2">';
				esquema_html += "Dto " + i;
				esquema_html += '</div>';
			}
			
			esquema_html += '</div>';//END first row
			
			//Para cada piso del edificio, dibujo una caja de texto por cada departamento.
			for (j = 1; j <= $("#ddlPiso").val(); j++) { 
			    esquema_html += '<div class="row">'
			    esquema_html += '<div class="col-md-4">Piso ' + j + '</div>';
			    //Para ese piso, la cantidad de departamentos seleccionada.
			    for (k = 1; k <= $("#ddlDepto").val(); k++) {
			    	esquema_html += '<div class="col-md-2"><input class="form-control" type="text"></input></div>';
			    }
			    esquema_html += "</div>";
			}
			
			$("#esquema").html(esquema_html);
		});
		
		function TriggerAlert(alert_selector, alert_message_selector, message){
			alert_message_selector.val(message);
//			alert(alert_message_selector.val(message));
			alert_selector.css('display', 'block');
			setTimeout(function(){
				alert_selector.css('display', 'none');
			}, 2000);
		}

		$("#btnSaveBuilding").click(function(){
			$('ul.nav.nav-pills li.active').next().addClass('active').siblings().removeClass('active');
			$("#main_body").load("../views/Inbox.html");
			
			TriggerAlert($("#success_message"), $("#success_message_content"), "El edificio ha sido creado con éxito!");
			$('#myModal').modal('hide');
		});
		
		$("#btnUpload").click(function(){
			$("#body_general").slideUp();
			$("#body_imagen").load("../views/_uploadImagePartial.html");
		});
		
		$("#ddlFormaPago").multiselect({
			nonSelectedText: 'Seleccione...',
	        nSelectedText: 'seleccionados',
	        allSelectedText: 'Todos',
		});
	});