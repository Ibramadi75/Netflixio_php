<?php
if(isset($_POST['connectionForm'])){
    require_once (__DIR__ . "\\connection_treatment.php");
}
elseif(isset($_POST['registerationForm'])){
    require_once (__DIR__ . "\\registration_treatment.php");
}
