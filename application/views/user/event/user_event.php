<section class="container my-4">
  <?php foreach ($user_event as $key => $info): ?>
    <div class="card w-100 mb-2">
      <div class="card-body">
        <a href="<?= '#' ?>">
          <h5 class="card-title font-weight-bold"><?= $info["event_title"] ?></h5>
        </a>
        <p class="card-text"><span class="font-weight-bold">Description</span> <?= $info["description"] ?></p>
        <p class="card-text"><span class="font-weight-bold">Address:</span> <?= $info["event_address"] ?></p>
        <p class="card-text"><span class="font-weight-bold">Status:</span> <?= ($info["event_status"] == DRAFT)?"Draft":"Active" ?></p>
        <!-- <a href="#" class="btn btn-primary">Button</a> -->
      </div>
   </div>
  <?php endforeach; ?>

</section>
