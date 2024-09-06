<?php 
//Database Connection file
include('dbconnection.php');
if(isset($_POST['submit'])) //ifsubmit button is clicked
  {  	
    $email=$_POST['email'];
    $password=$_POST['password'];
     
  $sql = "SELECT * FROM login WHERE Email ='{$email}' and Password ='{$password}' LIMIT 1";
  $query = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($query);
    if ($row) {        
   // echo "<script>alert('Your Login is Successfull');</script>";
    echo "<script type='text/javascript'> document.location ='6Homepage.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" >
        <style>
            .bnb {
                
                background-color:white;
                color:black;
                border: white solid 3px; 
                 padding: 50px;               
                margin: 0px;
            }
            </style>
    </head>
    <body style="background-image: linear-gradient(to right,#00365A,#0B99A7);">
    <!-- <div style="background-image: linear-gradient(to right,#00365A,#0B99A7);height: 780px;"> -->
        <form  method="POST" >
            <table class="bnb" style="margin-left :650px;">   
            <tr>
                    <td colspan="3" class="title">Login Page</td>
                </tr>
                <tr style="height: 50px;">
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td style="font-family: Arial, Helvetica, sans-serif; color:black;font-size: 25; font-weight: bold;">Email</td>
                    <td>:</td>
                    <td>
                    <input type="email" name="email" class="txtbx" placeholder="Enter Email Id" required="true">
                    </td>
                </tr>
                <tr>
                    <td style="font-family: Arial, Helvetica, sans-serif; color:black;font-size: 25; font-weight: bold; ">Password</td>
                    <td>:</td>
                    <td>
                    <input type="password" id="password" name="password" placeholder="Enter Password" class="txtbx" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align: right;">
                        <input type="submit" id="btn" name="submit" value="Login">
                    </td>
                </tr>                
            </table>
        </form>
        </div>
    </body>
</html>
