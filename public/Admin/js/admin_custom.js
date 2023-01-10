$(document).ready(function(){

    $('#current_password').keyup(function(){

        var current_password = $(this).val();
       
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/current-admin-password',
            data:{current_password:current_password},
            success:function(resp){
               if (resp == "true") {
                $("#check_current_password").html("<font color = 'green'>Password is correct</font>");
               }
               else
               if (resp == "false") {
                $("#check_current_password").html("<font color = 'red'>Password is Incorrect !</font>");
               }

            },
            error:function(){
                alert("error");
            }
        });
    });

    //update admin status
    $(document).on('click' , '.updateAdminStatus' , function(){
        var status = $(this).children("i").attr('status');
        var admin_id = $(this).attr('admin_id');
        // alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/admin/update-admin-status',
            data:{status:status , admin_id:admin_id},
            success:function(resp){
                // alert(resp);
                if (resp['status'] == 0) {
                    $('#admin-'+admin_id).html('<i class="mdi mdi-toggle-switch-off"  status="Inactive" ></i>');
                } else if(resp['status'] == 0) {
                    $('#admin-'+admin_id).html('<i class="mdi mdi-toggle-switch-off"  status="Inactive" ></i>');
                }

            },
            error:function(){
                alert("error");
            }
        });
    });
});