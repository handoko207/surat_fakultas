<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page body -->
<section class="section">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Default Layout</h4>
    </div>
    <div class="card-body">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi? Ullam quaerat similique iusto temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic deleniti? Placeat delectus quibusdam ratione
      ullam!
    </div>
  </div>
</section>

<?= $this->endSection(); ?>
<?= $this->section('javascript'); ?>
<?= $this->endSection(); ?>