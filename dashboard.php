<?php include('header.php');
?>
<!doctype html>
<html lang="en">
  <body>
      <div class="container">
        <br><br>
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
                        <h5 class="card-title">' . $product['product_name'] . '</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <form method="post">
                                <input type="hidden" name="product_id" value="' . $product['product_id'] .'">
                                <div class="btn-group" role="group">
                                  <button class="btn btn-danger mr-3" type="submit" name="delete">Delete</button>
                                  <button class="btn btn-success" type="button" name="edit" data-toggle="collapse" data-target="#editForm' . $product['product_id'] .'">Edit</button>
                                </div>
                            </form>
                            <a><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#productContent' . $product['product_id'] . '">View More</button></a>
                        </div>
                        <div class="collapse pt-5" id="productContent' . $product['product_id'] . '">
                          <h6 class="card-subtitle mb-2 text-muted">Category: ' . $product['category'] . '</h6>
                          <p class="card-text">Price: $' . $product['price'] . '</p>
                          <p class="card-text">Quantity: ' . $product['quantity'] . '</p>
                        </div>


                        <div class="collapse pt-5" id="editForm' . $product['product_id'] . '">
                          <form method="post" class="form" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" value="' . $product['product_id'] . '">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="' . $product['product_name'] . '" placeholder="Enter the product name..." required>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="quantity">Quantity</label>
                                  <input type="number" class="form-control" id="quantity" name="quantity" value="' . $product['quantity'] . '" placeholder="Enter the quantity" required>
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="price">Price</label>
                                  <input type="number" step="0.01" class="form-control" id="price" name="price" value="' . $product['price'] . '" placeholder="Enter the price" required>
                              </div>
                            </div>
                            <div class="form-group">
                                  <label for="category">Category</label>
                                  <input type="text" class="form-control" id="category" name="category" value="' . $product['category'] . '" placeholder="Enter the category" required>
                            </div>  
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <br>
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary  pl-5 pr-5"  name="update">Update</button>
                            </div>
                          </form>
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

        <div class="row mt-5 mb-5" id="addproduct">
          <div class="col-md-12 addproduct" data-aos="fade-up" data-aos-delay="200">
            <h4 class="text-center">Let's Add a New Product</h4><br>
            <form method="post" class="form" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter the product name..." required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter the quantity" required>
                    </div>
                </div>
                

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Enter the price" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter the category" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary pl-5 pr-5" name="submit">Submit</button>
                </div>
            </form>
          </div>
        </div>

      </div>
  </body>
  <footer class="text-center">
    <hr>
    <p>&copy;Leela Prasad Bantu (leelaprasad1607@gmail.com)</p>
  </footer>
</html>