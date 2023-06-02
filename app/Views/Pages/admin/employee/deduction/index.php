<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertDeduction">New Deduction</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Deduction</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Employee Name</th>
                      <th>Allowance Name</th>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Effective Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $types = [0=> "Monthly", 1=> "Once"];
                    foreach($deduction as $d) {
                        $deductionType =  isset($types[$d['type']]) ? $types[$d['type']]: "Unknown"; 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['user_name'] ?></td>
                        <td><?= $d['deduction_name'] ?></td>
                        <td><?= $d['amount'] ?></td>
                        <?php if($deductionType === "Monthly"):?>
                            <td><?= $deductionType ?></td>
                            <td>-</td>
                        <?php else :?>
                            <td><?= $deductionType ?></td>
                            <td><? $d['effective_date']?></td>
                        <?php endif ?>
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