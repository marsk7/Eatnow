<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Your Cart</h2>
        <?php if (empty($cartItems)): ?>
            <p class="text-center">Your cart is empty.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($cartItems as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item['menuitem_id']) ?> (<?= esc($item['quantity']) ?>)</h5>
                            <!-- Add more details as needed -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
