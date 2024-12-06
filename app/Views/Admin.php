<?= $this->extend('AdminTemplate') ?>
<?= $this->section('admin') ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Items Management</h2>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-6 mb-3 mb-lg-0">
            <form method="get" action="<?= base_url('admin/'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your search..." name="search">
                    <button class="btn btn-warning text-white" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="<?= base_url('admin/edititem');?>" class="btn btn-warning text-white">Add New Dish</a>
        </div>
    </div>

    <table class="table table-striped" style="max-width: 100%;">
        <thead>
            <tr>
                <th>Dish ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th> 
                <th>Picture</th>
                <th>Detail</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody style="max-width: 100%;">
        <?php if (!empty($menuItems)): ?>
            <?php foreach ($menuItems as $menuItem): ?>
            <tr>
                <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;"><?= esc($menuItem['id']) ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($menuItem['name']) ?></td>
                <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;"><?= esc($menuItem['category_name']) ?></td>
                <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">$<?= esc($menuItem['price']) ?></td>
                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($menuItem['picture_link']) ?></td>
                <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;"><?= esc($menuItem['detail']) ?></td>
                <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                    <a href="<?= base_url('showitem/'.$menuItem['id']);?>">
                        <button class="btn btn-sm btn-success me-2 mb-1"><i class="bi bi-eye-fill"></i></button>
                    </a>
                    <a href="<?= base_url('admin/edititem/'.$menuItem['id']);?>">
                        <button class="btn btn-sm btn-warning me-2 mb-1"><i class="bi bi-pencil-square"></i></button>
                    </a>
                    <a href="<?= base_url('admin/delete/'.$menuItem['id']);?>" onclick="return confirm('Are you sure you want to delete this item?')">
                        <button class="btn btn-sm btn-danger me-2 mb-1"><i class="bi bi-trash-fill" ></i></button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No menu items found</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>
