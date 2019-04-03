$('#i_pm').on('select2:unselecting', function (e) {
         var id = e.params.args.data.id; //your id
         var project_id = $('#i_pro_name').val(); 
         $.ajax({
         	url: "../Administrator/delete_project_managers",
         	type:"post",
         	dataType:"json",
         	data:{"project_id":project_id,"emp_id":id},            
         	success: function(data){
         		//alert('data');
         	}
         });         
     });
//delete team leads

$('#i_tl').on('select2:unselecting', function (e) {
         var id = e.params.args.data.id; //your id
         var project_id = $('#i_pro_name').val(); 
         $.ajax({
         	url: "../Administrator/delete_team_leads",
         	type:"post",
         	dataType:"json",
         	data:{"project_id":project_id,"emp_id":id},            
         	success: function(data){
         		//alert(data);
         	}
         });         
     });
//delete teammembers
$('#i_team_members').on('select2:unselecting', function (e) {
         var id = e.params.args.data.id; //your id
         var project_id = $('#i_pro_name').val(); 
         $.ajax({
         	url: "../Administrator/delete_team_members",
         	type:"post",
         	dataType:"json",
         	data:{"project_id":project_id,"emp_id":id},            
         	success: function(data){
         		//alert(data);
         	}
         });         
     });