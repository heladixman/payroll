function sidebar(){
    const toggle = document.getElementById('sidebar-toggle')
    const sidebar = document.getElementById('sidebar')
    toggle.addEventListener('click', function(event){
        sidebar.classList.toggle('d-sm-block')
    }, {once:true})
};

  function profileDropdown(){
    var button1 = document.getElementById('profile-picture')
    var buttonDrop = document.getElementById('profile-dropdown')
    button1.addEventListener('click', function(e){
        buttonDrop.classList.toggle('show')
    }, {once: true})
  }

$(document).ready(function () {
    // For datatables in settings
    $('#allowance_table').DataTable();
    $('#bonus_table').DataTable();
    $('#deduction_table').DataTable();
    $('#department_table').DataTable();
    $('#position_table').DataTable();
    $('#payment_table').DataTable();
    $('#salary_table').DataTable();
    $('#webdata_table').DataTable();
    $('#attendance_table').DataTable();

    // not fixed yet
    $('.updateUserAllowance').on('click', function(){
        var allowance_id = $(this).data('id')
        var allowance_user = $(this).data('name')
        var allowance_aid = $(this).data('aid');
        var allowance_type = $(this).data('type');
        var allowance_date = $(this).data('date');
        var allowance_amount = $(this).data('amount');
        $('#allowanceId').val(allowance_id);
        $('#allowanceUser').val(allowance_user);
        $('#allowanceAid').val(allowance_aid);
        $('#allowanceType').val(allowance_type);
        $('#allowanceDate').val(allowance_date);
        $('#allowanceAmount').val(allowance_amount);
    });

    $('.deleteUserAllowance').on('click', function(){
        var allowance_id = $(this).data('id')
        console.log(allowance_id)
        $('#allowanceid').val(allowance_id);
    });

    $('#allowanceType').on('change',function(){
        var datebutton = document.getElementById("effectiveDate")
        if($(this).val() == 0){
            datebutton.classList.remove("d-none")
        } else{
            datebutton.classList.add("d-none")
        }
    })

    $('.updateUserAllowance').on('click', function(){
        var allowance_id = $(this).data('id')
        var allowance_user = $(this).data('name')
        var allowance_aid = $(this).data('aid');
        var allowance_type = $(this).data('type');
        var allowance_date = $(this).data('date');
        var allowance_amount = $(this).data('amount');
        $('#allowanceId').val(allowance_id);
        $('#allowanceUser').val(allowance_user);
        $('#allowanceAid').val(allowance_aid);
        $('#allowanceType').val(allowance_type);
        $('#allowanceDate').val(allowance_date);
        $('#allowanceAmount').val(allowance_amount);
    });

    $('.deleteBonus').on('click', function(){
        var bonus_id = $(this).data('id')
        console.log(bonus_id)
        $('#bonusid').val(bonus_id);
    });

    $('#deductionType').on('change',function(){
        var datebutton = document.getElementById("deductionEffectiveDate")
        if($(this).val() == 0){
            datebutton.classList.remove("d-none")
        } else{
            datebutton.classList.add("d-none")
        }
    })
    
});

