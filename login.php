<!doctype html>
<html lang="hu">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<header>
    <picture>
        <img src="img/admin.jpg" alt="Banner" width="100%" height="300px">
    </picture>
</header>

<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.html"></a><span class="splash-description">Kérem jelentkezzen be.</span></div>
            <div class="card-body">
                <form method="POST" action="pwcheck.php">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" type="email" name="email" placeholder="Email cím" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" name="password"  placeholder="Jelszó">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Belépés</button>
                </form>
            </div>
        </div>
    </div>

    <li><a href="index.php">Vissza a Főoldalra</a></li>

</body>
 
</html>