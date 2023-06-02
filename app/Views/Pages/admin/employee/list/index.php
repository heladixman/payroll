<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertDeduction">New User</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">User</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>User</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $sts  = [1=> "active", 0=> "non-active"];
                    foreach($user as $d) {
                      $status = isset($sts[$d['active']]) ? $sts[$d['active']] : "Unknown"
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['name'] ?></td>
                        <td><?= $d['username'] ?></td>
                        <td><?= $d['email'] ?></td>
                        <td><?= $status ?></td>
                        <td>
                            <button type="button" class='btn btn-icon btn-success updateDeduction' data-bs-toggle="modal" data-bs-target="#editDeduction" data-id="<?= $d['id']?>">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-outline-danger deleteDeduction" data-bs-toggle="modal" data-bs-target="#deleteDeduction" data-id="<?= $d['id']?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>