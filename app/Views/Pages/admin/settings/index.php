<div class="my-4">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="allowance-tab" data-bs-toggle="tab" data-bs-target="#allowance" type="button" role="tab" aria-controls="home" aria-selected="true">Allowance</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="bonus-tab" data-bs-toggle="tab" data-bs-target="#bonus" type="button" role="tab" aria-controls="bonus" aria-selected="false">Bonus</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="deduction-tab" data-bs-toggle="tab" data-bs-target="#deduction" type="button" role="tab" aria-controls="deduction" aria-selected="false">Deduction</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="department-tab" data-bs-toggle="tab" data-bs-target="#department" type="button" role="tab" aria-controls="department" aria-selected="false">Department</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="position-tab" data-bs-toggle="tab" data-bs-target="#position" type="button" role="tab" aria-controls="position" aria-selected="false">Position</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">Payment Method</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="salary-tab" data-bs-toggle="tab" data-bs-target="#salary" type="button" role="tab" aria-controls="salary" aria-selected="false">Salary</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="webdata-tab" data-bs-toggle="tab" data-bs-target="#webdata" type="button" role="tab" aria-controls="webdata" aria-selected="false">Web Data</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active show" id="allowance" role="tabpanel" aria-labelledby="allowance-tab">
          <?php echo view('Pages/admin/settings/allowance/index.php');?>
      </div>
      <div class="tab-pane fade" id="bonus" role="tabpanel" aria-labelledby="bonus-tab">
          <?php echo view('Pages/admin/settings/bonus/index.php');?>
      </div>
      <div class="tab-pane fade" id="deduction" role="tabpanel" aria-labelledby="deduction-tab">
          <?php echo view('Pages/admin/settings/deduction/index.php');?>
      </div>
      <div class="tab-pane fade" id="department" role="tabpanel" aria-labelledby="department-tab">
          <?php echo view('Pages/admin/settings/department/index.php');?>
      </div>
      <div class="tab-pane fade" id="position" role="tabpanel" aria-labelledby="position-tab">
          <?php echo view('Pages/admin/settings/position/index.php');?>
      </div>
      <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
          <?php echo view('Pages/admin/settings/payment-method/index.php');?>
      </div>
      <div class="tab-pane fade" id="salary" role="tabpanel" aria-labelledby="salary-tab">
          <?php echo view('Pages/admin/settings/salary/index.php');?>
      </div>
      <div class="tab-pane fade" id="webdata" role="tabpanel" aria-labelledby="webdata-tab">
          <?php echo view('Pages/admin/settings/web-data/index.php');?>
      </div>
  </div>
</div>