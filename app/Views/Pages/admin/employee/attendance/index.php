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
                      <th>Date</th>
                      <th>User Number</th>
                      <th>Name</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $lt_arr = [1 => " Time in", 2 => "Break Out", 3 => "Break In", 4 => "Time Out", 5 => "Overtime In", 6 => "Overtime Out"];
                    if(!empty($attendance)){
                      $attendances = [];
                      foreach($attendance as $d) { 
                        $date = date("Y-m-d", strtotime($d['datetime_log']));
                        $time = date("H-i-s", strtotime($d['datetime_log']));
                        $log_type = isset($lt_arr[$d['log_type']])? $lt_arr[$d['log_type']]: 'Unknown';

                        $attendanceKey = $d['user_id'] . "_" . $date;

                        $attendances[$attendanceKey]['details'] = array("eid"=>$d['user_id'],"name"=>$d['user_name'],"eno"=>$d['user_number'],"date"=>$date);
                        if($d['log_type'] == 1 || $d['log_type'] == 3){
                          if(!isset($attendance[$attendanceKey]['log'][$d['log_type']]))
                          $attendances[$attendanceKey]['log'][$d['log_type']] = array('id'=>$d['id'],"date" =>  $d['datetime_log']);
                        }else{
                          $attendances[$attendanceKey]['log'][$d['log_type']] = array('id'=>$d['id'],"date" =>  $d['datetime_log']);
                        }
                    }
                        foreach($attendances as $key => $value) {
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo date("M d, Y",strtotime($attendances[$key]['details']['date'])) ?></td>
                        <td><?= $attendances[$key]['details']['eno'] ?></td>
                        <td><?= $attendances[$key]['details']['name'] ?></td>
                        <td>
                            <div class="row">
                            <?php 
                                foreach($attendances[$key]['log'] as $k => $v) :
                                ?>
                                <div class="col-sm-6" style="">
                                  <p>
                                    <small><b><?php echo $lt_arr[$k].": <br/>" ?>
                                      

                                      <?php echo (date("h:i A",strtotime($attendances[$key]['log'][$k]['date'])))  ?> </b>
                                      <button class="btn btn-third deleteSingleAttendance" data-bs-toggle="modal" data-bs-target="#deleteSingleAttendance" data-id="<?= $attendances[$key]['log'][$k]['id']?>">
                                        <span class="align-items-center me-1 "><i class="fa-solid fa-trash-can"></i></span>
                                      </button>
                                    </small>
                                  </p>
                                  </div>
                                <?php endforeach; ?>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-third deleteAttendance" data-bs-toggle="modal" data-bs-target="#deleteAttendance" data-id="<?php echo $key?>">
                              <span class="align-items-center me-1"><i class="fa-solid fa-trash-can"></i></span><span>Delete</span>
                            </button>
                        </td>
                    </tr>
                  <?php }}?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php echo view('Pages/modals/attendance');?>
<script>
  $(document).ready(function(){

    $('.deleteSingleAttendance').on('click', function(){
      var id = $(this).attr('data-id');
      console.log(id);
      $('#attendanceId').val(id);
    })

    $('.deleteAttendance').on('click', function(){
      var key = ''+($(this).attr('data-id')).toString()+''
      var data = key.split("_");
      var id   = data[0]
      var date = data[1]
      console.log(id)
      console.log(date)
      $('#attendanceid').val(id);
      $('#attendancedate').val(date);
    })
    
  })
</script>