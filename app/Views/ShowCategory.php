<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <h2>Category Details</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Category ID:</strong> <?= esc($category['id']) ?></p>
                        <p><strong>Restaurant Name:</strong> <?= esc($restaurant['name']) ?></p>
                        <p><strong>Category Name:</strong> <?= esc($category['name']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>