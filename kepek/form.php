<!DOCTYPE html>
<html>

    <html lang="hu">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <title>PHP vizsgamunka</title>
        </head>

        <header>
            <picture>
                <img src="../img/banner.jpg" alt="Banner" width="100%" height="300px">
            </picture>
        </header>

        <nav>
            <ul>
                <li><a href="../index.php">Főoldal</a></li>
                <li><a href="form.php">Galéria</a></li>
                <li><a href="../login.php">Admin</a></li>
            </ul>
        </nav>

        <h2>Tölts fel egy képet a pizzádról és vegyél részt a nyereményjátékban! :)</h2>
        <br>

        <form action="" method="POST" enctype="multipart/form-data">
            <label for="kep"></label>
            <br>
            <input type="file" id="kep" name="kep">
            <br>
            <label for="cim">Frappáns név kötelező.</label>
            <br>
            <input type="text" id="cim" name="cim">
            <br>
            <button type="submit">Mentés</button>
        </form>

        <?php
        if (isset($_POST['cim']) && isset($_FILES['kep']) && $_FILES['kep']['error'] == 0) {
            $cim = filter_var($_POST['cim'], FILTER_SANITIZE_SPECIAL_CHARS);
            $kep = $_FILES['kep']['name'];

            if (copy($_FILES['kep']['tmp_name'], 'assets/image/' . $kep)) {
                $conn = mysqli_connect('localhost', 'root', '', 'pizzeria');
                if ($conn) {
                    $sql = "insert into kep (cim, kep) values('$cim','$kep')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        
                    }

                    mysqli_close($conn);
                }
            }
        }
        ?>
        <div id="gallery">
            <figure>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'pizzeria');
                if ($conn) {
                    $sql = "select * from kep";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <figure>
                                <figcaption><?php print($row['cim']); ?></figcaption>
                                <img src="assets/image/<?php print($row['kep']); ?>" height="200">
                            </figure>
                            <?php
                            print('<a href="torles.php?id=' . $row['id'] . '">Törlés</a>');
                        }
                    }
                    mysqli_close($conn);
                }
                ?>
            </figure>
        </div>

    </html>