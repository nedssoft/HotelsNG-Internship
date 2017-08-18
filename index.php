
<?php 

  require 'models/Model.php';
  $config = require 'config/Config.php';
  $model = new Model($config);
   $contacts=$model->fetchAllContacts();

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>HNG Internship</title>
	<style type="text/css">s
		table, tr, td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
   <table >
   	<thead>
   		<th>ID</th>
   		<th>NAME</th>
   		<th>E-MAIL</th>
   		<th>PHONE</th>
   	</thead>
   	<tbody>
   
   	<?php 
      if (! empty($contacts))
      {
          for($i=0; $i<count($contacts); $i++)
          {
          	echo '<tr><td>'.$contacts[$i]['id'].'</td><br>'.
          	     '<td>'.$contacts[$i]['name'].'</td><br>'.
          	     '<td>'.$contacts[$i]['email'].'</td><br>'.
          	     '<td>'.$contacts[$i]['phone'].'</td></tr>';
          }       
       
       } 
       else{
        echo 'Oops! the contacts table is not yet created<br>
        Please Import the hng.sql file into the hng database to populate the contacts table';
       }
   	 ?>
   	 
   	 </tbody>
   </table>
</body>
</html>


