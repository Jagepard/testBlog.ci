<?= $this->extend('blog/layout') ?>

<?= $this->section('title') ?>
<?= $material['title'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<br>
<h2><?= $material['title'] ?></h2>
<p><?= htmlspecialchars_decode($material['text'])?></p>
<?= $this->endSection() ?>