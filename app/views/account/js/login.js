/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    
    $('#loginform').submit(function (e) {

        var email = $('#email').val();
        var password = $('#password').val();

        if (email.length < 6 || password.length < 6) {
            toastr.warning("email and password must be 6 characters or more");
            e.preventDefault();
        } else {
            toastr.options.positionClass = "toast-top-full-width";
            toastr.success("Logging in");
        }
    });
});