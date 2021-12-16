<!doctype html>
<html lang="en">
<head>
    <!-- Include all style imports -->
    <?php include 'stylescripts.php'; ?>
    <title>ProDev</title>
</head>
<body class="text-center">
    <main class="form-signin">
        <form action="authenticate.php" method="post">
            <img class="mb-4" src="images/placeholder.svg" alt="Company logo">

            <div class="form-floating">
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
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
            <p class="mt-5 mb-3 text-muted">&copy; 2021 | Powered by onlinediensten.eu</p>
        </form>
    </main>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>