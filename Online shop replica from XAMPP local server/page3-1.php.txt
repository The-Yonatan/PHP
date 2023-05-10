
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
    #price{
        grid-column: 3 / span 1;
		grid-row: 2;
        text-align: center;
        font-size: 2em;
        padding-top: 50px;
    }
</style>
<body>
    <header> Your Cart <div class = cart> &#x1f6d2; </div></header>
    <nav><a HREF = "index.php" >Home</a><br> Catagories <br> <a HREF = "page1.1.php" >TV</a><br> <br> <a HREF = "page1.2.php" >Sound Syetem</a> <br><br> <a HREF = "page1.3.php">Unlocked Phone</a> <br><br><a HREF = "page1.4.php">Lap Top</a> <br></nav>
    <div id = php>
    <?php
    ///the following is a code block to open our jason file 
          

    ///the following is an if if statment followed by foreach loop  that goes through the cart arry ( items that has been added to our cart) 
    ///the if statement chekes if we have any items in our cart 
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $c){
            echo "<table class = \"table\"><tr>";
            echo "<td>";
            echo "$c";
            echo "</td><td>";
            echo "<button onclick=\"dorem('$c')\" >Remove</button>";
            echo "</tr></table>";
            
}
            ?></div>
            <script>
                function dorem( id ) {
                        var req = new Request('added.php', 
                        { method: 'post', 
                        type: 'basic', 
                        headers: { "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"},
                     body: 'action=rem&id='+id
             });

            fetch( req )
             .then( response => {return response.text();})
            .then( remitem );
            function remitem( data ) {
                console.log("data: " + data );
                document.getElementById("php").innerHTML=data;
            }

}
            </script>
           <?php
        }
        
    /// if there is nothing is cart the else stament prints your cart is empty message         
    else{
    echo "cart is Empty";
    }
    
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
    <div id= price>
        
        <?php
        $price = 0;
        ob_start();
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $c){?>
            <script>
            document.getElementById("price").innerHTML=" ";
            </script>
            <?php
                $dsn = 'mysql:dbname=sa000797652;host=localhost';
                $dbUser = 'sa000797652';
                $password = 'Sa_19961027';
                $db = new PDO($dsn,$dbUser,$password);
                $query_string = "SELECT product_price FROM catalogue where product_name ='{$c}'";
                $cursor = $db->query($query_string);
                while ( $data = $cursor->fetchObject() ){
                $price = $price + $data->product_price;
                echo "TOTAL<br>";
                echo $price;
            }

            }
        }
        ?>
    </div>
    
</body>
</html>