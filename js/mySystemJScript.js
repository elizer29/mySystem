$(document).ready(function(){

	//for the home page
	
	$("body").off('.data-api');
	
	
	$("#div_o1").show();
	$("#div_o2").hide();
	$("#div_o3").hide();
	$("#forErrMsg").hide(3000);
	
	$("#home").click(function(){
		$("#div_o1").show();
		$("#div_o2").hide();
		$("#div_o3").hide();
	});
	
	$("#mssn_vssn").click(function(){
		$("#div_o1").hide();
		$("#div_o2").show();
		$("#div_o3").hide();
	});
	
	$("#events").click(function(){
		$("#div_o1").hide();
		$("#div_o2").hide();
		$("#div_o3").show();
	});
	
//xxxxx for the monitoring page xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	
	$("#tabs").tabs();
	$("#date").datepicker();
	$("#form").hide();
	$("#forErrorDialog").hide();
	$("#forSuccessAddDialog").hide();
	$("#forSuccessEditDialog").hide();
	$("#forDeleteDialog").hide();
	
//xxxxx for viewing the content xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx	
	$.ajax({
		type: "POST",
		url: "patients_view.php",
		success: function(data){
			$("#record_table").append(data);
		},
		error: function(data){}
	});
	
	//-------------------------------------------------------------
	
	$.ajax({
		type: "POST",
		url: "viewDoc.php",
		success: function(data){
			$("#doctors_table").append(data);
		},
		error: function(data){}
	});
	
//xxxxx for search xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	$("#search").keyup(function(){
		var sname = $("input[name='search']").val();
		var obj = {"lastname":sname};
		
		$.ajax({
			type: "POST",
			url: "patients_search.php",
			data: obj,
			success: function(data){
				$("#record_table").html(data);
			}, 
			error: function(data){
			}
		});
	});
	
//xxxxx for adding xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	
	$("#add_button").click(function(){
	
		
		$("#myModal").modal();
		$("#saving").hide();
		$("#add").show();
		
		$("#add").click(function(){
			var objects = {
						"firstname":$("input[name='firstname']").val(),
						"lastname":$("input[name='lastname']").val(),
						"middle_initial":$("input[name='middle_initial']").val(),
						"age":$("input[name='age']").val(),
						"gender":$("input:radio[name='gender']:checked").val(),
						"address":$("input[name='address']").val(),
						"department":$("select[name='department']").val(),
						"date":$("input[name='date']").val()
					};
					
					var a = $("input[name='firstname']").val();
					var b = $("input[name='lastname']").val();
					var c = $("input[name='middle_initial']").val();
					var d = $("input[name='age']").val();
					//var e = $("input:radio[name='gender']:checked").val();
					var f = $("input[name='address']").val();
					var g = $("input[name='date']").val();
					
					if(a=="" && b=="" && c=="" && d=="" && f=="" && g==""){
						$("#alert").fadeIn();
					}	
					 else if(($("input:radio[name='gender']:checked").val() == null || false) || ($("select[name='department']").val() == "----Select----")){
						$("#alert").fadeIn();
					}
					
					 else {
					 
						$.ajax({
						type: "POST",
						url: "patients_add.php",
						data: objects,
						success: function(data){
							$("#record_table").append(data);
							$("#forSuccess").fadeIn();
						},
						error: function(data){}
						});
						
					}
		});				
	});
	
	
	$("#btn_Login").click(function(){
		$("#user").modal();
	});
	
//--------------------------------------------------------------------------------------------------------------//

	$('#alert').hide();
	$('#forSuccess').hide();
	$("#user").hide();

	$('#closing, #closing2').click(function(){
		$("#alert").hide();
		$("#forSuccess").hide();
		$("input[name='firstname']").val('');
		$("input[name='lastname']").val('');
		$("input[name='middle_initial']").val('');
		$("input[name='age']").val('');
		$("input[name='gender']").attr("checked", false);
		$("input[name='address']").val('');
		$("select").val('1');
		$("input[name='date']").val('');
	});

	
/*--------------------------------------------------------------------------------------------------------------*/
	
});

//xxxxx for the delete xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

	function patients_delete(id){
		
		
		$("#forDeleteDialog").dialog({
			show: "fade",
			hide: "fade",
			modal: true,
			buttons:{
				"ok": function(){
					var obj = {"id":id};
					
					$.ajax({
						type: "POST",
						url: "patients_delete.php",
						data: obj,
						success: function(data){
							$(document.getElementById(id)).remove();
						},
						error: function(data){}
					});
					
					$(this).dialog("close");
				},
				"cancel": function(){
					$(this).dialog("close");
				}
			}
		});
		
		
	}
	
//xxxxx for the edit xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	
	function patients_edit(id){
	
	
	var objcts = {"id":id};
		
		$.ajax({
			type: "POST",
			url: "patients_edit.php",
			data: objcts,
			success: function(data){
				var obj = JSON.parse(data);
					$("input[name='id']").val(obj.id);
					$("input[name='firstname']").val(obj.firstname);
					$("input[name='lastname']").val(obj.lastname);
					$("input[name='middle_initial']").val(obj.middle_initial);
					$("input[name='age']").val(obj.age);
					$("input[name='gender']:checked").val(obj.gender);
					$("input[name='address']").val(obj.address);
					$("select[name='department']").val(obj.department);
					$("input[name='date']").val(obj.date);
			},
			error: function(data){}
		});
		
	$("#add").hide();
	$("#saving").show();
	$("#myModal").modal();
	$("#saving").click(function(){
		
			var objects = {
						"id":$("input[name='id']").val(),
						"firstname":$("input[name='firstname']").val(),
						"lastname":$("input[name='lastname']").val(),
						"middle_initial":$("input[name='middle_initial']").val(),
						"age":$("input[name='age']").val(),
						"gender":$("input[name='gender']:checked").val(),
						"address":$("input[name='address']").val(),
						"department":$("select[name='department']").val(),
						"date":$("input[name='date']").val()
					};
					
					if(($("input:radio[name='gender']:checked").val() != null || false) && ($("select[name='department']").val() != "----Select----")){
						$.ajax({
							type: "POST",
							url: "patients_save.php",
							data: objects,
							success: function(data){
								$(document.getElementById(objects.id)).html(data);
								$("#alert").hide();
								$("#forSuccess").fadeIn();
							},
							error: function(data){}
						});
					}
					
					else {
						$("#alert").fadeIn();
					}
	});
		
	}
	
	
	
	
	
	
	
	
	
