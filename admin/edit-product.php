<?php session_start();
if (!isset($_SESSION['user']['username'])){
    header('location: login.php');
}
?>

<?php require ('sections/head.php'); ?>

<!-- Navigation-->
<?php require('sections/menu.php'); ?>

<!-- Header-->
<?php // require ('sections/header.php'); ?>

<?php include ('../dbmysql.php'); ?>

<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $get_product_sql = "SELECT * FROM product WHERE id = {$id}";
        $get_product = $conn->query($get_product_sql);
        $get_product = $get_product->fetch_assoc();
    }


        if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])
            && isset($_POST['category_id']) && isset($_POST['instock'])
            && isset($_POST['description'])){

            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $instock = $_POST['instock'];
            $description = $_POST['description'];

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
                        header( "Location: product.php");
                  }
    }

                $cat_list = "SELECT * FROM category";
                $cat_list = $conn->query($cat_list);
                $cat_list = $cat_list->fetch_all(MYSQLI_ASSOC);
        ?>
<!-- Section-->
<section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <h1>Mahsulotlarni yangilash</h1>
        <form action="edit-product.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $get_product['id'] ?>">
                <label for="name" class="form-label"> Mahsulot nomi</label>
                <input name="name" value="<?= isset($get_product['name']) ? $get_product['name'] : ''  ?>" type="text" class="form-control" id="name" placeholder="Mahsulot nomi">
            </div>
            <div class="mb-3">
            <label for="image" class="form-label"> Mahsulot nomi</label>
            <input name="image" value="<?= isset($get_product['image']) ? $get_product['image'] : ''?>" type="file" class="form-control" id="image" placeholder="Mahsulot rasmi">
        </div>
            <div class="mb-3">
                <label for="price" class="form-label"> Mahsulot narxi</label>
                <input name="price" value="<?= isset($get_product['price']) ? $get_product['price'] : ''?>" type="text" class="form-control" id="price" placeholder="Mahsulot narxi">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label"> Kategoriyalar</label>
                <select class="form-select" name="category_id">
                    <?php  foreach ($cat_list as $cat):?>
                        <?php if ($get_product['category_id'] == $cat['id']): ?>
                        <option selected value="<?= $cat['id']?>"><?= $cat['name']?></option>
                        <?php else: ?>
                            <option  value="<?= $cat['id']?>"><?= $cat['name']?></option>
                            <?php endif; ?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label for="instock" class="form-label"> Mahsulot miqdori</label>
                <input name="instock" value="<?= isset($get_product['instock']) ? $get_product['instock'] : '' ?>" type="text" class="form-control" id="instock" placeholder="Mahsulot miqdori">
            </div>

            <div class="mb-3">
                <label for="description">Mahsulot haqida</label>

                <textarea id="description" name="description" value="<?= isset($get_product['description']) ? $get_product['description'] : '' ?>"
                class="form-control" rows="4" cols="50"><?= isset($get_product['description']) ? $get_product['description'] : '' ?></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Saqlash">
            </div>
        </form>
    </div>
</section>
<!-- Footer-->
<?php require ('sections/footer.php'); ?>



