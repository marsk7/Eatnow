<?= $this->extend('AdminTemplate') ?>
<?= $this->section('admin') ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tables Management</h2>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-6 mb-3 mb-lg-0">
            <form method="get" action="<?= base_url('admin/table'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your search..." name="search">
                    <button class="btn btn-warning text-white" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="<?= base_url('admin/table/edittable');?>" class="btn btn-warning text-white">Add New Table</a>
        </div>
    </div>

    <table class="table table-striped" style="max-width: 100%;">
        <thead>
            <tr>
                <th>Table ID</th>
                <th>Reataurant</th>
                <th>QR Code Link</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody style="max-width: 100%;">
            <?php if (!empty($tables)): ?>
                <?php foreach ($tables as $table): ?>
                    <tr>
                        <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;"><?= esc($table['id']) ?></td>
                        <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($table['restaurant_name']) ?></td>
                        <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;"><?= esc($table['qrcode_link']) ?></td>
                        <td style="max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                            <a href="<?= base_url('admin/table/showtable/'.$table['id']);?>">
                                <button class="btn btn-sm btn-success me-2 mb-1"><i class="bi bi-eye-fill"></i></button>
                            </a>
                            <a href="<?= base_url('admin/table/edittable/'.$table['id']);?>">
                                <button class="btn btn-sm btn-warning me-2 mb-1"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= base_url('admin/table/delete/'.$table['id']);?>" onclick="return confirm('Are you sure you want to delete this table?')">
                                <button class="btn btn-sm btn-danger me-2 mb-1"><i class="bi bi-trash-fill" ></i></button>
                            </a>
                        </td>
                    </tr>               
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No table found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>
