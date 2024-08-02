<?php
include("header.php");
?>
<body>
    <section id="foodies" class="my-5">
        <div class="container my-5 py-5">
    
          <div class="section-header d-md-flex justify-content-between align-items-center">
            <h2 class="display-3 fw-normal">BIRDS</h2>
            <div class="mb-4 mb-md-0">
              <p class="m-0">
                <button class="filter-button me-4  active" data-filter="*">ALL</button>
                <button class="filter-button me-4 " data-filter=".cat">BIRDS 1</button>
                <button class="filter-button me-4 " data-filter=".dog">BIRDS 2</button>
                <button class="filter-button me-4 " data-filter=".bird">BIRDS 3</button>
              </p>
            </div>
            <div>
              <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                shop now
                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                  <use xlink:href="#arrow-right"></use>
                </svg></a>
            </div>
          </div>
    
          <div class="isotope-container row">
          <?php
                    $query = "SELECT * FROM `pets` WHERE category_id=3;";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
    
            <div class="item cat col-md-4 col-lg-3 my-4">
              <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                New
              </div> -->
              <div class="card position-relative">
                <a href="filter1.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $row['image']; ?>" class="img-fluid rounded-4" alt="image"></a>
                <div class="card-body p-0">
                  <a href="filter1.php?id=<?php echo $row['id'] ?>">
                    <h3 class="card-title pt-4 m-0"><?php echo $row['name']; ?></h3>
                  </a>
                  <?php
                  $user = "SELECT * FROM `users` WHERE id={$row['user_id']};";
                  $u_result = mysqli_query($con, $user);
                  $u_row = mysqli_fetch_assoc($u_result)?>
    
                  <div class="card-text">
                    <span class="rating secondary-font">
                    <?php echo $u_row['name']; ?></span>
    
                    <h3 class="secondary-font text-primary">PKR.<?php echo $row['price']; ?></h3>
    
                    <div class="d-flex flex-wrap mt-3">
                      <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                      </a>
                      <a href="#" class="btn-wishlist px-4 pt-3 ">
                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                      </a>
                    </div>
    
    
                  </div>
    
                </div>
              </div>
            </div>
    
    
          </div><?php
                  }} ?>
        </div>
      </section>
      <?php
include("footer.php");
?>
</body>




