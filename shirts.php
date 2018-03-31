<?php include("inc/products.php");
$pageTitle = "Mike's Shirts";
$section = "shirts";
include('inc/header.php'); ?>

    <div class="section shirts page">

      <div class="wrapper">
          <h1>Mike&rsquo;s Full Catalog of Shjirts</h1>

          <ul class="products">
            <?php foreach ($products as $product_id => $product) {
              echo get_list_view_html($product_id, $product);
            } ?>

          </ul>

      </div>


    </div>

<?php include('inc/footer.php'); ?>
