<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Mobil SAW</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.min.css') }}">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f8f9fa;
        }
        .header {
            background: #007bff;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }
        .header h1 {
            font-size: 3em;
            margin: 0;
        }
        .main-content {
            padding: 50px 0;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">DSS Car</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <header class="header">
        <div class="container">
            <h1>DSS In Car Selection</h1>
            <p>Decision Support System in Car Selection Using the Simple Additive Weighting Method(SAW).</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </header>

    <section id="about" class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2>About DSS SAW Method</h2>
                    <p>This tool uses the SAW (Simple Additive Weighting) algorithm to help with the selection of the car. Designed to provide fast and accurate results based on your input.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="main-content bg-light">
        <div class="container">
            <h2>Main Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Quick Analysis</h3>
                            <p class="card-text">Get results in seconds with high accuracy using the SAW (Simple Additive Weighting) Algorithm.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Intuitive Interface</h3>
                            <p class="card-text">Enjoy an easy to use interface designed for optimal user experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Data Security</h3>
                            <p class="card-text">Your data is safe with us. We ensure the privacy and security of your information.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Multi Language Support</h3>
                            <p class="card-text">Our app supports multiple languages for the convenience of users worldwide.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Interactive Charts</h3>
                            <p class="card-text">Visualize classificartion results with easy to understand interactive graphs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Detailed Report</h3>
                            <p class="card-text">Get a detailed report on your classification results with full explanation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="main-content">
        <div class="container">
            <h2>Contact Us</h2>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Input your name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Input your email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Your message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} DSS SAW built with <i class="fas fa-heart text-danger"></i> Zhu Code.</p>
        </div>
    </footer>

    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
</body>
</html>
