<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>PHP vizsgamunka</title>
    </head>

    <body>
        <header>
            <picture>
                <img src="img/banner.jpg" alt="Banner" width="100%" height="300px">
            </picture>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Főoldal</a></li>
                <li><a href="kepek/form.php">Galéria</a></li>
                <li><a href="login.php">Admin</a></li>
            </ul>
        </nav>
        <main>
            <h1>Pizzáink:</h1>
            <form method="POST" action="visszaigazolas.php" enctype="multipart/form-data">

                <?php
                require_once('./conf.php');

                $conn = mysqli_connect($server, $user, $ar, $db);
                
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT id, neve, megjegyzes, ar FROM pizza_fajtak";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo (mysqli_error($conn) . ' ' . mysqli_errno($conn));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <input type="checkbox" name="pizza_fajta" id="pizza">
                        <label for="pizza"><?php echo ($row['neve'] . ' (' . $row['megjegyzes'] . ') ' . $row['ar'] . 'Ft'); ?></label>
                        <br>

                        <?php
                    }
                }
                ?>

                <br>
                <br>
                <label for="megjegyzes">Ha szeretnél változtani vagy extra felétet kérni ide irhatsz:</label><br>
                <input type="textarea" name="megjegyzes" id="megjegyzes" cols="50" rows="10"></textarea>

                <h2>A megrendeléshez kérjük töltse ki az adatait:</h2>
                <label for="name">Név:</label>
                <input type="text" id="name" name="name" placeholder="Példa Péter">
                <br>
                <label for="cim">Lakcím:</label>
                <input type="text" id="cim" name="cim" placeholder="Bp Valami utca 1">
                <br>
                <label for="telszam">Telefonszám:</label>
                <input type="number" id="telszam" name="telszam" placeholder="06301234567">
                <br>
                <label for="email">Email cím:</label>
                <input type="email" id="neve" name="email" placeholder="peldapeter@valami.hu">
                <br>
                <button type="submit"> Megrendel </button>
            </form>

        </main>


    </body>

</html>