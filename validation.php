<?php
$Name="";
$Email="";
$Phone_Number="";
$Gender="";
$Department="";
$College="";

$data=array();
$data["Name_error"]="";
$data["Email_error"]="";
$data["Phone_Number_error"]="";
$data["Gender_error"]="";
$data["Department_error"]="";
$data["College_error"]="";
$data["db_error"]="";
$data["db_success"]="";



if(isset($_GET["Name"])){
    $Name=$_GET["Name"];
    if($Name==""){
        
        $data["Name_error"]="Please Enter Your Name";
    }else{
        //  $data["Name_error"]="";
        
    }
   
}else{
    $data["Name_error"]="Name Parameter Not Found ";
    
}

if(isset($_GET["Email"])){
    $Email=$_GET["Email"];
    if($Email==""){
        $data["Email_error"]="Please Enter your email";
        
    }else{
        // $data["Email_error"]="";
        
    }
   
}else{
    $data["Email_error"]="Email Parameter Not Found";
}

if(isset($_GET["Phone_Number"])){
    $Phone_Number=$_GET["Phone_Number"];
    if($Phone_Number==""){
        $data["Phone_Number_error"]="Please select your department";
        
    }else{
        // $data["Phone_Number_error"]="";
       
    }
   
}else{
    $data["Phone_Number_error"]=" Phone NumberParameter Not Found";
    
}


if(isset($_GET["Gender"])){
    $Gender=$_GET["Gender"];
    if($Gender==""){
        $data["Gender_error"]="select option";
        
    }else{
        // $data["Gender_error"]="";
        
    }
   
}else{
    $data["Gender_error"]="Gender Parameter Not Found";
    
}


if(isset($_GET["Department"])){
    $Department=$_GET["Department"];
    if($Department==""){
        $data["Department_error"]="Please select your department";
        
    }else{
        // $data["Department_error"]="";
        
    }
   
}else{
    $data["Department_error"]="Department Parameter Not Found";
    
}


if(isset($_GET["College"])){
    $College=$_GET["College"];
    if($College==""){
        $data["College_error"]="Please Enter your College";
        
    }else{
        // $data["College_error"]="";
       
    }
   
}else{
    $data["College_error"]="College Parameter Not Found";
    
}



if($Name!=""&&$Email!=""&&$Phone_Number!=""&&$Gender!=""&&$Department!=""&&$College!=""){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard";

// Create connection
$dbconnector = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($dbconnector->connect_error) {
//   echo("Connection failed: " . $conn->connect_error);
  $data["db_error"]="Connection failed: " . $dbconnector->connect_error;

 
}else{
   
 $Email_query="SELECT * FROM regform WHERE Email='$Email'";

    $result = $dbconnector->query($Email_query);
    // echo($result->num_rows."<br/>");

    if($result->num_rows==0){
        $sql_query = "INSERT INTO regform
                          (Name, Email, Phone_Number, Gender, Department, College)
                          VALUES 
                          ('$Name', '$Email','$Phone_Number','$Gender' '$Department','$College')";

            if ($dbconnector->query($sql_query) === TRUE) {
            
            $data["db_success"]="New record created successfully";
            
            } else {
            
            $data["db_error"]="Error: " . $sql_query . "<br>" .$dbconnector->error;

            }
    }else{
        
        $data["Email_error"]="Given Email already  exists..";
    }

}

}
echo json_encode($data);


?>

