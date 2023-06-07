<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertUser">New User</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">User</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $sts  = [1=> "active", 0=> "non-active"];
                    foreach($user as $d) {
                      $status = isset($sts[$d['active']]) ? $sts[$d['active']] : "Unknown"
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['name'] ?></td>
                        <td><?= $d['username'] ?></td>
                        <td><?= $d['email'] ?></td>
                        <td><?= $status ?></td>
                        <td>
                            <button type="button" class='btn btn-forth infoUser' data-bs-toggle="modal" data-bs-target="#infoUser" data-id="<?= $d['id']?>">
                              <span class="align-items-center me-1"><i class="fa-solid fa-eye"></i></span><span>Info</span>
                            </button>
                            <button type="button" class='btn btn-second updateUser' data-bs-toggle="modal" data-bs-target="#editUser" data-id="<?= $d['id']?>">
                              <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                            </button>
                            <button type="button" class="btn btn-third deleteUser" data-bs-toggle="modal" data-bs-target="#deleteUser" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/listuser.php');?>

<script>
  $(document).ready(function(){
    
    $('.updateUser').on('click', function(){
      $id = $(this).attr('data-id');
      $.ajax({
        url: '<?= site_url('employee/data/')?>'+ $id,
        type: 'GET',
        success: function(hasil){
          var $data = $.parseJSON(hasil);
            $('#userName').val($data.username);
            $('#userEmail').val($data.email);
            $('#userNumber').val($data.user_number);
            $('#userNames').val($data.user_name);
            $('#userPhoneNumber').val($data.phone_number);
            $('#userAddress').val($data.user_address);
        }
      })
    })

    $('.infoUser').on('click', function(){
      $id = $(this).attr('data-id');
      $.ajax({
        url: '<?= site_url('employee/data/')?>'+ $id,
        type: 'GET',
        success: function(hasil){
          var data = $.parseJSON(hasil);
            $('#iuserName').text(data.username);
            $('#iuserEmail').text(data.email);
            $('#iuserStatus').text(data.active);
            $('#iuserRole').text(data.user_role);
            $('#iuserNumber').text(data.user_number);
            $('#iuserNames').text(data.user_name);
            $('#iuserGender').text(data.sex);
            $('#iuserPhoneNumber').text(data.phone_number);
            $('#iuserAddress').text(data.user_address);
            $('#iuserPosition').text(data.position_name);
        }
      })
    })
    
  })
</script>