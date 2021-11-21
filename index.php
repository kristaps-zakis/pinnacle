<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magebit homework</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/normalize.css" />
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/style.css" />
</head>
<body>
    <header class="main-header">
        <a href="#" id="main-logo" title="Home">
            <img src="assets/images/logo.svg" alt="Pineapple Logo" />
            <span>pineapple</span>
        </a>
        <nav class="main-menu">
            <ul class="menu">
                <li><a class="link" href="#">About</a></li>
                <li><a class="link" href="#">How it works</a></li>
                <li><a class="link" href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        <h1>Subscribe to newsletter</h1>
        <div class="text">Subscribe to our newsletter and get 10% discount on pineapple glasses.</div>

        <form>
            <input type="text" placeholder="Type your email address here…" />

            <div class="field checkbox">
                <input type="checkbox" id="newsletter-agree" name="newsletter-agree" />
                <label for="newsletter-agree">
                    I agree to <a href="#">Terms of service</a>
                </label>
            </div>
        </form>

        <footer>
            <ul>
                <a href="#" class="social facebook">fb</a>
                <a href="#" class="social instagram">ig</a>
                <a href="#" class="social twitter">tw</a>
                <a href="#" class="social youtube">yt</a>
            </ul>
        </footer>
    </main>
</body>
</html>