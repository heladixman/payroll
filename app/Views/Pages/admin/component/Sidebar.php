<div class="layout-wrapper layout-content-navbar">
  <div class="d-flex h-100">
    <div class="flex-shrink-0 p-3 shadow-lg border border-right-2 rounded d-none d-sm-block" style="width: 280px;" id="sidebar">
      <a href="/dashboard" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-5 fw-semibold">Payroll System</span>
      </a>
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
          <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse" data-bs-target="#employee-collapse" aria-expanded="false">Employee
          </button>
          <div class="collapse" id="employee-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="<?php echo base_url() ?>employee/attandance" class="nav-link rounded">Attandance</a></li>
              <li><a href="<?php echo base_url() ?>employee/allowance" class="nav-link rounded">Allowance</a></li>
              <li><a href="<?php echo base_url() ?>employee/bonus" class="nav-link rounded">Bonus</a></li>
              <li><a href="<?php echo base_url() ?>employee/deduction" class="nav-link rounded">Deduction</a></li>
              <li><a href="<?php echo base_url() ?>employee/leave" class="nav-link rounded">Leave</a></li>
              <li><a href="<?php echo base_url() ?>employee" class="nav-link rounded">List</a></li>
            </ul>
          </div>
        </li>
        <li class="mb-1">
          <button class="btn btn-toggle rounded collapsed" data-bs-toggle="collapse" data-bs-target="#settings-collapse" aria-expanded="false">Settings
          </button>
          <div class="collapse" id="settings-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="<?php echo base_url() ?>settings/allowance" class="nav-link rounded"><ion-icon name="menu-outline"></ion-icon>Allowance</a></li>
              <li><a href="<?php echo base_url() ?>settings/bonus" class="nav-link rounded">Bonus</a></li>
              <li><a href="<?php echo base_url() ?>settings/deduction" class="nav-link rounded">Deduction</a></li>
              <li><a href="<?php echo base_url() ?>settings/department" class="nav-link rounded">Departments</a></li>
              <li><a href="<?php echo base_url() ?>settings/payment-method" class="nav-link rounded">Payment Method</a></li>
              <li><a href="<?php echo base_url() ?>settings/position" class="nav-link rounded">Positions</a></li>
              <li><a href="<?php echo base_url() ?>settings/salary" class="nav-link rounded">Salaries</a></li>
              <li><a href="<?php echo base_url() ?>settings/web-data" class="nav-link rounded">Web Data</a></li>
            </ul>
          </div>
        </li>
        <button class="btn">Payroll</button>
      </ul>
    </div>