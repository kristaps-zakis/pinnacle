<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magebit homework || Kristaps Zaķis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/normalize.css" />
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/style.css" />
    <link rel="preload" as="image" href="/assets/images/pineapple-logo.svg">
    <link rel="preload" as="image" href="/assets/images/icons/checkbox.svg">
    <link rel="preload" as="image" href="/assets/images/icons/checkbox-checked.svg">
</head>
<body>
    <div class="content-wrapper">
        <header class="main-header">
            <a href="#" id="main-logo" title="Home">
                <img src="assets/images/pineapple-logo.svg" alt="Pineapple Logo image" class="logo image"/>
                <img src="assets/images/logo-text.svg" alt="Pineapple Logo text" class="logo text" />
            </a>
            <nav class="main-menu">
                <ul class="menu">
                    <li><a class="link" href="#">About</a></li>
                    <li><a class="link" href="#">How it works</a></li>
                    <li><a class="link" href="#">Contact</a></li>
                </ul>
            </nav>
        </header>
        <main class="main-content" id="app">
            <div class="form-content">
                <div class="main-top-text">
                    <h1>Subscribe to newsletter</h1>
                    <div class="text">Subscribe to our newsletter and get 10% discount on pineapple glasses.</div>
                </div>

                <form class="subscribe-form" @submit.prevent="submitForm" autocomplete="off">
                    <div class="control">
                        <input type="text"
                               class="email"
                               v-model="form.email"
                               placeholder="Type your email address here…" />
                        <button type="submit" value="subscribe" class="action submit"></button>
                    </div>
                    <div class="errors" v-if="!emailSet">
                        <div class="error-message" v-if="!emailIsValid">
                            Email address is required
                        </div>
                        <div class="error-message" v-if="!emailIsRequired">
                            Please provide a valid e-mail address
                        </div>

                        <div class="error-message" v-if="!emailIsPropper">
                            We are not accepting subscriptions from Colombia emails
                        </div>
                    </div>


                    <div class="field checkbox">
                        <input type="checkbox" id="newsletter-agree" v-model="form.termsApproved" name="newsletter-agree" />
                        <label for="newsletter-agree" class="label">
                            <span class="checkbox-label">I agree to <a href="#">terms of service</a></span>
                        </label>
                        <div class="error-message" v-if="!termsApproved">
                            You must accept the terms and conditions
                        </div>
                    </div>
                </form>
            </div>

            <div class="success-content" v-if="successSubmit">
                Success submit
            </div>

            <footer>
                <ul>
                    <a href="#" class="social facebook"><span class="name">Facebook</span></a>
                    <a href="#" class="social instagram"><span class="name">Instagram</span></a>
                    <a href="#" class="social twitter"><span class="name">Twitter</span></a>
                    <a href="#" class="social youtube"><span class="name">Youtube</span></a>
                </ul>
            </footer>
        </main>
    </div>
    <div class="desktop-background"></div>
<script src="assets/js/app.js"></script>
</body>
</html>