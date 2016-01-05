<?php
// landing.php - Verify that program was called by KMS.PHP, if not transfer to KDS.PHP
// Written by: Serhiy Konyk, December 2015

if (!isset($landing)) {
header("Location: kms.php"); 
exit;
}
?>