<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4"><?= isset($tables) ? 'Edit Table' : 'Add Table' ?></h2>
                <?php if (!empty($tables['id'])): ?>
                    <p><strong>Table ID:</strong> <?= esc($tables['id']) ?></p>
                <?php endif; ?>
                <form method="post" action="<?= base_url('admin/table/edittable' . (isset($tables) ? '/' . $tables['id'] : '')) ?>">
                    <div class="mb-3">
                        <label for="restaurant_id" class="form-label">Reataurant ID</label>
                        <input type="form-control" class="form-control" id="restaurant_id" name="restaurant_id" value="<?= isset($tables) ? esc($tables['restaurant_id']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="qrcode_link" class="form-label">QR Code Link</label>
                        <textarea class="form-control" id="qrcode_link" name="qrcode_link"><?= isset($tables) ? esc($tables['qrcode_link']) : '' ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning text-white"><?= isset($tables) ? 'Update Table' : 'Add Table' ?></button>
                    <a href="<?= base_url('admin/table/qrgenerator?tableid=' . ($tables['id'] ?? null));?>" class="btn btn-warning text-white">Generate QR Code</a>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
