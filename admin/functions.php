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
        $sql = "UPDATE category SET name = '$name', category_id = $category_id WHERE id = $id";
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
    $password = md5(md5($data['password']));
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
    $password = md5(md5($data['password']));
    $gender = $data['gender'];
    $email = $data['email'];

     $sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', username = '$username', phone = '$phone',
                 email = '$email', password = '$password', gender = '$gender' WHERE id = $id";

    if($conn->query($sql)){
        redirect('user');
    }
}

function addProduct($data){
    global $conn;

    $name = $data['name'];
    $price = $data['price'];
    $category_id = $data['category_id'];
    $instock = $data['instock'];
    $description = $data['description'];

    if (isset($_FILES['image'])){
        $folder = "../uploads/";
        $target_file = $folder . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $image_name = 'uploads/' . basename($_FILES["image"]["name"]);
        }

        $insert_sql = "INSERT INTO product (name,price,category_id, instock, description,image) 
                               VALUES ('$name', $price,$category_id, $instock,'$description', '$image_name')";

    }else{
        $insert_sql = "INSERT INTO product (name,price,category_id, instock, description) 
                                   VALUES ('$name', $price,$category_id, $instock,'$description')";

    }if ($conn->query($insert_sql)){
        redirect('product');
    }

}

function editProduct($data){
    global $conn;

    $id = $data['id'];
    $name = $data['name'];
    $price = $data['price'];
    $category_id = $data['category_id'];
    $instock = $data['instock'];
    $description = $data['description'];

    if (isset($_FILES['image'])){
        $folder = "../uploads";
        $target_file = $folder . basename($_FILES['image']["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $image_name = 'uploads/' . basename($_FILES["image"]["name"]);
        }
        $update_sql = "UPDATE product 
                               SET name = '$name', price = $price, category_id = $category_id, instock = '$instock', description = '$description', image = '$image_name'
                               WHERE id = $id";
    }else{
        $update_sql = "UPDATE product 
                               SET name = '$name', price = $price, category_id = $category_id, instock = '$instock', description = '$description' 
                               WHERE id = $id";
    }


    if($conn->query($update_sql)){
      redirect('product');
    }
}

function addSlide($data){
    global $conn;

    $name = $data['name'];
    $price = $data['price'];
    $level = $data['level'];
    $description = $data['description'];


    $folder = "../slides/";
    $target_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_name = 'slides/' . basename($_FILES["image"]["name"]);


        $insert_sql = "INSERT INTO slide (name,price,image, level, description) 
                               VALUES ('$name', $price,'$image_name', $level,'$description')";

    }else{
        $insert_sql = "INSERT INTO slide (name,price, level, description) 
                               VALUES ('$name', $price, $level,'$description')";
    }

    if ($conn->query($insert_sql)) {
        redirect('slide');

    }

}

function editSlide($data){
    global  $conn;

    $id = $data['id'];
    $name = $data['name'];
    $price = $data['price'];
    $level = $data['level'];
    $description = $data['description'];

    $folder = "../slides";
    $target_file = $folder . basename($_FILES['image']["name"]);


    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_name = 'slides/' . basename($_FILES["image"]["name"]);
    }

    $update_sql = "UPDATE slide 
                   SET name = '$name', price = $price,level = '$level',
                       description = '$description', image = '$image_name'
                   WHERE id = $id";

    if($conn->query($update_sql)){
       redirect('slide');
    }

}

function addPartners($level){
    global $conn;

    $level = $_POST['level'];

    $folder = "../partners/";
    $target_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_name = 'partners/' . basename($_FILES["image"]["name"]);


        $sql = "INSERT INTO partners(image, level)  VALUES('$image_name',$level)";

    }else{
        $sql = "INSERT INTO partners (level)  VALUES ($level)";
    }

    if ($conn->query($sql)) {
        redirect('partners');

    }
}

function addBuystep($data){
    global $conn;

    $name = $data['name'];
    $level = $data['level'];
    $description = $data['description'];

    $folder = "../buy_step/";
    $target_file = $folder . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_name = 'buy_step/' . basename($_FILES["image"]["name"]);


        $insert_sql = "INSERT INTO buy_step (name,image,level, description) 
                               VALUES ('$name','$image_name', $level,'$description')";

    }else{
        $insert_sql = "INSERT INTO buy_step (name, level, description) 
                               VALUES ('$name',,  $level,'$description')";
    }

    if ($conn->query($insert_sql)) {
        redirect('buy_step');

    }
}

function editBuystep($data){
    global $conn;

    $id = $data['id'];
    $name = $data['name'];
    $level = $data['level'];
    $description = $data['description'];

    $folder = "../buy_step";
    $target_file = $folder . basename($_FILES['image']["name"]);


    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_name = 'buy_step/' . basename($_FILES["image"]["name"]);

        $update_sql = "UPDATE buy_step SET name = '$name', level = '$level', description = '$description', image = '$image_name'
                               WHERE id = $id";
    }else{
        $update_sql = "UPDATE buy_step SET name = '$name', level = '$level', description = '$description'
                               WHERE id = $id";
    }
    if($conn->query($update_sql)){
       redirect('buy_step');
    }
}


