<?php
 $conn=mysql_connect("localhost","root","");
 
 mysql_select_db("tracker",$conn) or die(" An Error Occured with the database");

?>
<!doctype>
<html lang="en">
  <head>
    <title>Time Tracker </title>
	
	<style> 
	  #logo {
	   font-size:32px;
	   color:4433F5;
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
	</style>
  </head>
<body id="container">
 <div id="logo">Time Tracker</div>
  
 <?php
   if(0){
  echo "   
 
 
  ";
  }
  else 
  {
  
    echo "<div><p>No New Projects</p></div>";
  }
  if(isset($_POST['pname']) && isset($_POST['esthrs']) && isset($_POST['esthrs']))
  {
  
   
  }
  
  ?>
  <div id="project">
      <form id="new_project">
         <label>Project Name</label><input type="text" name="pname" />
	     <label>Est Hrs</label><input type="text" name="esthrs"/>
		 <label>Total Hrs</label><input type="text" name="totalhrs"/>
	  </form>
	 <button>Add/Update Project</button>
  <div>
</body>