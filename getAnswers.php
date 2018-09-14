<?php include 'checkLogin.php'; ?>
<html id = "html">
    <head>
        <title>Your Queries</title>
        <meta charset="utf-8">
        <script src="menu.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body id = "TheBody">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9">
                <div class="card shadow-lg">
                    <div class="card-body p-4 p-md-5">


<?php
        
        $db = new SQLite3("database.db");

        $guidsArr = getUserForms($db);

        $guidsArr = explode("&&", $guidsArr);

        for($i = 0; $i < count($guidsArr) && $guidsArr[0] != ""; $i++)
        {  
            echo "<a href='answerQuery.php?id=$guidsArr[$i]'>Form $i </a>";
            echo getRemoveBtn($guidsArr[$i]);
            echo "<br>";
        }
        

        if(count($guidsArr) < 1 || $guidsArr[0] == "")
        {
            echo "<h1>You dont have any forms at all!!<br> here is a meme:</h1>";
            echo "<img src =\"https://o.aolcdn.com/images/dims?quality=100&image_uri=http%3A%2F%2Fo.aolcdn.com%2Fhss%2Fstorage%2Fmidas%2F9177f1bff2326923725e0ed737583830%2F201851840%2Fputinmeme02.jpg&client=amp-blogside-v2&signature=2db82d820402a90ec78b04a70752172afbb38739\">\n";
        }

        function getUserForms($db)
        {
            if (isset($_COOKIE["ronUName"]) && isset($_COOKIE["ronPass"]))
            {
                $username = $_COOKIE["ronUName"];
                $password = $_COOKIE["ronPass"];
            }
            else
            {
                echo '<script> window.location.href = "index.htm"; </script>';
            }
            
            $getQuery = "SELECT guid FROM _users WHERE uName=? AND uPass=?";
            $statement = $db->prepare($getQuery);

            $statement->bindValue(1, $username);
            $statement->bindValue(2, $password);
            $result = $statement->execute();

            $row = $result->fetchArray(SQLITE3_ASSOC);
            if(isset($row["guid"]))
            {
                return $row["guid"];
            }
            else
            {
                return "";
            }
        }
        
        function getRemoveBtn($guid) {
            //const
            return "<input type='button' id='rem$guid' onclick='removeQuery(\"$guid\")' style='margin:auto;line-height: 0px;background-color: red;border-color: red;text-align:left;' value='X' class='btn btn-primary btn-lg'>";
        }
?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>