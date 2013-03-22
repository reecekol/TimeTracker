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
	  
	</style>
  </head>
<body id="container">
 <div id="logo">Time Tracker</div>
  
 <?php
   if(0){
  echo "   
  <table>
  
  </table>
  ";
  }
  else 
  {
  
    echo "<div><p>No New Projects</p></div>";
  }
  ?>
  <div id="project">
      <label>Project Name</label><input type="text"/><label>Est Hrs</label><input type="text"/><label>Total Hrs</label><input type="text"/>
	 <button>Add New Project</button>
  <div>
</body>