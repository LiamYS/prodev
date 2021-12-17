<!doctype html>
<html lang="en">
<head>
    <!-- Include all style imports -->
    <?php include 'includes/header.php'; ?>
    <title>ProDev</title>
</head>
<body class="text-center">
    <main class="form-signin">
        <form action="includes/login.php" method="post">
            <img class="mb-4" src="img/placeholder.svg" alt="Company logo">

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>

            <!--<div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>-->
            <button class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021 | Powered by <a href="https://www.onlinediensten.eu">OnlineDiensten</a></p>
        </form>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>