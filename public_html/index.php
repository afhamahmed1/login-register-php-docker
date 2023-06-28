<?php
if(session_status() === PHP_SESSION_NONE) session_start();
// include_once('functions/myfunctions.php');
include_once('middleware/employeeMiddleware.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once('includes/header.php');
?>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
        <?php
        include_once('includes/navbar.php');
        ?>

          <!-- / Navbar -->



<?php
include_once('includes/scripts.php');
?>
</body>
</html>
