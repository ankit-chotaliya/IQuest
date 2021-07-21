var sid,rid;

$(".selectbtn").click(function(){
    
  sid=$(this).data("id");
 
  
  select_action();
});
$(".rejectbtn").click(function(){
    rid=$(this).data("id");
     
 reject_action()
});

function select_action()
	{
	    var action = 'select_action';
	    var btnvalue=sid;
	   
		$.ajax({
			url:"./include/select.php",
			method:"POST",
			data:{
			    action:action, 
			    btnvalue:btnvalue, 
			    },
			success:function(data)
			{
			    if($("#"+btnvalue).hasClass("badge badge-warning")){
			        $("#"+btnvalue).removeClass("badge badge-warning")
			    }
			    if($("#"+btnvalue).hasClass("badge badge-danger")){
			        $("#"+btnvalue).removeClass("badge badge-danger")
			    }
				$("#"+btnvalue).addClass("badge badge-success").html("selected");
				
			
			}
		});
	}
	function reject_action()
	{
	    var action = 'reject_action';
	    var btnvalue=rid;
	   
		$.ajax({
			url:"./include/select.php",
			method:"POST",
			data:{
			    action:action, 
			    btnvalue:btnvalue, 
			    },
			success:function(data)
			{
			   if($("#"+btnvalue).hasClass("badge badge-warning")){
			        $("#"+btnvalue).removeClass("badge badge-warning")
			    }
			    if($("#"+btnvalue).hasClass("badge badge-success")){
			        $("#"+btnvalue).removeClass("badge badge-sucess")
			    }
				$("#"+btnvalue).addClass("badge badge-danger").html("rejected");
				
			
			}
		});
	}