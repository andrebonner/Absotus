/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $(document).mousemove(function (e) {
        TweenLite.to($('body'),
                .5,
                {css:
                            {
                                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px"
                            }
                });
    });
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
            toastr.options.positionClass = "toast-top-full-width";
            toastr.success("Changing password");
        }
    });
});