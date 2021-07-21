var sid,rid;

$(".duser").click(function(){
  sid=$(this).data("id");
  var conf=confirm("Are you sure?delete this seeker!!");
  if(conf){
  select_action1();    
  }
  
});
$(".druser").click(function(){
  rid=$(this).data("id");
    var conf=confirm("Are you sure?delete this recruiter!!");
  if(conf){
  select_action2();    
  }

});

function select_action1()
	{
	    var action = 'delete_s';
	    var btnvalue=sid;
	   
		$.ajax({
			url:"./include/delete_user.php",
			method:"POST",
			data:{
			    action:action, 
			    btnvalue:btnvalue, 
			    },
			success:function(data)
			{
			   console.log(data);
			   console.log("hello s done");
				location.reload();
			
			}
		});
	}
	function select_action2()
	{
	    var action = 'delete_r';
	    var btnvalue=rid;
	   
		$.ajax({
			url:"./include/delete_user.php",
			method:"POST",
			data:{
			    action:action, 
			    btnvalue:btnvalue, 
			    },
			success:function(data)
			{
			    console.log(data);
			    console.log("hello r done");
			    location.reload();
				
			
			}
		});
	}
	