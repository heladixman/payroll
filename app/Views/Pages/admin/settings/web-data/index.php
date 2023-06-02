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
                              <button type="button" class='btn btn-second' id="editAllowance" data-id="<?= $d['id']?>">
                              <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
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