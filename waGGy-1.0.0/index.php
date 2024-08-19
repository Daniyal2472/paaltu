<?php
include("header.php");
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
                <a href="dogctg.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
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
                <a href="cat.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
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
                <a href="dogctg.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
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


  <section id="cat-food" class="my-5">
  <div class="container my-5 py-5">
    <div class="section-header d-md-flex justify-content-between align-items-center">
      <h2 class="display-3 fw-normal">Pets Food</h2>
      <div>
        <a href="foodctg.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
          Shop Now
          <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
            <use xlink:href="#arrow-right"></use>
          </svg>
        </a>
      </div>
    </div>
    
    <div class="isotope-container row">
      <?php
        $query = "SELECT * FROM `foods` WHERE category_id=1 LIMIT 4";
        $result = mysqli_query($con, $query);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="item cat col-md-4 col-lg-3 my-4">
        <div class="card position-relative">
          <a href="single-product.html"><img src="<?php echo $row['image']; ?>" class="img-fluid rounded-4" alt="<?php echo $row['name']; ?>"></a>
          <div class="card-body p-0">
            <a href="single-product.html">
              <h3 class="card-title pt-4 m-0"><?php echo $row['name']; ?></h3>
            </a>
            <div class="card-text">
              <span class="rating secondary-font">
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                5.0
              </span>
              <h3 class="secondary-font text-primary">PKR:  <?php echo htmlspecialchars($row['price']); ?></h3>
                            <div class="d-flex flex-wrap mt-3">
                                <a href="food_detail.php?id=<?php echo $row['id']; ?>" class="btn-cart me-3 px-4 pt-3 pb-3">
                                    <h5 class="text-uppercase m-0">Buy Now</h5>
                                </a>
                              
                            </div>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
        }
      ?>
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
          <a href="dogctg.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
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
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 07/10/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Amazing Pet Adoption Service!</p>
                        <p class="card-text pe-lg-5">The process was seamless, and my new puppy arrived in perfect health and full of energy. Thank you for the wonderful service!</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 06/19/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Top-Notch Pet Supplies!</p>
                        <p class="card-text pe-lg-5">The quality of pet supplies is excellent. Fast shipping and well-packaged products. Highly recommend for all pet owners!</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 06/16/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Perfect Pets and Products</p>
                        <p class="card-text pe-lg-5">Everything about my experience was perfect. The pet care guides were very helpful, and my new kitten is thriving!</p>
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
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 07/03/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Fantastic Pet Care!</p>
                        <p class="card-text pe-lg-5">The care and attention given to pets are outstanding. My new dog is happy and healthy thanks to this amazing service!</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 06/29/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Great Selection for Pets!</p>
                        <p class="card-text pe-lg-5">This site has a great selection of pet products. The delivery was prompt, and the items were well-packaged. Very satisfied!</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 06/23/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Happy with My New Pet!</p>
                        <p class="card-text pe-lg-5">My new pet is healthy and happy, thanks to the great care provided. Highly recommend this service for anyone looking for a new furry friend!</p>
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
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 05/03/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Perfect for Pet Lovers!</p>
                        <p class="card-text pe-lg-5">This store offers everything a pet lover could need. From food to toys, all items are of high quality and reasonably priced!</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date : 05/08/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Great Experience for Pet Shopping</p>
                        <p class="card-text pe-lg-5">Shopping for my pets was a breeze. The customer service was excellent, and the delivery was prompt and reliable.</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card pe-lg-5 ps-lg-5 bg-transparent border-0">
                        <p class="card-title text-end fw-bold pe-lg-5 pb-5">Date :05/04/23</p>
                        <span class="rating secondary-font">
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                          <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                        </span>
                        <p class="card-title h5 mb-2 fw-bold">Wonderful Service for Pets</p>
                        <p class="card-text pe-lg-5">The service provided was fantastic. The pets are well cared for, and the products are top-notch. Will definitely return!</p>
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

 
<section class="container pt-5 pb-5" id="planter">
  <!-- Heading Section -->
  <div class="row mb-5">
    <div class="col-12 text-center">
      <h2 class="display-3 fw-normal">OUR GALLERY</h2>
    </div>
  </div>

  <!-- Product Cards Section -->
  <div class="row">
    <!-- Dog Card -->
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/dog1.jpg" alt="Golden Retriever" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">Golden Retriever</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">Friendly and energetic, Golden Retrievers are known for their loving nature and intelligence. They make great family pets.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Cat Card -->
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/cat1.jpg" alt="Siamese Cat" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">Siamese Cat</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">Siamese cats are known for their striking blue eyes and sleek fur. They are vocal and affectionate, making them a favorite among cat lovers.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bird Card -->
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/bird1.jpg" alt="African Grey Parrot" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">African Grey Parrot</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">African Grey Parrots are known for their incredible intelligence and ability to mimic human speech. They are playful and require a lot of social interaction.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Fish Card -->
    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
      <div class="flip-card w-100 bg-transparent mt-5 products">
        <div class="product flip-card-inner position-relative text-center shadow-lg w-100 h-100">
          <div class="flip-card-front">
            <img src="images/fish 1.jpg" alt="Angelfish" class="w-100">
          </div>
          <div class="flip-card-back">
            <h3 class="fw-bold text-bg">Angelfish</h3>
            <p class="text-dark h5 ps-3 pe-3 fw-bold mb-4">Angelfish are known for their striking colors and elegant fins. They make a beautiful addition to any aquarium and are relatively easy to care for.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
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
              <a href="tel:+1234567890" class="d-flex align-items-center">
               <iconify-icon class="social-icon me-2" icon="ri:phone-fill"></iconify-icon>
             <span>Call Us: 123-456-7890</span>
              </a>
              <p  class="ps-5"></p>

              <a href="mailto:PALTOO@gmail.com" class="d-flex align-items-center">
  <iconify-icon class="social-icon me-2" icon="mdi:email"></iconify-icon>
  <span>Email: PALTOO@gmail.com</span>
</a>


             
             <p  class="ps-5">
             <a href="#">
                    <iconify-icon class="social-icon" icon="ri:facebook-fill"></iconify-icon>
                  </a>
                  <a href="#">
                    <iconify-icon class="social-icon" icon="ri:twitter-fill"></iconify-icon>
                  </a>
                  <a href="#">
                    <iconify-icon class="social-icon" icon="ri:instagram-fill"></iconify-icon>
                  </a>
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
          <div class="text-center ms-lg-5 me-lg-5 text-white pt-lg-5 animated-slide">
            <p class="display-4">Welcome to Your Pet's New Favorite Place</p>
            <p class="lead">Explore our vast selection of premium pet products. From toys to treats, we have everything your furry friend needs to live their best life. Enjoy five generations of expertise in pet care, all delivered right to your doorstep.</p>
          </div>
        </div>
        <div class="col-12">
          <div class="text-center justify-content-center pt-5">
            <a href="shopnow.php" class="btn-shop btn-animated" role="button">SHOP NOW</a>
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
