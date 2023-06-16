<section class="content mt-2">
  <div class="card">
  <div class="btn-first rounded-se w-100 p-2">Attendance</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="attendance_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Date</th>
                      <th>Status</th>
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
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo date("M d, Y",strtotime($attendances[$key]['details']['date'])) ?></td>
                        <td>
                            <div class="row">
                            <?php 
                                foreach($attendances[$key]['log'] as $k => $v) :
                                ?>
                                <div class="col" style="">
                                  <p>
                                    <small><b><?php echo $lt_arr[$k].": <br/>" ?>
                                      <?php echo (date("h:i A",strtotime($attendances[$key]['log'][$k]['date'])))  ?> </b>
                                    </small>
                                  </p>
                                  </div>
                                <?php endforeach; ?>
                            </div>
                        </td>
                    </tr>
                  <?php }}?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>