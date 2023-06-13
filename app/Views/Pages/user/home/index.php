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
      <button class="nav-link" id="attendance-tab" data-bs-toggle="tab" data-bs-target="#attendance" type="button" role="tab" aria-controls="attendance" aria-selected="false">Attendance</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
    </li>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active show" id="allowance" role="tabpanel" aria-labelledby="allowance-tab">
          <?php echo view('Pages/user/allowance/index.php');?>
      </div>
      <div class="tab-pane fade" id="bonus" role="tabpanel" aria-labelledby="bonus-tab">
          <?php echo view('Pages/user/bonus/index.php');?>
      </div>
      <div class="tab-pane fade" id="deduction" role="tabpanel" aria-labelledby="deduction-tab">
          <?php echo view('Pages/user/deduction/index.php');?>
      </div>
      <div class="tab-pane fade" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
          <?php echo view('Pages/user/attendance/index.php');?>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <?php echo view('Pages/user/profile/index.php');?>
      </div>
  </div>
</div>