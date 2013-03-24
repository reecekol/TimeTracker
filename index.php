<?php
 $conn=mysql_connect("localhost","root","");
 
 mysql_select_db("tracker",$conn) or die(" An Error Occured with the database");

?>
<!doctype>
<html lang="en">
  <head>
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
     <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	 <script>
	   $("document").ready(function()
	   {
	     $(".entry").click(function(){
		   
		   //Read values from project when clicked
		   var projectName=$(this).children("span.projname").text();
		   var estHrs=$(this).children("span.est").text();
		   var totHrs=$(this).children("span.tot").text();
		   var projtoUpdate=$(this).find(".hiddeninput").val();
		   
		   //update from fields... poor mans edit :) 
		   $("#pname").val(projectName);
		   $("#esthrs").val(estHrs);
		   $("#tothrs").val(totHrs);
		   $("#update_no").val(projtoUpdate);
		 });
	   
	   
	   });
	  
	 </script>
    <title>Time Tracker </title>
	
	<style> 
	  #logo {
	     font-size:32px;
	     color:4433F5;
	     padding-bottom:10px;
	  }
	  
	  #container{
	     width:960px;
	     margin:0 auto;
	  }
	  
	  #project {
	     padding-top:50px;
	  }
	  
	  
	  button{
	     display:block;
	  }
	  
	  .entry{  
	     padding-top:20px;
	     padding-bottom:20px;
	     padding-left:40px;
	     border-bottom:1px solid #EDEDEB;
	  }
	  
	  .entry:hover{
	     background-color:#F7EDAB;
	  }
	  
	  .projname,.tot,.est{
	     display:inline-block;
	     width:200px;
	  }
	</style>
  </head>
<body id="container">
 <div id="logo">Time Tracker</div>
  
 <?php
   
  if(isset($_POST['pname']) && isset($_POST['esthrs']) && isset($_POST['totalhrs']) && !empty($_POST['pname']))
  {
   
	if(isset($_POST['update_no']) && !empty($_POST['update_no']) )
	{
	
	   echo $_POST['update_no'];
	  
	  $query="UPDATE project_tracker SET project_name='$_POST[pname]' ,tothrs='$_POST[totalhrs]', esthrs='$_POST[esthrs]' WHERE id=$_POST[update_no] ";
	  mysql_query($query);
	  
	}
	else
	{
    $query="INSERT into project_tracker VALUES('','$_POST[pname]','$_POST[esthrs]','$_POST[totalhrs]')";
	mysql_query($query);
	}
	
  }
  
  $query="SELECT * FROM project_tracker";
   $result=mysql_query($query);
   if(mysql_num_rows($result)>0){
      echo "<div><span class='projname'><em>Project Name</em></span> <span class='est'><em>Estimate</em></span><span class='tot'><em>Total</em></span></div>";
      while($row=mysql_fetch_row($result))
      {
	  
            echo "<div class='entry'>"."<span class='projname'>".$row['1']."</span>"."<span class='est'>".$row['2'].
			"</span>"."<span class='tot'>".$row['3']."</span>"."<span class='projno'><input type='hidden' class='hiddeninput' value='".$row['0']."'></span></div>" ;
      }
  
  }
  else 
  {
    echo "<div><p>No New Projects</p></div>";
  }
  ?>
  <div id="project">
  
      <form id="new_project" method="post" action="index.php">
         <label>Project Name</label><input type="text" name="pname" id="pname"/>
	     <label>Est Hrs</label><input type="text" name="esthrs" id="esthrs"/>
		 <label>Total Hrs</label><input type="text" name="totalhrs" id="tothrs"/>
		 <input type="hidden" value="" name="update_no" id="update_no"/>
		 <input type="submit" value="Add/Update Project"/>
	  </form>

  <div>
</body>