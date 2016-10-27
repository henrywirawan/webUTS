<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('Auto logut has been performed')</script>";
echo "<script>window.location.href = '../html/signup.html'</script>";
?>