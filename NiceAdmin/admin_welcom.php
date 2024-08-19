<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            margin: 0;
            position: relative;
        }
        .logo-container {
            position: absolute;
            top: 1rem;
            width: 100%;
            text-align: center;
        }
        .welcome-card {
            padding: 3rem;
            border-radius: 1.5rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, #DEAD6F 0%, #6a11cb 100%);
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            z-index: 0;
        }
        .welcome-card h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            z-index: 1;
            position: relative;
        }
        .welcome-card p {
            font-size: 1.2rem;
            z-index: 1;
            position: relative;
        }
        .welcome-card .btn {
            margin-top: 2rem;
            z-index: 1;
            position: relative;
            background-color: black;
            color: #DEAD6F;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            transition: background-color 0.3s, color 0.3s;
        }
        .welcome-card .btn:hover {
            background-color: #DEAD6F;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <a href="index.php">
            <img src="assets/img/paltoo.png" alt="logo" class="img-fluid logo-img" style="height: 140px; width: auto;">
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="welcome-card">
                    <h1>Welcome to Admin Panel</h1>
                    <p>Manage your content and settings with ease.</p>
                    <a href="index.php" class="btn">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
