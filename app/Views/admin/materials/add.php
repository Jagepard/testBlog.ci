<?= $this->extend('admin/layout') ?>

<?= $this->section('title', true) ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<br>
<form action="<?= base_url() ?>/admin/material/create" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
<input type='hidden' name='redirect'>
<div class="mb-3">
    <label for="file" class="form-label">Фото</label>
    <input type="file" name="file" id="file">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Заголовок</label>
    <input type="text" class="form-control" id="title" name="title" value="">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Текст</label>
    <textarea class="form-control" id="text" name="text"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>
<?= $this->endSection() ?>