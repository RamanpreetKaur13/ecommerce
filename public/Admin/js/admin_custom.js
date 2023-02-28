$(document).ready(function(){
    //datatables
    $('#sections_table').DataTable();
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
                    $('#admin-'+admin_id).html('<i class="mdi mdi-toggle-switch-off text-danger"  status="Inactive" ></i>');
                } else if(resp['status'] == 1) {
                    $('#admin-'+admin_id).html('<i class="mdi mdi-toggle-switch text-success"  status="Active" ></i>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });

    //update section status
    $(document).on('click' , '.updateSectionStatus' , function(){
        var status = $(this).children("i").attr('status');
        var section_id = $(this).attr('section_id');
        // alert(section_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/admin/update-section-status',
            data:{status:status , section_id:section_id},
            success:function(resp){
                // alert(resp);
                if (resp['status'] == 0) {
                    $('#section-'+section_id).html('<i class="mdi mdi-toggle-switch-off text-danger"  status="Inactive" ></i>');
                } else if(resp['status'] == 1) {
                    $('#section-'+section_id).html('<i class="mdi mdi-toggle-switch text-success"  status="Active" ></i>');
                }
            },
            error:function(){
                alert("error");
            }
        });
    });

    //confirm delete simple jquery(section)
    // $('.ConfirmDelete').click(function(){
    //     var title = $(this).attr('title');
    //     //alert(title);
    //     if (confirm('Are You sure you want to delete this ' +title)) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // })

    $('.ConfirmDelete').click(function(){
        var module = $(this).attr('module');
        var module_id = $(this).attr('module_id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            timer: 3000
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success',
                3000
              )
              window.location="delete-"+module+"/"+module_id;
            }
          })
    })
});