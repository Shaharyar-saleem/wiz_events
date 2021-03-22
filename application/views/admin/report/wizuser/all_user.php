<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Wiz User </h3>

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
                <th> Phone No </th>
                <th> Identity </th>
                <th> Join Date </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($all_user as $key => $info): ?>
                <tr>
                  <td><?= $key+1 ?></td>
                  <td><?= $info["name"] ?></td>
                  <td><?= $info["email"] ?></td>
                  <td><?= $info["phone_no"] ?></td>
                  <td><?= $info["identity_name"] ?></td>
                  <td><?= $info["join_date"] ?></td>
                  
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
