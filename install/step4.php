<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install USOC</title>
    <link href="css.css" rel="stylesheet" />
</head>
<body>
    <?php
        if(isset($_POST["Field"])){
            $_SESSION["password"] = $_POST["Field"];
        }elseif(!isset($_SESSION["password"])){
            header("Location: step3.php");
        }
    ?>   
    <form action="step5.php" method="post" id="form">
        <label for="Field" id="p1">Description of the Website:</label>
        <input name="Field" id="p2" type="text" required value="<?php echo isset($_SESSION["site.description"]) ? $_SESSION["site.description"]:"";?>" />
    </form>
    <div id="p3">
        <button onClick="location.href = 'step3.php'">← Back</button>
        <input type="submit" form="form" style="top:55%;" value="Next step →" />
    </div>
</body>
</html>