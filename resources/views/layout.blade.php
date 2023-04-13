<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/bank_icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Bank System</title>
</head>

<body>

    <nav class="nav-bar">
        <div class="nav-left">
            <div class="logo">
                <img src="{{ asset('images/bank_icon.png') }}" alt="logo">
            </div>
        </div>
        <i class="fa-solid fa-bars fa-2xl" style="color: #1c1c1c;" id="bars" onclick="show()"></i>
        <div class="nav-right" id="menu">
            <div class="nav-link">
                <a href="{{ route('home') }}">Home</a>
            </div>
            <div class="nav-link">
                <a href="{{ route('customer.index') }}">Clients</a>
            </div>
            <div class="nav-link">
                <a href="{{ route('history') }}">History</a>
            </div>
            <div class="nav-link">
                <a href="#">Blogs</a>
            </div>
            <div class="nav-link">
                <a href="#">FAQ</a>
            </div>
            <div class="nav-link">
                <a href="#">Contact Us</a>
            </div>
        </div>
    </nav>

    @yield('body')

    <footer>
        <div class="footer-content">
            <div class="info">
                <p>task #1 basic banking system</p>
                <a href="https://internship.thesparksfoundation.info/" target="_blank">The Sparks Foundation</a>
            </div>
            <div class="my-info">
                <a href="https://github.com/moataz-01"><i class="fa-brands fa-github"></i>
                    <p>my GitHub</p>
                </a>
                <a href="https://www.linkedin.com/in/moatazmosa/"><i class="fa-brands fa-linkedin"
                        style="color: #1a5fb4;"></i>
                    <p>my Linkedin</p>
                </a>
            </div>
        </div>
    </footer>


</body>
<script>
    function show() {
        let menu = document.getElementById('menu');
        if (menu.style.opacity == 0) {
            menu.style.opacity = 1;
            menu.style.display = "flex";
            // menu.style.transform = "scale(0, 0)";
        } else {
            menu.style.opacity = 0;
            menu.style.display = "none";
            // menu.style.transform = "scale(1, 1)";
        }
    }
</script>

</html>
