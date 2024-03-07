<?= $this->extend('Admin\layout') ?>

<?= $this->section('title', true) ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<table class="table table-striped table-hover">
<tr>
    <td>#</td>
    <td></td>
    <td></td>
    <td><a href="<?= base_url() ?>admin/material/add"><button type="button" class="btn btn-info">add</button></a></td>
</tr>
<?php foreach($materials as $material): ?>
    <tr>
    <td><p><?= $material['id']?></p></td>
    <td><?php if (!empty($material['image'])): ?><img src="<?= base_url() ?>uploads/thumb/<?= $material['image']?>"><?php endif; ?></td>
    <td><p><?= $material['title']?></p></td>

    <td>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="<?= base_url() ?>admin/material/edit/<?= $material['id'] ?>_<?= $material['slug'] ?>"><button type="button" class="btn btn-success">edit</button></a>
        <a href="<?= base_url() ?>admin/material/delete?id=<?= $material['id'] ?>"><button type="button" class="btn btn-danger">delete</button></a>
    </div>
    </td>
    </tr>
<?php endforeach; ?>

</table>
<?php if (!empty($pager) && $totalPages > 1) : ?>
<div class="pagination justify-content-center mb-4">
        <!-- //echo $pager->simpleLinks('group1', 'bs_simple'); -->
        <?= $pager->links('group1', 'bs_full'); ?>
    <div class="btn-group pagination justify-content-center mb-4" role="group" aria-label="pager counts">
        &nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-light"><?= 'Страница '.$currentPage.' из '.$totalPages; ?></button>
    </div>
</div>
<?php endif ?>

<?= $this->endSection() ?>