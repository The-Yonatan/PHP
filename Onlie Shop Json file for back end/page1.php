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
</head>
<style>
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
    <nav><A HREF = "page1.php" >Home</A><br> Catagories <br> <A HREF = "page1.1.php" >TV</A><br> <br> <A HREF = "page1.2.php" >Sound Syetem</A> <br><br> <A HREF = "page1.3.php">Unlocked Phone</A> <br><br><A HREF = "page1.4.php">Lap Top</A> <br></nav>
    <div id = php>
    <?php
    ///the following is a code block to open our jason file 
    $fh = fopen("items.json", "rb");
    $data = "";
    while (!feof($fh)) {
        $data .= fread($fh, 4096);
    }
    fclose($fh);
    $items = json_decode($data, true);
       /// our for loop here goes through all  items in our jason file and prints them all on our page
    for ( $i = 0; $i < count($items); $i++ ){
        echo "<table class = \"table\"><tr>";
        echo "<td>";
        echo $items[$i]["symbol"];
        echo "</td><td>";
        echo $items[$i]["name"];
        echo "<form action='page2.php' method='POST'>";
        echo "<input type='hidden' name='index' value='$i'>";
        echo "<input type='submit' value='details'>";
        echo"</form>";
        echo "<form action='added.php' method='POST'>";
        echo "<input type='hidden' name='index2' value='$i'>";
        echo "<input type='submit' value='add to cart'>";
        echo"</form>";
        echo "</td>";
        echo "</tr></table>";
       
      
        //echo "</br>";
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
