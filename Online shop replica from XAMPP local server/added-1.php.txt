<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--I, Yonatan Asfaw, student number 000797652, certify that this material is my original work.
No other person's work has been used without due acknowledgment and I have not made my work available to -->
</head>
<body>
    <?php
    /// he following code block checks if our session is empty and adds items we clicked add to cart button to our cart session array 
      /*  if(empty($_SESSION['cart'])){
        $_SESSION['cart']= array();
        }
        array_push($_SESSION['cart'],$_POST['index2'])*/
        $choice = filter_input( INPUT_POST, 'action', 
        FILTER_SANITIZE_SPECIAL_CHARS);
        $id = filter_input( INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS );
       if( empty($_SESSION['cart'])){
        $_SESSION['cart']= array();}
        if ( $choice == 'add' ) {
            array_push($_SESSION['cart'],$id);
            echo "ITEM ";
            echo $id;  
            echo "HAS BEEN ADDED SUCCESSFULY";
                     
        }
       
          else if ( $choice == 'rem' ) {
                // iterate over the session variable, and
                // output all the rows
                $id = filter_input( INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS );
        
                if ( $id && $id !== null ) {
                    //for ( $i=0; $i < count( $_SESSION['list'] ); $i++ ) {
                    foreach ( $_SESSION['cart'] as $c ) {
                        if ( $c == $id ) {
                            unset( $_SESSION['cart'][$c] );
                            break;
                        } }
        }
    }
    ?>
    
</body>
</html>