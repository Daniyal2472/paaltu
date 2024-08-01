<?php
include("header.php");
?>

<body>
    <!-- section breadcrumb top   -->
    <!-- home to Pet details -->

    <!-- Pet details -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="shadow-lg ms-5 bgg-gray mt-5 mb-5">
                    <img src="images/blog-lg1.jpg" alt="img not found" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="me-5 ms-4 pb-2 mt-5 border-bottom">
                    <p class="h2 blue-color">Bull Dog</p>
                    <p class="h5 mt-4 text-gray2 mb-0">Rs.138,900.00 PKR</p>
                    <p class="card-text text-yellow small mt-1">
                        <small>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </small>
                        <span class="ps-2 blue-color">No reviews</span>
                    </p>
                </div>
                <div class="p-2 ms-4 mt-2">
                    <p class="text-gray2">Age : 1 Year</p>
                    <button type="button" class="btn border border-2 text-gray rounded-0 custom-btn">1 Year</button>
                    <button type="button" class="btn border border-2 text-gray rounded-0 custom-btn">2 Years</button>
                </div>
                <div class="p-2 ms-4 mt-2">
                    <p class="text-gray2">Quantity:</p>
                    <div class="input-group quantity-section">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-number custom-btn" data-type="minus" data-field="">
                              <span class="glyphicon glyphicon-minus h4">-</span>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-number custom-btn" data-type="plus" data-field="">
                                <span class="glyphicon glyphicon-plus h4">+</span>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="p-2 ms-4 mt-2">
                    <p class="blue-color fw-bolder">SHARE 
                        <span><i class="fa-brands fa-facebook-f ps-2 text-gray2"></i></span>
                        <span><i class="fa-brands fa-pinterest-p ps-2 text-gray2"></i></span> 
                        <span><i class="fa-brands fa-whatsapp ps-2 text-gray2"></i></span>
                        <span><i class="fa-brands fa-twitter ps-2 text-gray2"></i></span>
                    </p>
                </div>
                <div class="ps-4 me-5 pe-5 mt-2">
                    <input type="button" value="Add to cart" class="form-control p-3 text-white bg-blue custom-btnnn">
                </div>
            </div>
        </div>
    </div>

    <!-- Section description health warranty reviews -->

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                    <div class="mt-5">
                        <div class="pe-4 d-flex border-bottom border-2 me-5">
                            <p class="pe-3">
                                <button class="blue-color border-0 bg-white custom-btnn" id="btn1" type="button">Description</button>
                            </p>
                            <p class="ps-5 pe-3">
                                <button id="btn2" class="text-blacks hide-btn border-0 bg-white custom-btnn" type="button">Health & Care</button>
                            </p>
                            <p class="ps-5">
                                <button id="btn3" class="text-blacks hide-btn border-0 bg-white custom-btnn" type="button">Review(0)</button>
                            </p>
                        </div>
                        <div class="mt-3" id="form1">
                            <div class="w-100 d-flex">
                                <div class="w-60">
                                    <p class="fs-20 pb-3 border-bottom border-2 blue-color">SPECIFICATION</p>
                                    <p class="blue-color pt-2">Breed</p>
                                    <p class="blue-color pt-2">Color</p>
                                    <p class="blue-color pt-2">Weight</p>
                                    <p class="blue-color pt-2">Height</p>
                                    <p class="blue-color pt-2">Age</p>
                                    <p class="blue-color pt-2">Gender</p>
                                    <p class="blue-color pt-2">Vaccination Status</p>
                                    <p class="blue-color pt-2">Temperament</p>
                                    <p class="blue-color pt-2">Good with Children</p>
                                    <p class="blue-color pt-2">Good with Other Pets</p>
                                </div>
                                <div class="w-40">
                                    <p class="fs-20 pb-3 border-bottom me-5 border-2 blue-color">Bull Dog</p>
                                    <p class="blue-color pt-2">English Bulldog</p>
                                    <p class="blue-color pt-2">White</p>
                                    <p class="blue-color pt-2">24 kg</p>
                                    <p class="blue-color pt-2">40 cm</p>
                                    <p class="blue-color pt-2">1 Year</p>
                                    <p class="blue-color pt-2">Male</p>
                                    <p class="blue-color pt-2">Up to Date</p>
                                    <p class="blue-color pt-2">Calm</p>
                                    <p class="blue-color pt-2">Yes</p>
                                    <p class="blue-color pt-2">Yes</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 para-hide" id="form2">
                            <p class="mt-4"><span class="fw-bold">Health Check</span> : Comprehensive health check included</p>
                            <p class="mt-2"><span class="fw-bold">Vaccination</span> : Fully vaccinated</p>
                            <p class="mt-2"><span class="fw-bold">Microchipping</span> : Included</p>
                        </div>
                        <div class="w-100 para-hide" id="form3">
                            <p class="color-B5 pe-5"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("footer.php");
    ?>

    <style>
        .quantity-section {
            width: 150px;
            height: 40px;
        }

        .custom-btn {
            font-size: 12px; /* Adjust the font size */
            padding: 5px 10px; /* Adjust the padding */
            width: auto; /* Adjust the width */
            height: auto; /* Adjust the height */
        }

        .custom-btn:hover {
            background-color: darken(#DEAD6F, 10%) !important;
        }

        .custom-btnn {
            width: 50px;
            height: 40px;
        }

        .input-number {
            width: 50px;
            height: 40px;
            text-align: center;
        }

        .input-group-btn {
            width: 40px;
            height: 40px;
        }

        .text-gray2 {
            font-size: 12px;
        }

        .custom-btnnn {
            background-color: #DEAD6F !important;
            color: white !important;
        }
    </style>

    <script>
        $(document).ready(function () {
            var quantity = 0;
            $('.quantity-right-plus').click(function (e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                $('#quantity').val(quantity + 1);
            });

            $('.quantity-left-minus').click(function (e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });
        });

        $(document).ready(function () {
            $("#btn1").click(function () {
                $("#form1").toggle(300);
                $("#form2").hide(300);
                $("#form3").hide(300);
            });
            $("#btn2").click(function () {
                $("#form2").toggle(300);
                $("#form1").hide(300);
                $("#form3").hide(300);
            });
            $("#btn3").click(function () {
                $("#form3").toggle(300);
                $("#form1").hide(300);
                $("#form2").hide(300);
            });
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/dist/aos.js"></script>
    <script> AOS.init(); </script>
</body>
</html>