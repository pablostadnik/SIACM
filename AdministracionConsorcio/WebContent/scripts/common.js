$(document).ready(function(){
	$("#main_body").load("../views/inbox.html");
	
	$("#lnkHome").click(function(){
		$("#main_body").load("../views/inbox.html");
	});
	
	$("#lnkNotifications").click(function(){
		$("#main_body").load("../views/notifications.html");
	});
	
	$("#lnkExpensas").click(function(){
		$("#main_body").load("../views/Expenses.html");
	});

	$("#lnkSettings").click(function(){
		$("#main_body").load("../views/noPage.html");
	});
	
	$("#lnkTelefonos").click(function(){
		$("#main_body").load("../views/telefonosUtiles.html");
	});
});