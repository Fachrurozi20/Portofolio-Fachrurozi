<?php
include '../includes/config.php';
include '../includes/functions.php';

$projects = getProjects($conn);
echo json_encode($projects);
?>
