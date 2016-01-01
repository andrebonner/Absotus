/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    $('#changepasswordform').submit(function (e) {

        var oldpassword = $('#oldpassword').val();
        var newpassword = $('#newpassword').val();
        var retypepassword = $('#retypepassword').val();
        if (newpassword.length < 6) {
            $('.newpass').removeClass('has-warning');
            $('.newpass').addClass('has-warning');
            toastr.warning("new password has to be 6 characters or more");
            e.preventDefault();
        } else if (newpassword != retypepassword) {
            $('.retypepass').removeClass('has-warning');
            $('.retypepass').addClass('has-warning');
            toastr.warning("new password must match retyped password");
            e.preventDefault();
        } else {
            var exp =new RegExp("/[^A-Za-z0-9]/");
            console.log(exp.test(newpassword));
            console.log(newpassword);
            if (!newpassword.match('/[^A-Za-z0-9]/')) {
                toastr.warning("Password must contain letters and numbers");
                e.preventDefault();
            } else {
                toastr.options.positionClass = "toast-top-full-width";
                toastr.success("Changing password");
            }
        }
    });
});