<?php
require 'bootstrap.php';

$message = NULL;
if('POST' == $_SERVER['REQUEST_METHOD']) {
    $user = new Users($_POST);

    if($user->login()) {
        header('Location: /index.php');
    }
    else {
        $message = 'Check your credentials.';
    }
}
?>
<!doctype html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>

    <title>Log in</title>

</head>

<body class="text-center">
<?php include("Funciones/menulogin.php")?>
<?php if(!is_null($message)): ?>

    <h3><?php echo $message; ?></h3>

<?php endif; ?>
<br>
<br>
<br>
<br>
<form  action="login.php" method="post" class="form-signin">


<div class="form-group">
    <label for="username">Username</label> 
    <input type="text"  class="form-control" name="username" id="username" autocomplete="off" /><br>

    </div >

    <div   class="form-group">
    <label for="password">Password</label> 
    <input type="password"   class="form-control" name="password" id="password" autocomplete="off" /><br>
    </div >

   
   <div>
<input type="submit" class="btn btn-outline-success" value="Log-in">


</div>

</form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>