<?php
include('initial/init.php');
if (isset($_SESSION['email']))
{
    unset($_SESSION['email']);
}
header("Refresh:0; url=index.php"); 
?>