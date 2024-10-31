<?php
include_once 'db.php';

$sql = "SELECT * FROM post";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogh</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9ecef;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a.create-post {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a.create-post:hover {
            background-color: #0056b3;
        }

        .post {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .post h2 {
            color: #007bff;
        }

        .post p {
            color: #555;
        }

        .post a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .post a:hover {
            text-decoration: underline;
        }

        form {
            display: inline;
        }

        input[type="submit"] {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Posts</h1>
        <a href="create.php" class="create-post">Create Post</a>
        <?php
        if (!$result) {
            echo '<p>No posts found.</p>';
        } else {
            while ($post = $result->fetch_object()) {
                echo '<div class="post">';
                echo '<h2>' . $post->title . '</h2>';
                echo '<p>' . $post->content . '</p>';
                echo '<a href="edit.php?id=' . $post->id . '">Edit</a>';
                printf('<form action="delete.php" method="POST">
                    <input type="hidden" name="id" value="%d">
                    <input type="submit" value="Delete"></form>', $post->id);
                echo '</div>';
            }
        }
        ?>
    </div>
</body>

</html>