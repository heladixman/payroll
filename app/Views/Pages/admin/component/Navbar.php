<div class="bg-first rounded">
  <nav class="layout-navbar p-3" id="layout-navbar">
    <div class="navbar-nav-right d-flex align-items-center justify-content-between" id="navbar-collapse">
      <div class="navbar-nav align-items-center">
        <div class="row">
          <div class="col-sm text-capitalize">
            <h5 class=mb-0><?= $title; ?></h5>
            <ol class="breadcrumb float-sm-right mb-0">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
              <?php if (isset($parent)) : ?>
                <li class="breadcrumb-item active"><a href="<?= $parent['url']; ?>"><?= $parent['name']; ?></a></li>
              <?php endif;?>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div>
        </div>
      </div>
      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link d-flex hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online align-items-center d-flex text-end justify-content-end" id="profile-picture">
              <img src="<?php echo base_url() ?>assets/image/defaultprofile.jpg" alt="" class="w-25 rounded-circle">
              <div class="text-start ms-3">
                <h5 class="mb-0">nama</h5>
                <div>role</div>
              </div>
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" id="profile-dropdown">
            <li>
              <a class="dropdown-item" href="/profile/settings">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/settings">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/logout">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</div>