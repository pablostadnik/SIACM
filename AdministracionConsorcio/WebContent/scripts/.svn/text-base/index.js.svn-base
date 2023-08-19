$(document).ready(function(){
	$("#main_header").load("../views/menuPartial.html");
	
	$("#btnSaveBuilding").click(function(){
		$('#myModal').modal('hide');
	});
	
	$("#lnkNewBuilding").click(function(){
		$("#modal-content").load("../views/modalNewBuildingPartial.html");
	});
	
	$("#lnkDpto3").click(function(){
		$("#main_body").load("../views/inbox.html");
	});
	
	$("#lnkDpto2,#lnkDpto4,#lnkDpto5").click(function(){
		$("#main_body").html('<div class="panel panel-default"><div class="panel-body">¡Aún no hay nada por aquí!</div></div>');
	});
	
	$("#lnkDpto1").click(function(){
		$("#main_body").load("../views/inbox.html", function(){
			$("#tblInbox").css('display', 'none');
			$("#tblInbox2").css('display', '');
		});
	});
	
	$('ul.nav.nav-pills li a').click(function() {           
	    $(this).parent().addClass('active').siblings().removeClass('active');           
	});
	
	$('img[name="editar_edificio"]').click(function(){
		$("#modal-content").load("../views/modalNewBuildingPartial.html", function(){
			$("#txtDire input").val("Alicia Moreau de Justo 740");
		});
		
		$('#myModal').modal('show');
	});
});

