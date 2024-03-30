 <!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge"> 
    <meta Name="viewport" 
          content="width=device-width,  
                   initial-scale=1.0"> 
    <title>Website</title> 
    
 
          <link rel="stylesheet" 
          href="style.css"> 
         
        
		  
</head> 
<?php 

// $list="active";

// require("header_files.php");
require("menu.php");

?>

<!-- <div style="padding-left:16px"> -->
<h2>Student List</h2>
</div>
<?php
// session_start();

// if(isset($_SESSION["username"])){

// }else{
//   header("Location:regform.php");
// }
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";
// require("db_config.php");
// $db = true;
// if($db){
// Create connection
$dbconnector = new mysql($servername, $username, $password, $dbname);
// Check connection
if ($dbconnector->connect_error){ 
//   echo("Connection failed: " . $dbconnector->connect_error);
  $data["db_error"]="Connection failed: " . $dbconnector->connect_error;
}else{
 
$sql_query = "SELECT * FROM regform";
$result = $dbconnector->query($sql_query);

}
?>
<table border='1'>
    <tr>
        <th>
        Id
        </th>
        <th>
        Name
        </th>
        <th>
        Email
        </th>
        <th>
        Phone_Number
        </th>
        <th>
        Gender
        </th>
        <th>
        Department
        </th>
        <th>
        College
        </th>
        <td>
        Update
        </td>
        <td>
        Delete
        </td>
 </tr>

        <?php
        $result = $dbconnector->query($sql_query);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo("<tr><td>" . $row["Id"] . 
                "</td><td>" . $row["Name"] . 
                "</td><td>" . $row["Email"] .
                "</td><td>" . $row["Phone_Number"] .
                "</td><td>" . $row["Gender"] .   
                "</td><td>" . $row["Department"] . 
                "</td><td>" . $row["College"] .
                "</td><td>" . "<a href='update.php?id=".$row['Id']."'><button>Update</button></a>".
                "</td><td>" . "<button id='success' onclick='Delete(".$row['Id'].")'>Delete</button>" .
                "</td></tr>");
            }
        }else{
            echo "No results";
        }
               
    ?>
</table>

<script>
    function Delete(id){
        // alert("deleted");
        parameters="id="+id;
        url="delete.php?"+parameters;
      // alert(url);
        // if(flag){
            const myrequest = new XMLHttpRequest();
            myrequest.onload = function() {
                  // console.log(this.responseText);
                  result=JSON.parse(this.response);

                  if(result.success!=""){
                    alert(result.success);
                //    $("#success_msg").text(result.success_msg);
                  }
      
                  if(result.db_error!=""){
                    alert(result.db_error);
                    
                  }   
                  location.reload();
                }
            myrequest.open("GET", url, true);
            myrequest.send();
              }
    // }
</script>

 