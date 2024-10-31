<?php

$title = addslashes(trim($_POST['title']));
$content = addslashes(trim($_POST['content']));

if (!$title || !$content) {
    header('Location: create.php?invalid=1');
    die;
}
include_once 'db.php';
$sql = "INSERT INTO post (title, content) VALUES ('$title', '$content')";
$mysqli->query($sql);
header('Location: .');