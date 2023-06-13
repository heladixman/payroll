<div class="layout-wrapper layout-content-navbar">
  <div class="d-flex h-100">
    <div class="flex-shrink-0 p-3 border-end d-none d-sm-block" style="width: 280px;" id="sidebar">
      <a href="/dashboard" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-5 fw-normal">Payroll System</span>
      </a>
      <ul class="list-unstyled ps-0">
        <li>
          <a href="/dashboard">
            <button class="btn btn-light rounded p-2">
              <span class="m-2"><i class="fa-solid fa-house"></i></span>
              <span class="fw-normal">Dashboard</span>
            </button>
          </a>
        </li>
        <li>
          <button class="btn btn-toggle rounded p-2 collapsed" data-bs-toggle="collapse" data-bs-target="#employee-collapse" aria-expanded="false">
              <span class="m-2"><i class="fa-solid fa-user-large"></i></span>
              <span class="test fw-normal">Employee</span>
          </button>
            <div class="collapse" id="employee-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="<?php echo base_url() ?>employee/attendance" class="nav-link">Attandance</a></li>
                <li><a href="<?php echo base_url() ?>employee/allowance" class="nav-link">Allowance</a></li>
                <li><a href="<?php echo base_url() ?>employee/bonus" class="nav-link">Bonus</a></li>
                <li><a href="<?php echo base_url() ?>employee/deduction" class="nav-link">Deduction</a></li>
                <li><a href="<?php echo base_url() ?>employee/leave" class="nav-link">Leave</a></li>
                <li><a href="<?php echo base_url() ?>employee" class="nav-link">List</a></li>
              </ul>
            </div>
        </li>
        <li>
          <a href="/payroll">
            <button class="btn btn-light rounded p-2">
              <span class="m-2"><i class="fa-solid fa-receipt"></i></span>
              <span class="fw-normal">Payroll</span>
            </button>
          </a>
        </li>
        <li>
          <a href="/settings">
            <button class="btn btn-light rounded p-2">
              <span class="m-2"><i class="fa-solid fa-gear"></i></span>
              <span class="fw-normal">Settings</span>
            </button>
          </a>
        </li>
      </ul>
    </div>