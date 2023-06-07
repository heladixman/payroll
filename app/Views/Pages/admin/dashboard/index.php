<div class="container-fluid mt-2">
    <div class="row mt-4">
        <div class="px-0 pb-2 align-items-center">
            <div class="float-start py-2"><span class="fs-5 p-0">Employee</span></div>
            <div class="float-end d-flex bg-first rounded p-2">
                <span class="p-0 me-2">Date:</span>
                <span class="p-0"><?= $this_date ?></span>
            </div>
        </div>
        <div class="col card text-left" style="width: 18rem;">
            <div class="card-body">
                <a href="/employee/attendance" class="d-flex">
                    <div>
                        <span class="my-0 text-dark">Present</span>
                        <h1 class="card-text text-left"><?= $present ?></h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col card text-left" style="width: 18rem;">
            <div class="card-body">
                <a href="/employee/attendance" class="d-flex">
                    <div>
                        <span class="my-0 text-dark">Absent</span>
                        <h1 class="card-text text-left"><?= $absent ?></h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col card text-left" style="width: 18rem;">
            <div class="card-body">
            <a href="/employee/attendance" class="d-flex">
                    <div>
                        <span class="my-0 text-dark">Leave</span>
                        <h1 class="card-text text-left"><?= $leave ?></h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="col card text-left" style="width: 18rem;">
            <div class="card-body">
            <a href="/employee/attendance" class="d-flex">
                    <div>
                        <span class="my-0 text-dark">Total</span>
                        <h1 class="card-text text-left"><?= $total ?></h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<section class="content mt-4">
    <div class="card border-0">
    <div class="bg-third rounded-se text-center w-100 p-3 text-light">Data Information</div>
        <div class="card-body rounded"> 
          <div class="table-responsive text-nowrap">
                <table class="table table-striped" id="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Data Name</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($data as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['name'] ?></div><div><span>Total: <?= $d['count'] ?></span></div></td>
                        <td class="text-center">
                            <a href="/settings">
                                <button type="button" class='btn btn-icon btn-first'>
                                    <ion-icon name="pencil-outline"></ion-icon>Details
                                </button>
                            </a>
                        </td>                         
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>