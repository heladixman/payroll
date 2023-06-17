<div class="bg-second">
  <div class="w-75 mx-auto py-3">
    <div id="cover">
      <div class="bg-dark h-25 rounded p-5"></div>
    </div>
    <div id="user-profile" class="align-items-center d-flex justify-content-between" style="padding-left:20px;padding-right:20px">
      <div id="user-data" class="align-items-center d-flex w-75" style="margin-top:-50px;">
        <img src="<?php echo base_url() ?>assets/image/defaultprofile.jpg" alt="" class="w-25 rounded-circle border border-3">
        <div class="text-start ms-3 float-left">
          <?php if (user() !== null): ?>
          <h5 class="mb-0"><?= user()->name; ?></h5>
          <div><?= user()->user_role; ?></div>
          <?php endif ?>
        </div>
      </div>
      <div id="user-settings" class="float-right w-25 text-end dropdown justify-content-end">
        <button id="change-data" class="btn btn-second">Edit Profile</button>
        <a href="javascript:void(0)" id="other" class="btn btn-forth">...</a>
        <ul class="dropdown-menu dropdown-menu-end" id="other-dropdown">
          <li>
            <a class="dropdown-item" href="/settings">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">Change Password</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="/logout">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="w-75 mx-auto my-4" style="padding-left:20px;padding-right:20px">
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
      <button class="nav-link" id="leave-tab" data-bs-toggle="tab" data-bs-target="#leave" type="button" role="tab" aria-controls="leave" aria-selected="false">Leave</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="payslip-tab" data-bs-toggle="tab" data-bs-target="#payslip" type="button" role="tab" aria-controls="payslip" aria-selected="false">Payslip</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active show" id="allowance" role="tabpanel" aria-labelledby="allowance-tab">
          <?php echo view('Pages/user/allowance/index');?>
      </div>
      <div class="tab-pane fade" id="bonus" role="tabpanel" aria-labelledby="bonus-tab">
          <?php echo view('Pages/user/bonus/index');?>
      </div>
      <div class="tab-pane fade" id="deduction" role="tabpanel" aria-labelledby="deduction-tab">
          <?php echo view('Pages/user/deduction/index');?>
      </div>
      <div class="tab-pane fade" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
          <?php echo view('Pages/user/attendance/index');?>
      </div>
      <div class="tab-pane fade" id="leave" role="tabpanel" aria-labelledby="leave-tab">
          <?php echo view('Pages/user/leave/index');?>
      </div>
      <div class="tab-pane fade" id="payslip" role="tabpanel" aria-labelledby="payslip-tab">
          <?php echo view('Pages/user/payslip/index');?>
      </div>
  </div>
</div>
<script>
  // JavaScript to handle the dropdown functionality
  const otherDropdown = document.getElementById('other-dropdown');
  const otherDropdownToggle = document.getElementById('other');

  otherDropdownToggle.addEventListener('click', () => {
    otherDropdown.classList.toggle('show');
    const isDropdownVisible = otherDropdown.classList.contains('show');
    otherDropdown.setAttribute('data-popper-placement', isDropdownVisible ? 'bottom-end' : '');
    otherDropdown.setAttribute('style', isDropdownVisible ? 'position: inherit; inset: 0px auto auto 0px; margin: 0px;' : '');
  });

  // Close the dropdown when clicking outside of it
  window.addEventListener('click', (event) => {
    if (!event.target.matches('#other')) {
      if (otherDropdown.classList.contains('show')) {
        otherDropdown.classList.remove('show');
      }
    }
  });
</script>