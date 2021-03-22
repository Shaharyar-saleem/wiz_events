<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Admin User </h3>

  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> User Name </th>
                <th> Email </th>
                <th> Group Name </th>
                <th> creation Date </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($all_user as $key => $info): ?>
                <tr>
                  <td><?= $key+1 ?></td>
                  <td><?= $info["name"] ?></td>
                  <td><?= $info["email"] ?></td>
                  <td><?= $info["group_name"] ?></td>
                  <td><?= $info["creation_date"] ?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#update_group<?= $info["public_key"] ?>">Edit</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
