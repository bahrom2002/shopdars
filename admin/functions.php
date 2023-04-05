<?php
include '../dbmysql.php';

function deleteBuystep($id){
    global $conn;

    $delete_sql = "DELETE FROM buy_step WHERE id = {$id}";
    $conn->query($delete_sql);
   redirect('buy_step');
}


function deleteCategory($id){
    global $conn;
    $delete_sql = "DELETE FROM category WHERE id = {$id}";
    $conn->query($delete_sql);
    redirect('category');
}

function deletePartners($id){
    global $conn;

    $delete_sql = "DELETE FROM partners WHERE id = {$id}";
    $conn->query($delete_sql);
    redirect('partners');
}

function deleteProduct($id){
    global $conn;

    $delete_sql = "DELETE FROM product WHERE id= {$id}";
    $conn->query($delete_sql);
    redirect('product');
}

function deleteSlide($id){
    global $conn;

    $delete_sql = "DELETE FROM slide WHERE id= {$id}";
    $conn->query($delete_sql);
    redirect('slide');
}

function deleteUser($id){
    global $conn;

    $delete_sql = "DELETE FROM user WHERE id= {$id}";
    $conn->query($delete_sql);
    redirect('user');
}

function redirect($page){
    header('location: ' . $page . '.php');
}



function addCategory($name, $category_id = null){
    global $conn;

   if (is_null($category_id)){
      $insert_sql = "INSERT INTO category (name) VALUES ('$name')";
   }else{
       $insert_sql = "INSERT INTO category (name, category_id) VALUES ('$name', $category_id)";
   }
    $conn->query($insert_sql);
    redirect('category');


}

function editCategory($id, $name, $category_id = null){
    global $conn;

    if (is_null($category_id)){
        $sql = "UPDATE category SET name = '$name', category_id = {$category_id} WHERE id = {$id}";
    }else{
        $sql = "UPDATE category SET name = '$name' WHERE id = {$id}";
    }
    $conn->query($sql);
    redirect('category');
}

function categoryList(){
    global $conn;

    $sql = "SELECT * FROM category";
    $cat_list = $conn->query($sql);
    return $cat_list->fetch_all(MYSQLI_ASSOC);
}

function addUser($data){
    global $conn;

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $username = $data['username'];
    $phone = $data['phone'];
    $password = $data['password'];
    $gender = $data['gender'];
    $email = $data['email'];

    $sql = "INSERT INTO user(firstname, lastname, username, phone, email, password, gender) 
            VALUES ('$firstname', '$lastname', '$username', '$phone','$email', '$password', $gender)";

    if($conn->query($sql)){
        redirect('user');
    }
}

function editUser($data){
    global $conn;
    $id = $data['id'];
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $username = $data['username'];
    $phone = $data['phone'];
    $password = $data['password'];
    $gender = $data['gender'];
    $email = $data['email'];

     $sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', phone = '$phone',
                 email = '$email', password = '$password', gender = '$gender' WHERE id = $id";

    if($conn->query($sql)){
        redirect('user');
    }
}

function addSlide($data){
    global $conn;

    $name = $data['name'];
    $price = $data['price'];
    $level = $data['level'];
    $description = $data['description'];

    $sql = "INSERT INTO slide (name, price, level, description)
                    VALUES ($name, $price, $level, $description)";

    if($conn->query($sql)){
        redirect('slide');
    }
}

function addBuystep($name, $level, $description){
    global $conn;

    $sql = "INSERT INTO buy_step (name, level, description) 
                               VALUES ('$name',  $level,'$description')";

    if($conn->query($sql)){
        redirect('buy_step');
    }
}

