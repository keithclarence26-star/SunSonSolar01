<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create account | Sun Son Solar</title>
    <link rel="stylesheet" href="<?= base_url('assets/CSS/auth.css') ?>">
  </head>
  <body class="auth-page">
    <div class="auth-shell">
      <aside class="auth-visual">
        <a class="visual-home" href="<?= site_url() ?>" data-auth-transition>
          &larr; Return to Home
        </a>
        <div class="visual-copy">
          <div class="brand">
            <svg class="brand-sun" viewBox="0 0 48 48" aria-hidden="true" focusable="false"><circle cx="24" cy="24" r="8"></circle><path d="M24 2v8M24 38v8M2 24h8m28 0h8M8.5 8.5l5.7 5.7m19.6 19.6 5.7 5.7m0-31-5.7 5.7m-19.6 19.6-5.7 5.7"></path></svg>
            SUN SON SOLAR
          </div>
          <h2>Make every sunny day count.</h2>
          <p>Create your customer account to plan your move to clean, dependable solar energy.</p>
        </div>
      </aside>

      <main class="auth-main">
        <section class="auth-form-wrap" aria-labelledby="register-title">
          <h1 id="register-title">Create your account</h1>
          <p class="auth-subtitle">Customer registration for Sun Son Solar.</p>

          <?php if ($this->session->flashdata('error')): ?>
            <div class="auth-message" role="alert">
              <?= html_escape($this->session->flashdata('error')) ?>
            </div>
          <?php endif; ?>

          <?php if (validation_errors()): ?>
            <div class="auth-errors" role="alert">
              <?= validation_errors('<p>', '</p>') ?>
            </div>
          <?php endif; ?>

          <form
            action="<?= site_url('auth/process_register') ?>"
            method="post"
            class="auth-fields"
            id="registrationForm"
          >
            <div class="auth-row">
              <input
                type="text"
                name="first_name"
                placeholder="First Name"
                aria-label="First name"
                value="<?= html_escape(set_value('first_name')) ?>"
                autocomplete="given-name"
                required
              >
              <input
                type="text"
                name="last_name"
                placeholder="Last Name"
                aria-label="Last name"
                value="<?= html_escape(set_value('last_name')) ?>"
                autocomplete="family-name"
                required
              >
            </div>

            <input
              type="text"
              name="middle_name"
              placeholder="Middle Name (optional)"
              aria-label="Middle name"
              value="<?= html_escape(set_value('middle_name')) ?>"
              autocomplete="additional-name"
            >
            <input
              type="email"
              name="email"
              placeholder="Email Address"
              aria-label="Email address"
              value="<?= html_escape(set_value('email')) ?>"
              autocomplete="email"
              required
            >
            <input
              type="password"
              name="password"
              placeholder="Create Password"
              aria-label="Create password"
              autocomplete="new-password"
              minlength="8"
              required
            >
            <input
              type="password"
              name="password_confirm"
              placeholder="Confirm Password"
              aria-label="Confirm password"
              autocomplete="new-password"
              required
            >

            <p class="auth-note">Employee accounts are created by HR or an administrator. Contact your administrator if you need employee access.</p>
            <button class="auth-submit" type="submit">Create customer account</button>
          </form>

          <p class="auth-switch">
            Already have an account?
            <a href="<?= site_url('login') ?>" data-auth-transition>Log In</a>
          </p>
        </section>
      </main>
    </div>

    <script src="<?= base_url('assets/JS/auth-transition.js') ?>"></script>
  </body>
</html>

