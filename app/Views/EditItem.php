<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4"><?= isset($menuItems) ? 'Edit Item' : 'Add Item' ?></h2>
                <?php if (!empty($menuItems['id'])): ?>
                    <p><strong>MenuItem ID:</strong> <?= esc($menuItems['id']) ?></p>
                <?php endif; ?>
                <form method="post" action="<?= base_url('admin/edititem' . (isset($menuItems) ? '/' . $menuItems['id'] : '')) ?>">
                    <div class="mb-3">
                        <label for="restaurant_id" class="form-label">Restaurant ID</label>
                        <input type="restaurant_id" class="form-control" id="restaurant_id" name="restaurant_id" value="<?= isset($menuItems) ? esc($menuItems['restaurant_id']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category ID</label>
                        <input type="category_id" class="form-control" id="category_id" name="category_id" value="<?= isset($menuItems) ? esc($menuItems['category_id']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= isset($menuItems) ? esc($menuItems['name']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="price" class="form-control" id="price" name="price" value="<?= isset($menuItems) ? esc($menuItems['price']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <input type="detail" class="form-control" id="detail" name="detail" value="<?= isset($menuItems) ? esc($menuItems['detail']) : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="picture_link" class="form-label">Picture</label>
                        <textarea class="form-control" id="picture_link" name="picture_link"><?= isset($menuItems) ? esc($menuItems['picture_link']) : '' ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning text-white"><?= isset($menuItems) ? 'Update Item' : 'Add Item' ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
