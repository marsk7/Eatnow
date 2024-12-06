<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <h2>Menu Item Details</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <p><strong>No.</strong> <?= esc($menuItem['id']) ?></p>
                        <p><strong>Restaurant:</strong> <?= esc($restaurant['name']) ?></p>
                        <p><strong>Category:</strong> <?= esc($category['name']) ?></p>
                        <p><strong>Name:</strong> <?= esc($menuItem['name']) ?></p>
                        <p><strong>Picture:</strong> <img src="<?= base_url($menuItem['picture_link']) ?>" alt="Menu Item Picture" style="max-width: 400px; max-height: 400px;"></p>
                        <p><strong>Detail:</strong> <?= esc($menuItem['detail']) ?></p>
                        <p><strong>Price:</strong> $<?= esc($menuItem['price']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>


