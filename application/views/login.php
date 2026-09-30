<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Sun Son Solar</title>
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
          <h2>Power your potential.</h2>
          <p>Join the network of decentralized energy producers reshaping the grid.</p>
        </div>
      </aside>

      <main class="auth-main">
        <section class="auth-form-wrap" aria-labelledby="login-title">
          <h1 id="login-title">Welcome Back</h1>
          <p class="auth-subtitle">Access your solar array telemetry.</p>

          <?php if ($this->session->flashdata('success')): ?>
            <div class="auth-message" role="status">
              <?= html_escape($this->session->flashdata('success')) ?>
            </div>
          <?php endif; ?>

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
            action="<?= site_url('auth/process_login') ?>"
            method="post"
            class="auth-fields"
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
              placeholder="Password"
              aria-label="Password"
              autocomplete="current-password"
              required
            >
            <a class="auth-forgot" href="#" onclick="return false">
              Forgot Configuration?
            </a>
            <button class="auth-submit" type="submit">Authenticate</button>
          </form>

          <p class="auth-switch">
            New to the grid?
            <a href="<?= site_url('register') ?>" data-auth-transition>Deploy Node</a>
          </p>
        </section>
      </main>
    </div>

    <script src="<?= base_url('assets/JS/auth-transition.js') ?>"></script>
  </body>
</html>

