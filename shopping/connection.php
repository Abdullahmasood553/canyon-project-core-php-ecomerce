<?php 
$connection=mysqli_connect("localhost","root","","shopping");
/*check connection*/
if(mysqli_connect_errno())
{
echo"Connection Fail". mysqli_connect_error();
}
?>