<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
include '../includes/config.php';

$page_name = $_GET['page_name'];
$sql = "SELECT * FROM pages WHERE page_name='$page_name'";
$result = $conn->query($sql);
$page = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $image = $_FILES['page_image']['name'];
    $target = "../uploads/" . basename($image);

    if ($page_name == 'contact') {
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $sql = "UPDATE pages SET content='$content', address='$address', phone='$phone', email='$email' WHERE page_name='$page_name'";
    } else {
        $sql = "UPDATE pages SET content='$content' WHERE page_name='$page_name'";
    }

    if (!empty($image)) {
        if (move_uploaded_file($_FILES['page_image']['tmp_name'], $target)) {
            $sql = "UPDATE pages SET content='$content', image='$image' WHERE page_name='$page_name'";
        } else {
            $error = "Failed to upload image";
        }
    }

    if (isset($_FILES["cv_file"])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["cv_file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an actual PDF or fake PDF
        if ($fileType != "pdf") {
            $uploadOk = 0;
            $error = "Sorry, only PDF files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["cv_file"]["tmp_name"], $target_file)) {
                $sql = "UPDATE pages SET content='$content', pdf_file='" . basename($_FILES["cv_file"]["name"]) . "' WHERE page_name='cv'";
                if ($conn->query($sql) === TRUE) {
                    $success = "The file ". htmlspecialchars(basename($_FILES["cv_file"]["name"])) . " has been uploaded.";
                } else {
                    $error = "Sorry, there was an error updating the database.";
                }
            } else {
                $error = "Sorry, there was an error uploading your file.";
            }
        }
    }

    if ($conn->query($sql) === TRUE) {
        $success = "Page updated successfully.";
    } else {
        $error = "Error updating page: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
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

<div class="container">
    <h1>Edit Page: <?= ucfirst($page_name) ?></h1>
    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form action="edit_page.php?page_name=<?= $page_name ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10" required><?= $page['content'] ?></textarea>
        </div>
        <?php if ($page_name == 'contact'): ?>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= isset($page['address']) ? $page['address'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($page['phone']) ? $page['phone'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= isset($page['email']) ? $page['email'] : '' ?>" required>
            </div>
        <?php endif; ?>
        <?php if ($page_name == 'cv'): ?>
            <div class="mb-3">
                <label for="cv_file" class="form-label">Upload New CV (PDF only)</label>
                <input type="file" class="form-control" id="cv_file" name="cv_file">
            </div>
            <?php if (!empty($page['pdf_file'])): ?>
                <div class="mb-3">
                    <p>Current CV: <a href="../uploads/<?= $page['pdf_file'] ?>" target="_blank"><?= $page['pdf_file'] ?></a></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="mb-3">
            <label for="page_image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="page_image" name="page_image">
        </div>
        <?php if (!empty($page['image'])): ?>
            <div class="mb-3">
                <p>Current Image: <img src="../uploads/<?= $page['image'] ?>" width="200" alt="Current Image"></p>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Update Page</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
