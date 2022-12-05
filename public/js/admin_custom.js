// const { extendWith } = require("lodash");

// $(document).ready(function(){

//     $('#current_password').keyup(function(){
// alert('hello');
// exit();
//         var current_password = $(this).val();
       
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             type:'post',
//             url:'/admin/current-admin-password',
//             data:{current_password:current_password},
//             success:function(resp){
//                if (resp == "true") {
//                 $("#check_current_password").html("<font color = 'green'>Password is correct</font>");
//                }
//                else
//                if (resp == "false") {
//                 $("#check_current_password").html("<font color = 'red'>Password is Incorrect !</font>");
//                }

//             },
//             error:function(){
//                 alert("error");
//             }

            

//         });
//     });
// });