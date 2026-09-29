<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sun Son Solar | Harness the nearest star</title>
    <link rel="stylesheet" href="<?= base_url('assets/CSS/auth.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/CSS/home.css') ?>">
  </head>
  <body class="home-page">
    <header class="home-nav">
      <a class="home-brand" href="<?= site_url('home') ?>">
        <svg class="home-sun" viewBox="0 0 48 48" aria-hidden="true" focusable="false"><circle cx="24" cy="24" r="8"></circle><path d="M24 2v8M24 38v8M2 24h8m28 0h8M8.5 8.5l5.7 5.7m19.6 19.6 5.7 5.7m0-31-5.7 5.7m-19.6 19.6-5.7 5.7"></path></svg>
        SUN SON SOLAR
      </a>

      <nav class="home-links" aria-label="Main navigation">
        <a href="#technology">Technology</a>
        <a href="#infrastructure">Infrastructure</a>
        <a href="#economics">Economics</a>

        <?php if ($this->session->userdata('user_id')): ?>
          <form action="<?= site_url('logout') ?>" method="post">
            <button class="home-logout" type="submit">Log Out</button>
          </form>
        <?php else: ?>
          <a href="<?= site_url('login') ?>" data-auth-transition>Log In</a>
          <a class="home-cta" href="<?= site_url('register') ?>" data-auth-transition>
            Get Started <span aria-hidden="true">&rarr;</span>
          </a>
        <?php endif; ?>
      </nav>
    </header>

    <main class="home-hero">
      <section class="home-copy">
        <span class="eyebrow">Yield optimization active</span>
        <h1>Harness the<span>nearest star.</span></h1>
        <p>
          Industrial-grade solar arrays for residential architecture.
          Convert sunlight into decentralized energy and lasting value.
        </p>
        <a class="home-action" href="<?= site_url('register') ?>" data-auth-transition>
          Calculate Output
        </a>
      </section>

      <div
        class="home-photo"
        role="img"
        aria-label="Solar panels under a bright blue sky"
      >
        <div class="home-metric">
          <small>Live grid input</small>
          <strong>47.2 kW/h</strong>
          <span>Online</span>
        </div>
      </div>
    </main>

    <script src="<?= base_url('assets/JS/auth-transition.js') ?>"></script>
  </body>
</html>

