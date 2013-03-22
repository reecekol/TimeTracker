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
	  
	  #entry{
	  
	   padding-top:40px;
	   
	  }
	</style>
  </head>
<body id="container">
 <div id="logo">Time Tracker</div>
  
 <?php
   $query="SELECT * FROM project_tracker";
   $result=mysql_query($query);
   echo mysql_num_rows($result);
   if(mysql_num_rows($result)>0){
      echo "<div>";
      while($row=mysql_fetch_row($result))
      {
	  
	    // print_r($row);
            echo "<div id='entry'>".$row['1'] . $row['2'] .$row['3']."</div><form method='post' action='index.php'></form>" ;
      }
  
  }
  else 
  {
  
    echo "<div><p>No New Projects</p></div>";
  }
  if(isset($_POST['pname']) && isset($_POST['esthrs']) && isset($_POST['totalhrs']) && !empty($_POST['pname']))
  {
   
	 
    $query="INSERT into project_tracker VALUES('','$_POST[pname]','$_POST[esthrs]','$_POST[totalhrs]')";
	mysql_query($query);
	
  }
  
  ?>
  <div id="project">
      <form id="new_project" method="post" action="index.php">
         <label>Project Name</label><input type="text" name="pname" />
	     <label>Est Hrs</label><input type="text" name="esthrs"/>
		 <label>Total Hrs</label><input type="text" name="totalhrs"/>
		 <input type="submit"/>
	  </form>
	 <button>Add/Update Project</button>
  <div>
</body>