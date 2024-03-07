<?= $this->extend('Blog\layout') ?>

<?= $this->section('title', true) ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<br>

<div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>

<?php foreach($materials as $material): ?>

    <div class="col">
    <div class="card">
    <a href="<?= base_url() ?>material/<?= $material['id'] ?>_<?= $material['slug'] ?>">
    <img src="<?= base_url() ?>uploads/<?= $material['image'] ?>" class="card-img-top" alt="<?= $material['title']?>">
    </a>
      <div class="card-body">
        <h5 class="card-title"><a class="link-secondary link-underline link-underline-opacity-0" href="<?= base_url() ?>material/<?= $material['id'] ?>_<?= $material['slug'] ?>"><?= $material['title']?></a></h5>
        <!-- <p class="card-text"><?= htmlspecialchars_decode($material['text'])?></p> -->
      </div>
    </div>
  </div>

<?php endforeach; ?>

</div>
<br>
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

