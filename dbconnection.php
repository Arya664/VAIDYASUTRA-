<?php
$con=mysqli_connect("localhost","root","","vaidya");
//servername,username,password,dbname
if(mysqli_connect_errno())
{
    echo"Connection Failed !!! ".mysqli_connect_errno();
}
// else
// {
//   echo"Connection Successfull";
// }
?>