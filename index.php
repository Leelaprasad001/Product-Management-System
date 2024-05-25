<?php include('header.php');
?>
<!doctype html>
<html lang="en">
  
  <body>
      <section class="main">
          <div class="container">
              <div class="row d-flex align-items-center justify-content-center pt-5">
                <div class="col-md-7 pt-5" data-aos="fade-up" data-aos-duration="1000">
                  <h1 class="font-weight-bold">Find the Best Products for Your Needs</h1>
                  <p class="font-weight-normal">"Excellence is not a skill, it's an attitude." - Ralph Marston</p>
                  <a href="#products">
                      <button class="btn btn-primary">Browse Now</button>
                  </a>
                  <a href="dashboard.php">
                    <button class="btn btn-success">Add New</button>
                  </a>
                </div>
                <div class="col-md-5 pt-5" data-aos="zoom-in">
                    <img src="assets/img/bgside.png" alt="Image" class="">
                </div>
              </div>
          </div>
      </section>

      <section id="products">
          <div class="container">
            <div class="row">
              <div class="col-md-12 pb-3 m1" data-aos="zoom-in" data-aos-delay="200">
                <h4 class="text-center">Explore Your Products🚀</span></h4>
              </div>
            </div>

              <?php
                echo '<div class="row mt-5 mb-5" id="addProduct">';
                if (!empty($products)) {
                foreach ($products as $product) {
                    echo '
                    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card">
                          <img src="assets/uploads/' . $product['image'] . '" class="card-img-top" alt="Product Image">
                          <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <h5 class="card-title">' . $product['product_name'] . '</h5>
                                  <a><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#productContent' . $product['product_id'] . '">View More</button></a>
                              </div>
                              <div class="collapse pt-5" id="productContent' . $product['product_id'] . '">
                                <h6 class="card-subtitle mb-2 text-muted">Category: ' . $product['category'] . '</h6>
                                <p class="card-text">Price: $' . $product['price'] . '</p>
                                <p class="card-text">Quantity: ' . $product['quantity'] . '</p>
                              </div>
                          </div>
                        </div>
                    </div>';
                }
                }else {
                  echo '
                  <div class="col-md-12 pb-3 m1" data-aos="zoom-in" data-aos-delay="200">
                    <h6 class="text-center">No products available in Database</span></h6>
                  </div>';
                }
                echo '</div>';
              ?>
          </div>
      </section>
      <footer class="text-center">
        <hr>
        <p>&copy;Leela Prasad Bantu (leelaprasad1607@gmail.com)</p>
      </footer>
          
  </body>
</html>