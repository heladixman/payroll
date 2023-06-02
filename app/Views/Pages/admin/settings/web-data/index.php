<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Web Data</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="webdata_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Value</th>
                      <th>Last Updated</th>
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
                        <td><?= date('Y-m-d', strtotime($d['updateAt']))  ?></td>
                        <td>
                              <button type="button" class='btn-second' id="editAllowance" data-id="<?= $d['id']?>">
                              <i class="fa-solid fa-pencil fa-xs"></i><span class="ms-1">Edit</span>
                              </button>
                              <button type="button" class="btn-third" id="deleteAllowance" data-id="<?= $d['id']?>">
                              <i class="fa-regular fa-trash-can"></i><span class="ms-1">Delete</span>
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