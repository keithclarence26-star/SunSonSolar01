<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="theme-color" content="#09090b">
  <title>Create account | Sun Son Solar</title>
  <link rel="stylesheet" href="<?= base_url('assets/CSS/sunsonsolar/portal.css') ?>">
</head>
<body>
<div class="pub au">
  <aside class="av">
    <a class="vh" href="<?= site_url() ?>">&larr; Return to Home</a>
    <div class="rig" aria-hidden="true">
      <div class="sunb" style="right:10%;top:8%;width:110px"><svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="8"></circle><path d="M24 2v8M24 38v8M2 24h8m28 0h8M8.5 8.5l5.7 5.7m19.6 19.6 5.7 5.7m0-31-5.7 5.7m-19.6 19.6-5.7 5.7"></path></svg></div>
      <div class="panel"><?php for ($i = 0; $i < 24; $i++): ?><i></i><?php endfor; ?></div>
    </div>
    <div class="avc">
      <div class="brand"><svg viewBox="0 0 48 48" aria-hidden="true"><circle cx="24" cy="24" r="8"></circle><path d="M24 2v8M24 38v8M2 24h8m28 0h8M8.5 8.5l5.7 5.7m19.6 19.6 5.7 5.7m0-31-5.7 5.7m-19.6 19.6-5.7 5.7"></path></svg>SUN SON SOLAR</div>
      <h2>Make every sunny day count.</h2>
      <p>Create your customer account to book services and track your solar system.</p>
    </div>
  </aside>
  <main class="am">
    <form class="af register-form" action="<?= site_url('auth/process_register') ?>" method="post" aria-labelledby="register-title">
      <div class="lg" aria-hidden="true"><svg viewBox="0 0 48 48"><circle cx="24" cy="24" r="8"></circle><path d="M24 2v8M24 38v8M2 24h8m28 0h8M8.5 8.5l5.7 5.7m19.6 19.6 5.7 5.7m0-31-5.7 5.7m-19.6 19.6-5.7 5.7"></path></svg></div>
      <h1 id="register-title">Create your account</h1>
      <p class="sub">Customer registration. Employee accounts are created by HR or admin.</p>
      <?php if ($this->session->flashdata('error')): ?><div class="er" role="alert"><?= html_escape($this->session->flashdata('error')) ?></div><?php endif; ?>
      <?php if (validation_errors()): ?><div class="er" role="alert"><?= validation_errors('<p>', '</p>') ?></div><?php endif; ?>

      <div class="r2">
        <input type="text" name="first_name" placeholder="First name" aria-label="First name" value="<?= html_escape(set_value('first_name')) ?>" autocomplete="given-name" required>
        <input type="text" name="last_name" placeholder="Last name" aria-label="Last name" value="<?= html_escape(set_value('last_name')) ?>" autocomplete="family-name" required>
      </div>
      <input type="text" name="middle_name" placeholder="Middle name (optional)" aria-label="Middle name" value="<?= html_escape(set_value('middle_name')) ?>" autocomplete="additional-name">
      <div class="r2">
        <input type="date" name="birthdate" aria-label="Birthdate" value="<?= html_escape(set_value('birthdate')) ?>" autocomplete="bday" required>
        <select name="gender" aria-label="Gender" required>
          <option value="">Gender</option>
          <?php foreach (array('Female', 'Male', 'Prefer not to say') as $gender): ?>
            <option value="<?= html_escape($gender) ?>"<?= set_select('gender', $gender) ?>><?= html_escape($gender) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="r2">
        <input type="email" name="email" placeholder="Email" aria-label="Email" value="<?= html_escape(set_value('email')) ?>" autocomplete="email" required>
        <input type="tel" name="phone" placeholder="Phone number" aria-label="Phone number" value="<?= html_escape(set_value('phone')) ?>" autocomplete="tel" required>
      </div>
      <input type="text" name="address" placeholder="Address" aria-label="Address" value="<?= html_escape(set_value('address')) ?>" autocomplete="street-address" required>
      <input type="text" name="username" placeholder="Username" aria-label="Username" value="<?= html_escape(set_value('username')) ?>" autocomplete="username" minlength="3" required>
      <div class="r2">
        <input type="password" name="password" placeholder="Password (min 8)" aria-label="Password (minimum 8 characters)" autocomplete="new-password" minlength="8" required>
        <input type="password" name="password_confirm" placeholder="Confirm password" aria-label="Confirm password" autocomplete="new-password" required>
      </div>
      <button class="sb" type="submit">Create account</button>
      <p class="sw2">Already registered? <a href="<?= site_url('login') ?>">Log in</a></p>
    </form>
  </main>
</div>
</body>
</html>