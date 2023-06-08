<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertAttendance">New Attendance</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Attendance</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Employee Name</th>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $lt_arr = [1 => " Time in", 2 => "Break Out", 3 => "Break In", 4 => "Time Out"];
                    foreach($attendance as $d) { 
                        $date = date("Y-m-d", strtotime($d['datetime_log']));
                        $time = date("H-i-s", strtotime($d['datetime_log']));
                        $log_type = isset($lt_arr[$d['log_type']])? $lt_arr[$d['log_type']]: 'Unknown';
                        $sample[$d['user_id']."_".$date]['details'] = array("eid"=>$d['user_id'],"name"=>$d['user_name'],"eno"=>$d['user_number'],"date"=>$date);
                        die(var_dump($sample[$d['user_id']."_".$date]['details']))
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['user_name'] ?></td>
                        <td><?= $date ?></td>
                        <td><?= $log_type ?></td>
                        <td><?= $time ?></td>
                        <td>
                            <button type="button" class='btn btn-second updateAttendance' data-bs-toggle="modal" data-bs-target="#editAttendance" data-id="<?= $d['id']?>" data-user="<?= $d['user_id']?>" data-type="<?= $d['log_type']?>" data-time="<?= $d['datetime_log']?>">
                              <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                            </button>
                            <button type="button" class="btn btn-third deleteAttendance" data-bs-toggle="modal" data-bs-target="#deleteAttendance" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/attendance');?>