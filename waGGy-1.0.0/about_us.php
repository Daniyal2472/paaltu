<?php
include("header.php");
?>
<body>
    <style>
        /* General Styles */

        .about-us {
            background-image: url('images/background-img.png');
            background-size: cover;
            background-position: center;
            padding: 60px 0;
            color: #fff;
        }

        .about-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .about-header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .about-header p {
            font-size: 1.25rem;
            font-weight: 300;
        }

        .about-content {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            max-width: 1200px;
        }

        .mission-vision {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .mission, .vision {
            width: 48%;
            padding: 20px;
            background: #f0f8ff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .mission h2, .vision h2 {
            font-size: 2rem;
            color: #DEAD6F;
            margin-bottom: 15px;
        }

        .mission p, .vision p {
            font-size: 1rem;
            color: #333;
        }

        .our-story {
            margin-bottom: 40px;
            text-align: center; /* Center align the text in this section */
        }

        .our-story h2 {
            font-size: 2rem;
            color: #DEAD6F; /* Update color */
            margin-bottom: 20px;
        }

        .our-story p {
            font-size: 1rem;
            color: #333;
        }
        .us {
            color: #DEAD6F;
        }
    </style>
    <main>
        <section class="about-us">
            <div class="container">
                <div class="about-header">
                    <h1 class="us">About Us</h1>
                    <p class="text-black">Your trusted partner in pet care.</p>
                </div>
                <div class="about-content">
                    <div class="mission-vision">
                        <div class="mission">
                            <h2>Our Mission</h2>
                            <p>At Paaltoo, our mission is to provide the best products and services for pets and their owners. We are committed to enhancing the quality of life for pets through high-quality supplies and exceptional service.</p>
                        </div>
                        <div class="vision">
                            <h2>Our Vision</h2>
                            <p>We envision a world where every pet is well-cared for and loved. Our goal is to be the go-to destination for pet owners seeking the best for their furry friends.</p>
                        </div>
                    </div>
                    <div class="our-story">
                        <h2>Our Story</h2>
                        <p>Founded in 2024, Paaltoo started with a passion for animals and a commitment to providing top-notch pet supplies. What began as a small venture has grown into a leading pet store, thanks to the support of our loyal customers and dedicated team.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
include("footer.php");
?>
</body>
</html>
