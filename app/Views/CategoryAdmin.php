<?= $this->extend('AdminTemplate') ?>
<?= $this->section('admin') ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Categoriess Management</h2>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-3 mb-lg-0">
            <form method="get" action="<?= base_url('admin/category'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your search..." name="search">
                    <button class="btn btn-warning text-white" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="<?= base_url('admin/category/editcategory');?>" class="btn btn-warning text-white">Add New Category</a>
        </div>
    </div>
    
    <!-- Table to display categories -->
    <table class="table table-striped" style="max-width: 100%;">
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Reataurant</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($category['id']) ?></td>
                        <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($category['restaurant_name']) ?></td>
                        <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($category['name']) ?></td>
                        <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                            <a href="<?= base_url('admin/category/showcategory/'.$category['id']);?>">
                                <button class="btn btn-sm btn-success me-2 mb-1"><i class="bi bi-eye-fill"></i></button>
                            </a>
                            <a href="<?= base_url('admin/category/editcategory/'.$category['id']);?>">
                                <button class="btn btn-sm btn-warning me-2 mb-1"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= base_url('admin/category/delete/'.$category['id']);?>" onclick="return confirm('Are you sure you want to delete this category?')">
                                <button class="btn btn-sm btn-danger me-2 mb-1"><i class="bi bi-trash-fill" ></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No categories found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>
