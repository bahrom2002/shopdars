<?php


include ('dbmysql.php');


function redirect($page){
    header('location: ' . $page . '.php');
}


function allProduct(){
    global $conn;
    $product = "SELECT * FROM product ";
    $products = $conn->query($product);
    return $products->fetch_all(MYSQLI_ASSOC);
}

function getProduct(){
    global $conn;
    $product = "SELECT * FROM product LIMIT 8 ";
    $products = $conn->query($product);
    return $products->fetch_all(MYSQLI_ASSOC);
}

function getCategoryName($id){
    global $conn;
    $sql = "SELECT name FROM category WHERE id = $id";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    return isset($result['name']) ? $result['name'] : '';
}

function getSlide(){
    global $conn;
    $slide = "SELECT * FROM slide ORDER BY level DESC ";
    $slides = $conn->query($slide);
    return $slides->fetch_all(MYSQLI_ASSOC);
}

function getPartners(){
    global $conn;
    $partners = "SELECT * FROM partners ORDER BY level DESC ";
    $partners = $conn->query($partners);
    return $partners->fetch_all(MYSQLI_ASSOC);
}

function getProductsCart($cart_products){
    global $conn;
    $ids = array_column($cart_products,'product_id');
    if (count($ids) > 0){
        $ids = implode(',', $ids);
        $product = "SELECT * FROM product WHERE id IN($ids)";
        $products = $conn->query($product);
        $products =  $products->fetch_all(MYSQLI_ASSOC);

        foreach ($products as $key => $value){
            foreach ($cart_products as $key2 => $value2){
                if($value2['product_id'] == $value['id']){
                    $products[$key]['count'] = $cart_products[$key2]['count'];
                }
            }
        }
        return $products;
    }else{
        return [];
    }

}

function getBuyStep(){
    global $conn;
    $buy_step = "SELECT * FROM buy_step ORDER BY level DESC ";
    $buy_steps = $conn->query($buy_step);
    return $buy_steps->fetch_all(MYSQLI_ASSOC);
}

function signup($username, $email, $password){
    global $conn;
    try {

        if (chekUsername($username)){
            return "'$username' logini ishlatilgan";
        }

        if (chekEmail($email)){
            return "'$email' email ishlatilgan";
        }

        $password = md5(md5($password));

        $inset_sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($inset_sql)){
            return true;
        }else{
            return false;
        }



    }catch (Exception $e){
        return $e->getMessage();;
    }
}


function chekUsername($username){
    global $conn;

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if($user !== null){
        return true;
    }else{
        return false;
    }

}

function chekEmail($email){
    global $conn;

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if($user !== null){
        return true;
    }else{
        return false;
    }

}

function login($username, $password){
    global $conn;
    $password = md5(md5($password));

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if($user === null){
        return false;
    }else{
        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['id'] = $user['id'];
        redirect('index');
    }

}

function createOrder(){

    global $_SESSION, $conn;

    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO orders(user_id, required_date) VALUES ($user_id, NOW() + INTERVAL 2 DAY)";

    if ($conn->query($sql)){

    createOrderDetail($_SESSION['cart']['products'],$conn->insert_id);

    redirect('cart');
    }
}

function createOrderDetail($products, $order_id){
    global $conn;


    foreach ($products as $product){
        $id = $product['product_id'];
        $count = $product['count'];
        $price = getPrice($id);


        $sql = "INSERT INTO order_detail(order_id, product_id, quantity, priceEach)
                 VALUES ($order_id, $id, $count, '$price')";

        $conn->query($sql);
    }
           unset($_SESSION['cart']);
}

function getPrice($id){
    global $conn;

    $sql = "SELECT price FROM product WHERE id = $id ";

     $result = $conn->query($sql);
     $product = $result->fetch_assoc();
     return $product['price'];

}