<?php
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style media="screen">
        #main-wrapper {
            margin: 10vh auto;
            max-width: clamp(300px, 50vw, 600px);
        }

        ol {
            margin: 10vh auto;
            max-width: clamp(500px, 80vw, 1300px);
        }
    </style>
    <title>Hello, world!</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Probe Klausur</span>
            </div>
        </nav>
    </header>
    <main>
        <div id="main-wrapper">
            <?php
            $sql = "SELECT * FROM `users`";
            $conn = mysqli_connect('localhost', 'root', '', 'usertbl');
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['username'] . '</h5>';
                echo '<p class="card-text">' . $row['email'] . '</p>';
                echo '<p class="card-text">' . $row['pshash'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

</body>

</html>