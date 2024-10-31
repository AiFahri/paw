<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
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

        button {
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }

        h3 {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Create Post</h1>
        <?php if (isset($_GET['invalid'])) : ?>
            <h3>Please complete the form!</h3>
        <?php endif; ?>
        <form action="create_process.php" method="POST">
            <label for="title">Title:
                <input type="text" name="title" id="title" required autofocus>
            </label>
            <label for="content">Content:
                <textarea name="content" id="content" cols="30" rows="10" required></textarea>
            </label>
            <button type="submit">Create</button>
        </form>
    </div>
</body>

</html>