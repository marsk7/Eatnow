<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <h2>Table Details</h2>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Table ID:</strong> <?= esc($table['id']) ?></p>
                        <p><strong>Restaurant Name:</strong> <?= esc($restaurant['name']) ?></p>
                        <p><strong>QR Code Link:</strong> <img src="<?= base_url($table['qrcode_link']) ?>" alt="Table Qrcode Link" width="300" height="300"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>