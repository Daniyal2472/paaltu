<?php
include("header.php");
if(isset($_SESSION['status'])){?>
<script>
  swal({
  title: "<?php echo $_SESSION['status']; ?>!",
  icon: "success",
  button: "Okay",
});
</script>
  
  <?php
  unset($_SESSION['status']);
  }
?>

  <section id="banner" style="background: #F9F3EC;">
    <div class="container">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="images/banner-img.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                <h2 class="banner-title display-1 fw-normal">Best destination for <span class="text-primary">your
                    pets</span>
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  shop now
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg></a>
              </div>

            </div>
          </div>
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="images//banner-img3.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                <h2 class="banner-title display-1 fw-normal">Best destination for <span class="text-primary">your
                    pets</span>
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  shop now
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg></a>
              </div>

            </div>
          </div>
          <div class="swiper-slide py-5">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="images/banner-img4.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                <h2 class="banner-title display-1 fw-normal">Best destination for <span class="text-primary">your
                    pets</span>
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  shop now
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg></a>
              </div>

            </div>
          </div>
        </div>

        <div class="swiper-pagination mb-5"></div>

      </div>
    </div>
  </section>

  

  <section id="categories">
    <div class="container my-3 py-5">
      <div class="row my-5">
        <div class="col text-center">
          <a href="foodctg.php" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bowl-food"></iconify-icon>
            <h5>Foodies</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="Birdsctg.php" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:bird"></iconify-icon>
            <h5>Bird Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="dogctg.php" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
            <h5>Dog Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="fishesctg.php" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:fish"></iconify-icon>
            <h5>Fish Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="cat.php" class="categories-item">
            <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
            <h5>Cat Shop</h5>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="clothing" class="my-5 overflow-hidden">
    <div class="container pb-5">

      <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
        <h2 class="display-3 fw-normal">Pet Clothing</h2>
        <div>
          <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
            shop now
            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
              <use xlink:href="#arrow-right"></use>
            </svg></a>
        </div>
      </div>

      <div class="products-carousel swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div>
            <div class="card position-relative">
              <a href="filter1.php"><img src="images/item1.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="filter1.php">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item2.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              -10%
            </div>
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item3.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item4.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item7.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item8.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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

        </div>
      </div>
      <!-- / products-carousel -->


    </div>
  </section>

  <section id="foodies" class="my-5">
    <div class="container my-5 py-5">

      <div class="section-header d-md-flex justify-content-between align-items-center">
        <h2 class="display-3 fw-normal">Pet Foodies</h2>
        <div class="mb-4 mb-md-0">
          <p class="m-0">
            <button class="filter-button me-4  active" data-filter="*">ALL</button>
            <button class="filter-button me-4 " data-filter=".cat">CAT</button>
            <button class="filter-button me-4 " data-filter=".dog">DOG</button>
            <button class="filter-button me-4 " data-filter=".bird">BIRD</button>
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

        <div class="item cat col-md-4 col-lg-3 my-4">
          <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item9.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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

        <div class="item dog col-md-4 col-lg-3 my-4">
          <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div>
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item10.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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

        <div class="item dog col-md-4 col-lg-3 my-4">
          <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item11.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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

        <div class="item cat col-md-4 col-lg-3 my-4">
          <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            Sold
          </div>
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item12.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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

        <div class="item bird col-md-4 col-lg-3 my-4">
          <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item13.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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

        <div class="item bird col-md-4 col-lg-3 my-4">
          <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item14.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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

        <div class="item dog col-md-4 col-lg-3 my-4">
          <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            Sale
          </div>
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item15.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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

        <div class="item cat col-md-4 col-lg-3 my-4">
          <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
            New
          </div> -->
          <div class="card position-relative">
            <a href="single-product.html"><img src="images/item16.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-product.html">
                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
              </a>

              <div class="card-text">
                <span class="rating secondary-font">
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  5.0</span>

                <h3 class="secondary-font text-primary">$18.00</h3>

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


      </div>


    </div>
  </section>

  <section id="banner-2" class="my-3" style="background: #F9F3EC;">
    <div class="container">
      <div class="row flex-row-reverse banner-content align-items-center">
        <div class="img-wrapper col-12 col-md-6">
          <img src="images/banner-img2.png" class="img-fluid">
        </div>
        <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
          <div class="secondary-font text-primary text-uppercase mb-3 fs-4">Upto 40% off</div>
          <h2 class="banner-title display-1 fw-normal">Clearance sale !!!
          </h2>
          <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
            shop now
            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
              <use xlink:href="#arrow-right"></use>
            </svg></a>
        </div>

      </div>
    </div>
  </section>

  <section id="service">
    <div class="container py-5 my-5">
      <div class="row g-md-5 pt-4">
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:shopping-cart"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">Free Delivery</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:user-check"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">100% secure payment</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:tag"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">Daily Offer</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary" icon="la:award"></iconify-icon>
            </div>
            <h3 class="card-title py-2 m-0">Quality guarantee</h3>
            <div class="card-text">
              <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>

  <section class="bg-gray-light" id="info" style="background: url('images/background-img.png') no-repeat;">
    <section class="container-fluid pb-5 pt-5">
      <div class="row">
        <div class="col-12">
          <div class="text-center">
            <p class="h1 text-bg">WELCOME TO OUR PET FAMILY</p>
          </div>
        </div>
        <div class="col-12">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item">
                <div class="container">
                  <div class="row pt-5">
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">07/10/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">Bloomscape did a wonderful job</p>
                        <p class="card-text pe-lg-5">Bloomscape did a wonderful job in packaging this snake plant and shipping it safely to my niece and nephew as a housewarming gift....</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">06/19/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">High quality plants. Well packaged.</p>
                        <p class="card-text pe-lg-5">High quality plants. Well packaged. Fast shipping. Great price value</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">06/16/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">Every single thing about this</p>
                        <p class="card-text pe-lg-5">Every single thing about this plant was perfect. Plan on ordering more.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item active">
                <div class="container">
                  <div class="row pt-5">
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">07/03/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">Great plants, fantastic customer service!</p>
                        <p class="card-text pe-lg-5">Patch plants are well priced while also being of good quality. Plant pots are fa...</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">06/29/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">Not sure what plant to buy?</p>
                        <p class="card-text pe-lg-5">This site is very informative and easy to use.  Prompt delivery and well package...</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">06/23/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">Nice healthy plants</p>
                        <p class="card-text pe-lg-5">Nice healthy plants</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="container">
                  <div class="row pt-5">
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">05/03/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">Lovely plants with detailed…</p>
                        <p class="card-text pe-lg-5">Lovely plants with detailed instructions on how to look after them!</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">05/08/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">I bought a plant for a birthday gift</p>
                        <p class="card-text pe-lg-5">I bought a plant for a birthday gift. The plant arrived safely that in excellent...</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">05/04/23</p>
                        <h4 class="card-title mb-1">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </h4>
                        <p class="card-title h5 mb-2 fw-bold">The plant looks great</p>
                        <p class="card-text pe-lg-5">The plant looks great, is as big as expected ( a bit bushier) and in a perfect c...</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="color-green h1" aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="color-green h1" aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </section>
  </section>

    <div class="bg-gray-light mt-5"style="background: url('images/background-img.png') no-repeat;">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="text-center d-flex pb-5 mt-5">
             <h3
            
          data-aos-easing="ease-in-sine" class="fw-bold text-bg font-f">We're Here to Help! With 24/7 <br> Customer Support</h3>
             <div
              class="ms-auto pt-4 d-flex color-green">
               <p  class=" ps-5"><i class="fa-solid fa-phone"></i> 03194085676</p>
             <p  class="ps-5"><i class="fa-solid fa-envelope"></i> PALTOO@gmail.com</p>
             <p  class="ps-5">
             <a href="https://www.facebook.com/" class="color-green"><i class="fa-brands fa-facebook ps-3"></i></a>
             <a href="https://www.instagram.com/" class="color-green"><i class="fa-brands fa-instagram ps-3"></i></a>
             <a href="https://twitter.com/?lang=en" class="color-green"><i class="fa-brands fa-twitter ps-3"></i></a>
           </p>
             </div>
            </div>
       </div>
        </div>
      </div>
      </div>


  <section id="bestselling" class="my-5 overflow-hidden">
    <div class="container py-5 mb-5">

      <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
        <h2 class="display-3 fw-normal">Best selling products</h2>
        <div>
          <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
            shop now
            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
              <use xlink:href="#arrow-right"></use>
            </svg></a>
        </div>
      </div>

      <div class=" swiper bestselling-swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item5.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item6.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              Sale
            </div>
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item7.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item8.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              -10%
            </div>
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item3.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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
          <div class="swiper-slide">
            <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
            <div class="card position-relative">
              <a href="single-product.html"><img src="images/item4.jpg" class="img-fluid rounded-4" alt="image"></a>
              <div class="card-body p-0">
                <a href="single-product.html">
                  <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                </a>

                <div class="card-text">
                  <span class="rating secondary-font">
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                    5.0</span>

                  <h3 class="secondary-font text-primary">$18.00</h3>

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


        </div>
      </div>
      <!-- / category-carousel -->


    </div>
  </section>

  <section class="image-fixed mb-lg-5">
    <div class="bg-blackdark">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="text-center ms-lg-5 me-lg-5 text-white pt-lg-5 animated">
              <p>Welcome to a big <br> pet family</p>
              <p>Bigger, better pet. Delivered straight to you. <br> Backed by five generations of grow-how.</p>
            </div>
          </div>
          <div class="col-12">
            <div class="text-center justify-content-center ">
              <a href="#product" class="btn-shop" role="button">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var section = document.querySelector('.image-fixed');
      section.classList.add('animated');
    });
  </script>  





