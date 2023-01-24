<!DOCTYPE html>
<html>
<body>

    <h1>MoJ Fruit Market</h1>

    <?php
        include 'db-connections.php';
        $conn = OpenCon();

        global $basket;
    ?>

    <?php
        /*if(isset($_POST['Add'])) {
            if (array_key_exists($_POST['Add'],$basket)){
                //if it exists as key then we already have one so increment by one

            }
            else{
                //add it to the array
                $basket[] = ["ID"=>$_POST['Add'], "Quant"=>1];
                echo $basket;
            }

        }*/
        //add it to the array
        if(isset($_POST['Add'])) {
            $basket[] = [$_POST['Add']=>1];
            echo var_dump($basket);
        }
    ?>

    <p>Please select which products you'd like to buy</p>
    <?php 
        //Query database for items 
        $sql = "SELECT * FROM products";
        $items = $conn->query($sql);

        if ($items->num_rows > 0)
        {
            ?><form action="checkout-main.php" method="post"><?php

            while($item = $items->fetch_assoc()) 
            {
                echo "Product: " . $item["Name"]. " - Price: " . $item["Price"] . "<button type='submit' Name ='Add' value = ". $item["ID"] .">Add</button> <br><br>";
            }
        }
        else 
        {
            echo "No Products";
        }
        CloseCon($conn);
    ?>

</body>
</html>