<?php  //Start the Session
session_start();
$connection = mysqli_connect('localhost', 'root', 'root', 'php_db','3306');
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])) {
    //3.1.1 Assigning posted values to variables.
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    //3.1.2 Checking the values are existing in the database or not

    $stmt = mysqli_stmt_init($connection);

    if (mysqli_stmt_prepare($stmt, "SELECT username,isadmin,idisuser FROM `isuser` WHERE username=? and password=SHA2(?,224)")) {

        /* bind parameters for markers */
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        /* execute query */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $username_fetched, $is_admin, $user_id);

        /* fetch value */
        mysqli_stmt_fetch($stmt);

        /* close statement */
        mysqli_stmt_close($stmt);
    }

    //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($username_fetched !== null) {
        $_SESSION['username'] = $username_fetched;
        $_SESSION['is_admin'] = $is_admin;
        $_SESSION['user_id'] = $user_id;
    } else {
        //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
    }
}

mysqli_close($connection);
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])) {
    header("Location: /hotel/home.php");
} else {
    //3.2 When the user visits the page first time, simple login form will be displayed.
?>
    <html>

    <head>
        <title>User Login Using PHP & MySQL</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="styles.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="container">
            <form class="form-signin" method="POST">
                <?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                <h2 class="form-signin-heading">Please Login</h2>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>

    </body>

    </html>
<?php } ?>