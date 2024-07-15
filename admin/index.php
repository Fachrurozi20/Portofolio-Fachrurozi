<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
include '../includes/config.php';


$sql_pages = "SELECT * FROM pages";
$result_pages = $conn->query($sql_pages);

$sql_projects = "SELECT * FROM projects";
$result_projects = $conn->query($sql_projects);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f5f7fa;
            color: #333;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .card-body {
            position: relative;
        }
        .float-end {
            transition: transform 0.2s;
        }
        .float-end:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1>Welcome, <?= $_SESSION['admin'] ?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Manage Pages</div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php while ($row = $result_pages->fetch_assoc()): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $row['page_name'] ?>
                                <span>
                                    <a href="edit_page.php?page_name=<?= $row['page_name'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                </span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Manage Projects</div>
                <div class="card-body">
                    <a href="add_project.php" class="btn btn-primary mb-3">Add Project</a>
                    <ul class="list-group">
                        <?php while ($row = $result_projects->fetch_assoc()): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $row['title'] ?>
                                <span>
                                    <a href="edit_project.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="delete_project.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm ms-2">Delete</a>
                                </span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
