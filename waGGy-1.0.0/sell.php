
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Your Pet on Paaltoo</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('images/background-img.png') no-repeat;
            background-size: cover;
            margin: 0;
            flex-direction: column;
        }

        .heading {
            font-size: 32px;
            font-weight: bold;
            color: #DEAD6F;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 350px;
            height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 100%;
            padding: 20px;
        }

        .card h2 {
            font-size: 24px;
            color: #000000;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-align: center;
        }

        .card img {
            width: 50%;
            height: auto;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .card ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .card li {
            margin-bottom: 10px;
        }

        .card li::before {
            content: "\f00c"; /* Font Awesome check icon */
            font-family: FontAwesome;
            display: inline-block;
            margin-right: 10px;
            color: green;
        }

        .card button {
            display: block;
            width: auto;
            padding: 15px 30px;
            background: linear-gradient(45deg, #007bff, #00d4ff);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            transition: background 0.3s ease;
            margin: 20px auto 0 auto;
            text-decoration: none;
        }

        .card button:hover {
            background: linear-gradient(45deg, #0056b3, #008cff);
        }

        .card .note {
            font-size: 12px;
            color: #6c757d;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <p class="heading">Sell Your Pets Online in Pakistan Instantly!</p>
    <div class="container">
        <div class="card">
            <h2>Post Your Ad On Paaltoo</h2>
            <img src="images/pimg.jpg" alt="Pet Ad">
            <ul>
                <li>Post your Ad for Free in 3 Easy Steps</li>
                <li>Get Genuine offers from Verified Buyers</li>
                <li>Sell your pet Fast at the Best Price</li>
            </ul>
            <button>
                <a href="sellform.php" class="card-button">Post An Ad</a>
            </button>
        </div>
    </div>
   
</body>


</html>
