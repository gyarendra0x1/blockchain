<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .custom-nav {
        background-color: #17a2b8;
        /* You can replace this with your desired color */
    }
    #navbarNav ul li a{
        color:#fff;
    }
     header{
        position: relative;
    }

    .header-image {
        background-image: url('https://media.qrtiger.com/blog/2021/11/qr-code-product-authenticationjpg_800.jpeg');
        background-position: center;
        background-size: cover;
        height: 400px;
        position: relative;
    }


    .header-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #ffffff;
        z-index: 1;
    }

    .header-text h1 {
        font-size: 48px;
        margin-bottom: 24px;
    }

    .header-text p {
        font-size: 24px;
        margin-bottom: 24px;
    }

    .btn-primary {
        background-color: #ffffff;
        color: #17a2b8;
        border-color: #ffffff;
    }

    .btn-primary:hover {
        background-color: #17a2b8;
        color: #ffffff;
    }
    .learn-more-btn {
        background-color: #ff8c00;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .learn-more-btn:hover {
        background-color: #ff4500;
        transform: scale(1.1);
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        max-width: 350px;
        margin: 0 auto;
        background-color: #fff;
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card-image {
        height: 200px;
        background-image: url('https://source.unsplash.com/random/350x200');
        background-size: cover;
        background-position: center;
    }

    .card-content {
        padding: 20px;
    }

    .card-title {
        margin: 0;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-text {
        margin: 10px 0;
        font-size: 1rem;
        line-height: 1.4;
    }

</style>
<body>
<!-- Header -->
<header>
    <nav class="navbar navbar-expand-md navbar-light  custom-nav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="header-image">
        <div class="header-text">
            <h1>Welcome to our Website</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#" class="btn btn-primary learn-more-btn"><i class="fas fa-arrow-right"></i> Learn More</a>

        </div>
    </div>
</header>

<!-- Hero Image -->
<section class="hero-image">

</section>

<!-- Product Details -->
<section class="product-details">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-header"><h5 class="card-title">{{ $product->name }}</h5></div>
                    <div class="card-body">
                        <div class="text-center">
                            {!! QrCode::size(100)->generate(route('products.show', $product)); !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<footer class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="text-muted mb-0">© 2022 My Website</p>
            </div>
            <div class="col-md-6">
                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
