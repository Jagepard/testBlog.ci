<?= $this->extend('blog/layout') ?>

<?= $this->section('title', true) ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<br>
<?php foreach($materials as $material): ?>

    <h2><a class="link-underline link-underline-opacity-0" href="<?= base_url() ?>material/<?= $material['id'] ?>_<?= $material['slug'] ?>"><?= $material['title']?></a></h2>
    <p><?= htmlspecialchars_decode($material['text'])?></p>

<?php endforeach; ?>

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

