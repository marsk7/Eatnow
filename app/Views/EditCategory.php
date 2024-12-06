<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4"><?= isset($categories) ? 'Edit Category' : 'Add Category' ?></h2>
                <?php if (!empty($categories['id'])): ?>
                    <p><strong>Category ID:</strong> <?= esc($categories['id']) ?></p>
                <?php endif; ?>
                <form method="post" action="<?= base_url('admin/category/editcategory' . (isset($categories) ? '/' . $categories['id'] : '')) ?>">
                    <div class="mb-3">
                        <label for="restaurant_id" class="form-label">Reataurant ID</label>
                        <input type="form-control" class="form-control" id="restaurant_id" name="restaurant_id" value="<?= isset($categories) ? esc($categories['restaurant_id']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="form-control" class="form-control" id="name" name="name" value="<?= isset($categories) ? esc($categories['name']) : '' ?>" required>
                    </div>
                    <button type="submit" class="btn btn-warning text-white"><?= isset($categories) ? 'Update Category' : 'Add Category' ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
