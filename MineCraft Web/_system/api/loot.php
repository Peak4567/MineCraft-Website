
<?php 
session_start();

if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']){
    $this->output->set_status_header(400, 'No Remote Access Allowed');
    exit;
} else {
    if(isset($_POST['reward']) and isset($_POST['uid'])) {
        
    }
}



?>