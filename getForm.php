<!DOCTYPE html>
<html>

<body>


    <?php

    // GET method
    $name = $_GET["name"];
    $email = $_GET["email"];

    echo "Welcome, $name <br>";
    echo "Your email is $email";

    // POST method

    $name_post = $_POST['name'];
    $email_post = $_POST['email'];

    echo "Welcome, $name_post <br>";
    echo "Your email is $email_post";

    ?>


</body>

</html>