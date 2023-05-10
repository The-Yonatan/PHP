<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    body{
        display: grid;
        grid-template-columns: 1fr 3fr 1fr;
    }
    h1{
        font: italic small-caps bold 16px/2 cursive;
        background-color: #FF8C00;
        grid-column: 1 / span 3;
		grid-row: 1;
        font-size: 3em;

    }
    table{
        grid-column: 2;
		grid-row: 2;
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
    .spot{
        background-color: #FF8C00;
        color: Black;
        border: 2px solid black;
        margin: 20px;
        padding: 20px;
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
  <nav>Home <br> Catagories <br> <A HREF = "page1.1.php" >TV</A><br> <br> <A HREF = "page1.2.php" >Sound Syetem</A> <br><br> <A HREF = "page1.3.php">Unlocked Phone</A> <br><br><A HREF = "page1.4.php">Camaeras</A> <br></nav>
    <?php
    $fh = fopen("items.json", "rb");
    $data = "";
    while (!feof($fh)) {
        $data .= fread($fh, 4096);
    }
    fclose($fh);
    $items = json_decode($data, true);
    $a =  $_POST['index'];
            echo "<table class = \"table\"><tr>";
            echo "<td>";
            echo "<div class = spot><h2>Name</h2>{$items[$a]['name']}</div>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<div class = spot><h2>Model</h2>{$items[$a]['model']}</div>";
            echo "</td>";
            echo "</tr>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<div class = spot><h2>Price</h2>{$items[$a]['price']}</div>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<div class = spot><h2>Stock</h2>{$items[$a]['stock']} Items In Stock </div>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<div class = spot><h2>Dimensions</h2>{$items[$a]['dimension']}</div>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<div class = spot><h2>Overview</h2>{$items[$a]['overview']}</div>";
            echo "</td>";
            echo "</tr></table>";
        ?>
    <div class= chart>
    <?php
        echo"<div class = cart> &#x1f6d2; </div>";
        echo "<form action='page3.php' method='POST'>";
        echo "<input type='hidden' name='index' value=''>";
        echo "<input type='submit' value='Check Out'>";
    ?></div>
    
</body>
</html>