<?php
// define variables with empty values
$nameErr = $emailErr = ""; // used for error handling
$name = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
       
    } else {
        $name = comment_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
       
    } else {
      $email = comment_input($_POST["email"]);
    }
    $comment = comment_input($_POST["comment"]);
    $handle = fopen("comments.php", "a");
    fwrite($handle, "<b><i>" . $name . "</b></i> Said:<br />" . $comment . "<br />"); // $email not recorded on this website.
    fclose($handle);
}

// trim input data for above code (security)
function comment_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Post A Comment:</title>
    <link rel="stylesheet" href="/styles3.css">
    <style>
        .error {color: #FF0000;}
    </style>
</head>
    
<body>
    <div class="glowbox">
        <h2>Post A Comment:</h2>
        <span class="error">* required field</span>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return validate()">
            Name: <br /> <input id="field1" type="text" name="name">
            <span class="error">* <?php echo $nameErr;?></span> <br />
            Email: <i>(email not recorded.)</i> <br /> <input id="field2" type="text" name="email">
            <span class="error">* <?php echo $emailErr;?></span> <br />
            Comment: <br /> <textarea rows="10" cols="30" name="comment"></textarea> <br /> <br />
            <input type="submit" value="Post Comment">
        </form>
    </div>
    <div class="glowbox">
        <h2>Other Comments:</h2>
        <br />
        <?php
            include "comments.php";
        ?>
    </div>
<script type="text/javascript">
   function validate(){
       var field1 = document.getElementById('field1').value;
       var field2 = document.getElementById('field2').value;

        if(field1 != '' && field2 != '' ){
           return true;
         } else{
            alert('Type the required fields');
            return false;
         }
    }
</script>
</body>
    
