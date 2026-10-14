<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sun Son Solar | Power Your Future with Solar</title>
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
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#benefits">Benefits</a>
        <a href="#contact">Contact</a>

        <?php if ($this->session->userdata('user_id')): ?>
          <form action="<?= site_url('logout') ?>" method="post">
            <button class="home-logout" type="submit">Log Out</button>
          </form>
        <?php else: ?>
          <a href="<?= site_url('login') ?>" data-auth-transition>Log In</a>
          <a class="home-cta" href="<?= site_url('login') ?>" data-auth-transition>
            My Account <span aria-hidden="true">&rarr;</span>
          </a>
        <?php endif; ?>
      </nav>
    </header>

    <main class="home-hero">
      <section class="home-copy">
        <span class="eyebrow">A brighter way to power your home</span>
        <h1>Power your<span>future with solar.</span></h1>
        <p>Sun Son Solar helps households take control of their energy with expert advice, careful installation, and dependable support.</p>
        <a class="home-action" href="<?= site_url('register') ?>" data-auth-transition>Request a free quote <span aria-hidden="true">&rarr;</span></a>
        <a class="home-secondary" href="<?= site_url('login') ?>" data-auth-transition>Customer and employee login</a>
      </section>

      <div class="home-photo" role="img" aria-label="Solar panels capturing sunlight on a home">
        <div class="home-metric"><small>Clean energy, made practical</small><strong>Save more. Shine on.</strong><span>Designed around your home</span></div>
      </div>
    </main>

    <section class="home-section" id="about">
      <span class="eyebrow">Energy that works for you</span>
      <h2>Make sunshine part of your everyday.</h2>
      <p>We make the move to solar easier to understand, from your first conversation through installation and long-term care. Our team helps you choose a system that fits your home and goals.</p>
    </section>

    <section class="home-section benefits" id="benefits">
      <article><span>01</span><h3>Lower energy costs</h3><p>Generate power at home and reduce your reliance on energy from the grid.</p></article>
      <article><span>02</span><h3>A lighter footprint</h3><p>Use a renewable source of energy and help reduce household emissions.</p></article>
      <article><span>03</span><h3>More energy control</h3><p>Build greater independence with a system designed for your household.</p></article>
    </section>

    <section class="home-section services" id="services">
      <span class="eyebrow">Here for every step</span><h2>Solar support, from start to shine.</h2>
      <div class="service-grid">
        <article><h3>Consultation</h3><p>Talk through your goals and get clear guidance for your home.</p></article>
        <article><h3>Installation</h3><p>Get a professionally planned solar system fitted for your needs.</p></article>
        <article><h3>Maintenance</h3><p>Keep your system performing with ongoing care and support.</p></article>
      </div>
    </section>

    <section class="home-section quote" id="stories">
      <span class="eyebrow">A customer-first promise</span><h2>Good energy starts with a team you can trust.</h2>
      <p>From the first question to the final switch-on, we make each step clear and keep your needs at the center.</p>
      <a class="home-action" href="<?= site_url('register') ?>" data-auth-transition>Start with a free quote <span aria-hidden="true">&rarr;</span></a>
    </section>

    <section class="home-section faq" id="faq">
      <span class="eyebrow">Frequently asked questions</span><h2>Getting started, made simple.</h2>
      <details><summary>What happens during a solar consultation?</summary><p>Our team discusses your energy goals, reviews your home's needs, and explains suitable options.</p></details>
      <details><summary>Do you help after installation?</summary><p>Yes. Sun Son Solar offers maintenance and support to help keep your system in good condition.</p></details>
      <details><summary>How do I get a quote?</summary><p>Create a customer account to get started, then contact our team to discuss a quote for your home.</p></details>
    </section>

    <footer class="home-footer" id="contact">
      <a class="home-brand" href="<?= site_url('home') ?>">SUN SON SOLAR</a>
      <p>Questions about going solar? Contact the Sun Son Solar team.</p>
      <div><a href="<?= site_url('login') ?>" data-auth-transition>Secure account login</a><span> · </span><a href="<?= site_url('register') ?>" data-auth-transition>Customer registration</a></div>
      <small>© <?= date('Y') ?> Sun Son Solar. Clean energy for brighter days. Company contact, social links, and legal notices can be added when official details are available.</small>
    </footer>

    <script src="<?= base_url('assets/JS/auth-transition.js') ?>"></script>
  </body>
</html>

