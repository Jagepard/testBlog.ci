<?= $this->extend('blog/layout') ?>

<?= $this->section('title') ?>
<?= $material['title'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<br>
<img src="<?= base_url() ?>uploads/<?= $material['image'] ?>" class="card-img-top" alt="<?= $material['title']?>">
<h2><?= $material['title'] ?></h2>
<p><?= htmlspecialchars_decode($material['text'])?></p>
<?= $this->endSection() ?>