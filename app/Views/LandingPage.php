<?= $this->extend('template') ?>
<?= $this->section('content') ?>


<section class="py-5 bg-light" style="background-image: url(<?= base_url('images/marco-tortato.jpeg') ?>); background-position: center; min-height: 570px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 " style="color: white;">
                    <h1 class="display-2">Welcome to <br>Eat Now</h1>
                    <p class="lead">Scan the QR code to view our menu <br>and place your order.</p>
                    <a href="<?= base_url('scan') ?>" class="btn btn-warning btn-lg mb-3 mb-lg-0 text-white">Scan Now</a>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <div class="mb-3">
                        <a href="<?= base_url('chatui/'.$user['id']) ?>" class="btn btn-warning btn-lg text-white">Chat with Our AI Chef</a>
                    </div>
                    <div>
                        <img src="<?= base_url('images/QRsample.png') ?>" alt="QR Code" class="img-fluid rounded shadow" style="max-width: 100px; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Menu Section -->
    <section class="py-5">
        <div id="category" class="container">
            <h2 class="text-center mb-4">Our Menu</h2>
            <!-- Category Menu -->
            <div class="btn-group mb-4 d-flex justify-content-center" role="group" aria-label="Category Menu">
                <ul class="nav nav-pills">
                    <li class="menu-category">
                        <a href="<?= base_url('menu/all#category') ?>" id = "scroll" class="btn btn-warning text-white me-3 <?= ($category === null || $category === 'all') ? 'active' : '' ?>">All</a>
                    </li>
                    <li class="menu-category">
                        <a href="<?= base_url('menu/entrees#category') ?>" id = "scroll" class="btn btn-warning text-white me-3 <?= ($category === 'entrees') ? 'active' : '' ?>">Entrees</a>
                    </li>
                    <li class="menu-category">
                        <a href="<?= base_url('menu/main#category') ?>" id = "scroll" class="btn btn-warning text-white me-3 <?= ($category === 'main') ? 'active' : '' ?>">Main</a>
                    </li>
                    <li class="menu-category">
                        <a href="<?= base_url('menu/desserts#category') ?>" id = "scroll" class="btn btn-warning text-white me-3 <?= ($category === 'desserts') ? 'active' : '' ?>">Desserts</a>
                    </li>
                    <li class="menu-category">
                        <a href="<?= base_url('menu/drinks#category') ?>" id = "scroll" class="btn btn-warning text-white <?= ($category === 'drinks') ? 'active' : '' ?>">Drinks</a>
                    </li>
                </ul>
            </div>
        </div>


        <!-- Food Items -->
        <div id="main" class="food-category">
            <div class="container">
                <div class="row">
                    <?php foreach ($menuItems as $menuItem): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                        <img src="<?= base_url(esc($menuItem['picture_link'])) ?>" class="card-img-top" alt="<?= esc($menuItem['name']) ?>" style="max-width: 450px; max-height: 450px;">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($menuItem['name']) ?></h5>
                                <p class="card-text"><?= esc($menuItem['id']) ?></p>
                                <p class="card-text">$<?= esc($menuItem['price']) ?></p>
                                <p class="card-text"><?= str_repeat('&nbsp;', 8) . esc($menuItem['detail']) ?></p>
                                <button class="btn btn-warning btn-sm text-white add-to-cart" data-id=<?= esc($menuItem['id']) ?>>Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        </section>

    
    <script>
        // Auto scroll to menu
        document.addEventListener("DOMContentLoaded", function() {
            var targetAnchor = window.location.hash;
            if (targetAnchor) {
                var targetElement = document.querySelector(targetAnchor);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
        
        // Add to cart
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const menuItemId = this.getAttribute('data-id');

                    fetch('<?= base_url('cart/add/') ?>' + menuItemId, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // Assuming you are using CSRF protection
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert('Item added to cart');
                        } else {
                            alert('Failed to add item to cart');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        
        });
    </script>

 
<?= $this->endSection() ?>
