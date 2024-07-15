<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
include '../includes/config.php';

$id = $_GET['id'];

$sql = "DELETE FROM projects WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}
?>
