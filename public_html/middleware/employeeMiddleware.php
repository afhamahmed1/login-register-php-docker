<?php
include_once('functions/myfunctions.php');

if (isset($_SESSION['auth'])) {

   
} else {
    redirect('login.php', 'Login to continue');
}
