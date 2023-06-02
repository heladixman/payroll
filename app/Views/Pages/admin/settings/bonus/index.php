<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertBonus">New Bonus</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Bonus</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="bonus_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bonus</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($bonus as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['name'] ?></div><div><p>Description: <?= $d['description'] ?></p></div></td>
                        <td>
                              <button type="button" class='btn btn-second updateBonus' data-bs-toggle="modal" data-bs-target="#editBonus" data-id="<?= $d['id']?>" data-name="<?= $d['name']?>" data-description="<?= $d['description']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                              </button>
                              <button type="button" class="btn btn-third deleteBonus" data-bs-toggle="modal" data-bs-target="#deleteBonus" data-id="<?= $d['id']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-trash-can"></i></span><span>Delete</span>
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
<?php echo view('Pages/modals/bonus.php');?>