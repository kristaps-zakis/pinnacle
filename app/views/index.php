<?php
    session_start();

    $submitData = false;
    $emailError = false;
    $termsError = '';
    $emailSaved = false;
    $email = '';

    if (!empty($_SESSION['home_post'])) {
        $submitData = $_SESSION['home_post'];

        if (isset($submitData['error']['email'])) {
            $emailError = $submitData['error']['email'];
        }

        if (isset($submitData['error']['agreement'])) {
            $termsError = true;
        } else {
            $termsError = false;
        }

        if (isset($submitData['record_saved'])) {
            $emailSaved = $submitData['record_saved'];
        }

        $email = $submitData['email'];

        session_destroy();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magebit homework || Kristaps Zaķis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" type="text/css" media="all" href="/assets/css/normalize.css" />
    <link rel="stylesheet" type="text/css" media="all" href="/assets/css/style.css" />
    <link rel="preload" as="image" href="/assets/images/pineapple-logo.svg">
    <link rel="preload" as="image" href="/assets/images/icons/checkbox.svg">
    <link rel="preload" as="image" href="/assets/images/icons/checkbox-checked.svg">
</head>
<body>

<div class="content-wrapper">
    <header class="main-header">
        <a href="#" id="main-logo" title="Home">
            <img src="/assets/images/pineapple-logo.svg" alt="Pineapple Logo image" class="logo image"/>
            <img src="/assets/images/logo-text.svg" alt="Pineapple Logo text" class="logo text" />
        </a>
        <nav class="main-menu">
            <ul class="menu">
                <li><a class="link" href="#">About</a></li>
                <li><a class="link" href="#">How it works</a></li>
                <li><a class="link" href="subscriptions">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main class="main-content" id="app">
        <div class="form-content <?= $emailSaved ? 'hide' : ''; ?>" v-if="!successSubmitted">
            <div class="main-top-text">
                <h1>Subscribe to newsletter</h1>
                <div class="text">Subscribe to our newsletter and get 10% discount on pineapple glasses.</div>
            </div>

            <form class="subscribe-form"
                  id="thisForm"
                  action="/home/post"
                  method="post"
                  name="form1"
                  @submit.prevent="submitForm"
                  autocomplete="off">
                <div class="control">
                    <input type="text"
                           class="email"
                           name="email"
                           value="<?= $email; ?>"
                           v-model="email"
                           placeholder="Type your email address here…" />
                    <button type="submit"
                            value="subscribe"
                            :disabled="!allowSubmit"
                            class="action submit"></button>
                </div>
                <div class="email-error <?= $emailError ? 'show' : ''; ?>"
                     v-bind:class="{show: emailErrors }">
                    <div class="error-message <?= $emailError ? 'show' : '' ?>"
                         v-bind:class="{show: emailErrors }"
                         v-if="emailErrors"
                         v-model="emailErrorMessage">
                        <?php if ($emailError):
                            echo $emailError;
                        else:
                            echo '{{ emailErrorMessage }}';
                        endif;  ?>
                    </div>
                </div>

                <div class="field checkbox">
                    <input type="checkbox"
                           id="newsletter-agree"
                           v-model="termsApproved"
                           <?= $termsError === false ? 'checked' : ''; ?>
                           name="newsletter-agree" />

                    <label for="newsletter-agree" class="label">
                        <span class="checkbox-label">I agree to <a href="#">terms of service</a></span>
                    </label>

                    <div class="error-message <?= $termsError === true ? 'show' : '' ?>"
                         v-bind:class="{show: termsError }"
                         v-if="termsError">
                        You must accept the terms and conditions
                    </div>
                </div>
            </form>
        </div>

        <div class="success-content <?= $emailSaved ? 'show' : ''; ?>" v-bind:class="{show: successfulSubscribe }" v-if="successfulSubscribe">
            <div class="success-image-holder">
                <img src="/assets/images/icons/success.svg" width="44" height="70">
            </div>

            <h1>Thanks for subscribing!</h1>

            <div class="text">
                You have successfully subscribed to our email listing. Check your email for the discount code.
            </div>
        </div>

        <footer>
            <ul>
                <a href="https://www.facebook.com/magebitcom" target="_blank" class="social facebook">
                    <span class="name">Facebook</span>
                </a>

                <a href="https://www.instagram.com/magebitcom/" target="_blank" class="social instagram">
                    <span class="name">Instagram</span>
                </a>
                <a href="https://twitter.com/magebit" target="_blank" class="social twitter" >
                    <span class="name">Twitter</span>
                </a>
                <a href="https://www.youtube.com/channel/UCgSia5PNNQjXqX8pVGb8A0A#" target="_blank" class="social youtube">
                    <span class="name">Youtube</span>
                </a>
            </ul>
        </footer>
    </main>
</div>
<div class="desktop-background"></div>
<script src="/assets/js/app.js"></script>
</body>
</html>