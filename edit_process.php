<?php
include_once 'db.php';

$id = $_POST['id'];
$title = addslashes(trim($_POST['title']));
$content = addslashes(trim($_POST['content']));
if (!$id || !$title || !$content) {
    header('Location: edit.php?id=' . $id . '&invalid=1');
    die;
}
$sql = "UPDATE post SET title='$title', content='$content' WHERE id=$id";
$mysqli->query($sql);
header('Location: .');
