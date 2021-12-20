<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Liam Vlaskamp, Pascal Vlaskamp">

    <!-- Icon -->
    <link rel="icon" href="../img/icon-placeholder.svg">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-extended.css" rel="stylesheet" />

    <!-- Login CSS -->
    <link href="../css/login.css" rel="stylesheet">

    <title>ProDev</title>
</head>
<body class="text-center">
    <main class="form-signin">
        <form action="includes/login.php" method="post">
            <img class="mb-4" src="img/placeholder.svg" alt="Company logo">

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="user@gmail.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 | Powered by <a href="https://www.onlinediensten.eu">OnlineDiensten</a></p>
        </form>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>