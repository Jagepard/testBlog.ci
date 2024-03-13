<?= $this->extend('Blog\layout') ?>

<?= $this->section('title') ?>
<?= $material['title'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<br>
<?php if (!empty($material['image'])): ?><img src="<?= base_url() ?>uploads/<?= $material['image'] ?>" class="card-img-top" alt="<?= $material['title']?>"><?php endif; ?>
<h2><?= $material['title'] ?></h2>
<p><?= htmlspecialchars_decode($material['text'])?></p>
<?= $this->endSection() ?>