<html id = "html">
    <head>
        <title>create a querry</title>
        <script src="createQuery.js"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap.css">
    </head>
    
    <body id = "TheBody">
        <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="card shadow-lg">
                        <div class="card-body p-4 p-md-5">
        <?php
        
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        if(($username == "Tamir" && $password == "Eliyahu") || ($username == "Ziv" && $password == "Drukker"))
        {
            echo "<center>";
            echo "<h1 class='display-4' style='margin:10%'>The user $username has logged on successfully</h1>";
            echo "<input type='button' style='margin:2%' value='create a query' onclick='post(\"$username\", \"$password\")' class='btn btn-primary btn-lg'>";
            echo "<input type='button' style='margin:2%' value='show answers for queries' class='btn btn-primary btn-lg'>";
            echo '</center>';
        }
        else
        {
            echo "<center>";
            echo "<h1 class='display-4' style='margin:10%'>username or password is incorrect</h1>";
            echo '</center>';
        }

        ?>
    </body>
</html>