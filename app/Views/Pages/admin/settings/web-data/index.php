<section class="content mt-3">
    <div class="card">
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Value</th>
                      <th>Create At</th>
                      <th>Update At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($webdata as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['name'] ?></td>
                        <td><?= $d['value'] ?></td>
                        <td><?= $d['createAt'] ?></td>
                        <td><?= $d['updateAt'] ?></td>
                        <td>
                              <button type="button" class='btn btn-icon btn-success' id="editAllowance" data-id="<?= $d['id']?>">
                                <ion-icon name="pencil-outline"></ion-icon>
                              </button>
                              <button type="button" class="btn btn-icon btn-outline-danger" id="deleteAllowance" data-id="<?= $d['id']?>">
                                <ion-icon name="trash-outline"></ion-icon>
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