<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
include '../includes/config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id='$id'";
$result = $conn->query($sql);
$project = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);

    $sql = "UPDATE projects SET title='$title', description='$description', url='$url' WHERE id='$id'";

    if (!empty($image)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "UPDATE projects SET title='$title', description='$description', image='$image', url='$url' WHERE id='$id'";
        } else {
            $error = "Failed to upload image";
        }
    }

    if ($conn->query($sql) === TRUE) {
        $success = "Project updated successfully.";
    } else {
        $error = "Error updating project: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1>Edit Project</h1>
    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form action="edit_project.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $project['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required><?= $project['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" class="form-control" id="url" name="url" value="<?= $project['url'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <?php if (!empty($project['image'])): ?>
            <div class="mb-3">
                <p>Current Image: <img src="../uploads/<?= $project['image'] ?>" width="200" alt="Current Image"></p>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
