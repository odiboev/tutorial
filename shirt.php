<?php include("inc/products.php");

//make sure get varibale exists

if (isset($_GET["id"])) {
  $product_id = $_GET["id"];
  if (isset($products[$product_id])) {
    $product = $products[$product_id];
  }
}
if (!isset($product)) {
  header("Location: shirts.php");
  exit();
}


// echo "<pre>";
// var_dump($product_id);
// var_dump($product);
// echo "</pre>";
// exit();

$section = "shirts";
$pageTitle = $product["name"];
include("inc/header.php"); ?>

  <div class="section page">
    <div class="wrapper">
      <div class="breadcrump"><a href="shirts.php">Shirts</a>&gt; <?php echo $product["name"]; ?></div>
      <div class="shirt-picture">
        <span>
          <img src="<?php echo $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
        </span>
      </div>
      <div class="shirt-details">
        <h1><span class="price">$<?php echo $product["price"]; ?></span> <?php echo $product["name"]; ?> </h1>
        <p class="note-designer">*All shirts made by ,e</p>
      </div>
    </div>
  </div>
