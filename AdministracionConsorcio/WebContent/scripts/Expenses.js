$("#lnkNewTelefonoUtil").click(function(){
		$("#modal-content").load("../views/modalNewExpenses.html", function(){
			
			function TriggerAlert(alert_selector, alert_message_selector, message){
				alert_message_selector.val(message);
				alert_selector.css('visibility', 'visible');
				setTimeout(function(){
					alert_selector.css('visibility', 'hidden');
				}, 2000);
			}
			
			$("#btnSaveExpences").click(function(){
				TriggerAlert($("#success_message"), $("#success_message_content"), "La expensa se ha cargado con exito");
				$('#myModal').modal('hide');
			});
		});
	});	