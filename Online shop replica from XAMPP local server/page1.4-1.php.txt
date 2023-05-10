<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <!--I, Yonatan Asfaw, student number 000797652, certify that this material is my original work.
No other person's work has been used without due acknowledgment and I have not made my work available to -->
</head>
<style>
    a:link{
        color: red;
        background-color: transparent;
        text-decoration: none
    }
    a:hover {
    color: orange;
    background-color: transparent;
    }
    body{
        display: grid;
        grid-template-columns: 1fr 3fr 1fr;
    }
    header{
        font: italic small-caps bold 16px/2 cursive;
        background-color: #FF8C00;
        grid-column: 1 / span 3;
		grid-row: 1;
        font-size: 3em;
    }
    nav{
        font-size: large;
        background-color: #808080;
        grid-column: 1;
        grid-row: 2;
        text-align: center;
        color: white;
        padding-top: 50px;
    }
    #php{
        grid-column: 2;
		grid-row: 2;
    }
    .chart{
        grid-column: 3 / span 1;
		grid-row: 2;
        text-align: center;
    }
    .cart{
        text-align: center;
        font-size: 4em;
        padding-top: 50px;
    }
    
</style>
<body>
    <header> Yon's Electonics Shop</header>
    <nav><a HREF = "index.php" >Home</a><br> Catagories <br> <a HREF = "page1.1.php" >TV</a><br> <br> <a HREF = "page1.2.php" >Sound Syetem</a> <br><br> <a HREF = "page1.3.php">Unlocked Phone</a> <br><br><a HREF = "page1.4.php">Lap Top</a> <br></nav>
    <div id = php>
    <?php
    $dsn = 'mysql:dbname=sa000797652;host=localhost';
    $dbUser = 'sa000797652';
    $password = 'Sa_19961027';
    $db = new PDO($dsn,$dbUser,$password);
    $type = "TV";
    $query_string = "SELECT * FROM catalogue WHERE product_name LIKE '%core%'";
    $cursor = $db->query($query_string);
    

    while ( $data = $cursor->fetchObject() ) {

       echo "<table class = \"table\"><tr>";
        echo "<td>";
        echo $data->product_name;
        echo "</td><td>";
        echo $data->product_price;
        echo "</td><td>";
        echo "<button onclick=\"doAdd('$data->product_name')\" >Add To List</button>";
        echo "</tr></table>";
      
    }
?>
</div>

<div class= chart>
<?php
//// checkout button takes to cart page 
    echo"<div class = cart> &#x1f6d2; </div>";
    echo "<form action='page3.php' method='POST'>";
    echo "<input type='hidden' name='index' value=''>";
    echo "<input type='submit' value='Check Out'>";
    ?></div>

</body>
</html>
