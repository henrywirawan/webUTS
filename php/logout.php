<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('Logout Successful')</script>";
echo "<script>window.location.href = '../php/login.php'</script>";
?>
