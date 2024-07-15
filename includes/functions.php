<?php
function getProjects($conn) {
    $sql = "SELECT * FROM projects ORDER BY created_at DESC";
    $result = $conn->query($sql);
    $projects = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }
    return $projects;
}
?>
