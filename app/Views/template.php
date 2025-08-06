<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eat Now</title>
    <link rel="icon" type="image/png" href="/favicon.ico">
    <!-- This is the main stylesheet for Bootstrap. It includes all the CSS necessary for Bootstrap's components and utilities to work. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include Bootstrap Icons -->
    <!-- This link imports the Bootstrap Icons library, which provides a wide range of SVG icons for use in your projects. -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>">Eat Now - Scan Order</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= service('router')->getMatchedRoute()[0] == '/' ? 'active' : ''; ?>" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <?php if (session()->get('isAdmin')): ?>
                            <li class="nav-item">
                                <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'admin' ? 'active' : ''; ?>" href="<?= base_url("admin"); ?>">Admin</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url("logout"); ?>">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?= service('router')->getMatchedRoute()[0] == 'login' ? 'active' : ''; ?>" href="<?= base_url("login"); ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
              </div>
          </div>
      </nav>
  </header>
   
  <main>
        <div style="max-width: 100%; margin-bottom: 100px; margin: 0 auto;">
            <?= $this->renderSection('content') ?> <!-- Placeholder for page content -->
        </div>
  </main>

  <footer class="bg-success text-light py-4">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <p>&copy; <?= date('Y') ?> Eat Now. All rights reserved.</p>
                  <a>Dishes from </a><a href="https://madorestaurant.com.au/" class="text-light">Mado Restaurant Brisbane</a>
              </div>
              <div class="col-md-6 text-md-end mt-5">
                  <a href="#" class="text-light me-3">Privacy Policy</a>
                  <a href="#" class="text-light">Terms of Service</a>
              </div>
          </div>
      </div>
  </footer>
    <!-- This script includes all of Bootstrap's JavaScript-based components and behaviors, such as modal windows, dropdowns, and tooltips.  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
