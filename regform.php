
<link rel="stylesheet" 
          href="form.css"> 

<?php
$home="";
$register="active";
$login="";
$list="";
require('headerfile.php');
require("menu.php");
  
?>         
<form action="validation.php" method="GET">
  <section class="container">
    <h1>Registration Form</h1>
<span id="Success" style="color:green"></span>

      <div class="input-box">
        <label>Name</label>
        <input type="text"  id="Name" name="Name" placeholder="Enter full Name">
        <span id="Name_error" style="color:red"></span>
      </div>
      <div class="input-box">
        <label>Email</label>
        <input type="text"  id="Email" name="Email" placeholder="Enter Email address">
        <span id="Email_error" style="color:red"></span>
      </div>
      <div class="column">
        <div class="input-box">
          <label>Phone_Number</label>
          <input type="number"  id="Phone_Number" name="Phone_Number" placeholder="Enter phone number">
          <span id="Phone_Number_error" style="color:red"></span>
        </div>
       
      </div>
      <div class="Gender-box">
        <h3>Gender</h3>
        <div class="Gender-option">
        <span id="Gender_error" style="color:red"></span>
          <div class="Gender">
            <input type="radio" value="male" id="Gender" name="Gender" placeholder="choose option">
           
            <label for="Gender">male</label>
          </div>
</div>
          <div class="Gender">
            <input type="radio" value="female" id="Gender" name="Gender">
            <label for="Gender">Female</label>
          </div>
          <div class="Gender">
            <input type="radio" value="prefer not to say" id="Gender" name="Gender">
            <label for="Gender">prefer not to say</label>
          </div>
        </div>
     
    
    <div class="column">
    <label>Department </label>
     
            <select  id="Department" name="Department">
              <option value="">select Department</option>
              <option>CSE</option>
              <option>EEE</option>
              <option>ECE</option>
              <option>IT</option>

            </select>
            <span id="Department_error" style="color:red"></span>  
  </div>
    <div class="input-box">
      <label>College</label>
      <input type="text"  id="College" name="College" placeholder="Enter College Name">
      <span id="College_error" style="color:red"></span>
      </div>
          
    <div>
     <button type="submit" class="btn" id="regform"  value="submit">Register</button>  
    
       
        </div> 
      
      </section>
  
    </form>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
   $(document).ready(function(){
    $("#regform").click(function(e){
  e.preventDefault();
  alert("run");


flag = true;
// $("#id").text("");

   
    
    Name=$("#Name").val();
    if(Name==""){
      
        // alert("run");
        $("#Name_error").text("Please Enter your Name");
        flag=false;

    }else if(Name.length>=10){
    
        $("#Name_error").text("Please Enter Valid Name");
        flag=false;

    }else{
        
        $("#Name_error").text("");
    var regName = /^[A-Za-z]+ [A-Za-z]+$/;
if(regName.test(Name)){
  $("Name_error").text("");
    alert('Valid Name.');

}else{
  // validation_error=validation_error+1;
  $("Name_error").text("invalid name");
  flag=false;

    alert('InValid Name.');
}
 }   
    
   
    Email=$("#Email").val();
    if(Email==""){
      
     
        $("#Email_error").text("Please Enter your Email");
        flag=false;

    }else{

      $("#Email_error").text("");
  
        Email_pattern=/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;

        if(Email_pattern.test(Email)){
            $("#Email_error").text("");
        }else{
          
            $("#Email_error").text("InValid Email"); 
        flag=false;

        }
    }
        
    

   
    Phone_Number=$("#Phone_Number").val();
    if(Phone_Number==""){
      
        $("#Phone_Number_error").text("Please enter your phonenumber");
        flag=false;

    }else{
       
        $("#Phone_Number_error").text("");
   
    }

    Gender=$("#Gender").val();
    if(Gender==""){
     
        $("#Gender_error").text("select option");
        flag=false;

    }else{
        
        $("#Gender_error").text("");
   
    }

    
    Department=$("#Department").val();
    if(Department==""){
      
        $("#Department_error").text("Please Choose your Department");
        flag=false;

    }else{
       
        $("#Department_error").text("");
   
    }
    
    
    College=$("#College").val();

    if(College==""){
      $("#College_error").text("Please enter your college name");
      
        flag=false;

   
    }else{
        
        $("#College_error").text("");
   
    }
    
parameters="Name="+Name+"&Email="+Email+"&Phone_Number="+Phone_Number+"&Gender="+Gender+"&Department="+Department+"&College="+College;
url="regform/dashboard/validation.php?"+parameters;


if(flag){
      const myrequest = new XMLHttpRequest();
      myrequest.onload = function() {
          console.log(this.responseText);
          result=JSON.parse(this.responseText);
          $("#Name_error").text("result.Name_error"); 
          $("#Email_error").text("result.Email_error");
          $("#Phone_Number_error").text("result.Phone_Number_error");
          $("#Gender_error").text("result.Gender_error"); 
          $("#Department_error").text("result.Department_error"); 
          $("#College_error").text("result.College_error"); 
          

          if(result.success!=""){
            alert(result.success);
            $("#Name").val("");
            $("#Email").val("");
            $("#Phone_Number").val("");
            $("#Gender").val("");
            $("#Department").val("");
            $("#College").val("");
          }

          if(result.db_error!=""){
            alert(result.db_error);
              
        }

            
      myrequest.open("GET", url, true);
      myrequest.send();
                
                }
  }


   
        });
 });
</script>
    
 