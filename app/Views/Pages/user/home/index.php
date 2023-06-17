<nav class="navbar navbar-expand-lg navbar-light bg-second sticky-top p-3">
  <a class="navbar-brand" href="/"><?= $appName ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/profile">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">Dashboard</a>
      </li>
    </ul>
  </div>
</nav>

<div class="h-100 d-flex align-items-center justify-content-center">
  <div id="content" class="w-50">
    <?= view('Pages\message\index')?>
    <h3 class="text-center mb-3">Absen</h3>
    <div id="time">
      <h5 class="text-center mb-0">Time</h5>
      <div class="text-center mb-3" id="defaultTime">00:00:00</div>
    </div>
    <?php echo form_open(site_url('today/attendance'));?>
      <div class="form-group mb-3">
        <label>User Number</label>
        <input type="text" class="form-control" id="userNumber" name="userNumber" required>
      </div>
      <div class="form-group mb-3">
        <label class="form-label align-self-center mb-0 w-50">Choose Time</label>
          <select name="attendanceType" id="attendanceType" class="form-select w-65" required>
            <option value="1">Time In</option>
            <option value="2">Break Out</option>
            <option value="3">Break In</option>
            <option value="4">Time Out</option>
            <option value="5">Overtime In</option>
            <option value="6">Overtime Out</option>
          </select>
      </div>
      <button type="submit" class="btn btn-primary mt-2 w-100">Submit</button>
    <?php echo form_close();?>
  </div>
</div>

<script>
  function currentTime(){
    var setTime = new Date();
    var clockingTime = setTime.toLocaleTimeString();
    document.getElementById('defaultTime').innerHTML = clockingTime;
  }
  setInterval(currentTime, 1000);
</script>