<?php 
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['username']) || !isset($_SESSION['email'])){
      header("Location: index.php");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name']; ?></h1>

    <a href="logout.php">Log out</a>
</body>
</html>