<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4">QR Code Generator</h2>
                <?php if(isset($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <p><?= $error_message ?></p>
                </div>
                <div class="text-center">
                    <a href="<?= base_url('admin/table/edittable') ?>" class="btn btn-warning text-white">Back</a>
                </div>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>
