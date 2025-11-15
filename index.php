

<?php
define('DB_USER', 'root');
define('DB_PASS', 'ZOUHAIR');
define('DB_NAME', 'todolist');
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
if ($conn->connect_error) {
    die("Erreur : " . $conn->connect_error);
}
?>




<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['id'] ?? null;

    if ($action == "new" && !empty($_POST['title'])) {
        $title = $_POST['title'];
        $conn->query("INSERT INTO todo (title) VALUES ('$title')");
    }

    if ($action == "delete" && $id) {
        $conn->query("DELETE FROM todo WHERE id = $id");
    }

    if ($action == "toggle" && $id) {
        $conn->query("UPDATE todo SET done = 1 - done WHERE id = $id");
    }

    header("Location: index.php");
    exit;
}
?>


<?php
$result = $conn->query("SELECT * FROM todo ORDER BY created_at DESC");
$taches = $result->fetch_all(MYSQLI_ASSOC);
?>