<section class="container" id="planter">
  <!-- Heading Section -->
  <div class="row mb-5">
    <div class="col-12 text-center">
      <h2 class="display-3 fw-normal">OUR GALLERY</h2>
    </div>
  </div>

  <!-- Product Cards Section -->
  <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/Pet-Friendly.jpg" alt="image not found" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">Cacti &amp; Succulents</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">Delightful succulent with spiked blue-green leaves Easy and graceful, with lush dark green fronds</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/Pet-Friendly.jpg" alt="image not found" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">Cacti &amp; Succulents</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">Delightful succulent with spiked blue-green leaves Easy and graceful, with lush dark green fronds</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/Pet-Friendly.jpg" alt="image not found" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">Cacti &amp; Succulents</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">Delightful succulent with spiked blue-green leaves Easy and graceful, with lush dark green fronds</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/Pet-Friendly.jpg" alt="image not found" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">Cacti &amp; Succulents</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">Delightful succulent with spiked blue-green leaves Easy and graceful, with lush dark green fronds</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <section id="latest-blog" class="my-5">
    <div class="container py-5 my-5">
      <div class="row mt-5">
        <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
          <h2 class="display-3 fw-normal">Latest Blog Post</h2>
          <div>
            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
              Read all
              <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                <use xlink:href="#arrow-right"></use>
              </svg></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 my-4 my-md-0">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">20</h3>
            <p class="secondary-font fs-6 m-0">Feb</p>

          </div>
          <div class="card position-relative">
            <a href="single-post.html"><img src="images/blog1.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-post.html">
                <h3 class="card-title pt-4 pb-3 m-0">10 Reasons to be helpful towards any animals</h3>
              </a>

              <div class="card-text">
                <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the incubators of
                  our greatest
                  achievements, and the best hope for a sustainable future.</p>
                <a href="single-post.html" class="blog-read">read more</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-4 my-4 my-md-0">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">21</h3>
            <p class="secondary-font fs-6 m-0">Feb</p>

          </div>
          <div class="card position-relative">
            <a href="single-post.html"><img src="images/blog2.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-post.html">
                <h3 class="card-title pt-4 pb-3 m-0">How to know your pet is hungry</h3>
              </a>

              <div class="card-text">
                <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the incubators of
                  our greatest
                  achievements, and the best hope for a sustainable future.</p>
                <a href="single-post.html" class="blog-read">read more</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-4 my-4 my-md-0">
          <div class="z-1 position-absolute rounded-3 m-2 px-3 pt-1 bg-light">
            <h3 class="secondary-font text-primary m-0">22</h3>
            <p class="secondary-font fs-6 m-0">Feb</p>

          </div>
          <div class="card position-relative">
            <a href="single-post.html"><img src="images/blog3.jpg" class="img-fluid rounded-4" alt="image"></a>
            <div class="card-body p-0">
              <a href="single-post.html">
                <h3 class="card-title pt-4 pb-3 m-0">Best home for your pets</h3>
              </a>

              <div class="card-text">
                <p class="blog-paragraph fs-6">At the core of our practice is the idea that cities are the incubators of
                  our greatest
                  achievements, and the best hope for a sustainable future.</p>
                <a href="single-post.html" class="blog-read">read more</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 
  

<?php
include("footer.php");
?>
</body>

</html>