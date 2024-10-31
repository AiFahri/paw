<?php

$id = $_GET['id'];
if (!$id) {
    header('Location: .');
    die;
}
include_once 'db.php';
$sql = "SELECT * FROM post WHERE id=$id";
$result = $mysqli->query($sql);
if (!$result->num_rows) {
    header('Location: index.php');
}
$post = $result->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px;
            background-color: #5bc0de;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #31b0d5;
        }
        h3 {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Post</h1>
        <?php if (isset($_GET['invalid'])) : ?>
            <h3>Please complete the form!</h3>
        <?php endif; ?>
        <form action="edit_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $post->id; ?>">
            <label for="title">Title:
                <input type="text" name="title" id="title" value="<?php echo $post->title; ?>" autofocus>
            </label>
            <label for="content">Content:
                <textarea name="content" id="content" cols="30" rows="10" required><?php echo $post->content; ?></textarea>
            </label>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>