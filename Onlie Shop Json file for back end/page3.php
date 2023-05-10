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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <!--I, Yonatan Asfaw, student number 000797652, certify that this material is my original work.
No other person's work has been used without due acknowledgment and I have not made my work available to -->
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
    .price{
        grid-column: 3 / span 1;
		grid-row: 2;
        text-align: center;
        font-size: 2em;
        padding-top: 50px;
    }
</style>
<body>
    <header> Your Cart <div class = cart> &#x1f6d2; </div></header>
    <nav><A HREF = "page1.php" >Home</A><br> Catagories <br> <A HREF = "page1.1.php" >TV</A><br> <br> <A HREF = "page1.2.php" >Sound Syetem</A> <br><br> <A HREF = "page1.3.php">Unlocked Phone</A> <br><br><A HREF = "page1.4.php">Lap Top</A> <br></nav>
    <div class = php>
    <?php
    ///the following is a code block to open our jason file 
        $fh = fopen("items.json", "rb");
        $data = "";
        while (!feof($fh)) {
            $data .= fread($fh, 4096);
        }
        fclose($fh);
        $items = json_decode($data, true);


    ///the following is an if if statment followed by foreach loop  that goes through the cart arry ( items that has been added to our cart) 
    ///the if statement chekes if we have any items in our cart 
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $c){
            echo "{$items[$c]['name']}";
            echo  "<br>";}?></div>
           <?php
             $price = 0; 
           echo "<div class = \"price\">";
           foreach($_SESSION['cart'] as $c){
            $price =  $price + $items[$c]['price'];}
            echo "<p>TOTAL</p>".$price;
        
        
            }
    /// if there is nothing is cart the else stament prints your cart is empty message         
    else{
    echo "cart is Empty";}
    
    ?>
    
    <?php
    /// session destroy button that clears all the stored session 
    echo "<form action='page3.php' method='POST'>";
    echo "<input type='hidden' name='distroy' value=''>";
    echo "<input type='submit' value='Empty cart '>";
    if (isset($_POST['distroy'])){
    
        session_destroy();}
    ?>
    </div>
    
</body>
</html>