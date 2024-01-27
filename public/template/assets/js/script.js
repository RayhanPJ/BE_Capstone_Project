 $(document).ready(function () {
     function togglePasswordVisibility(passwordId, iconId) {
         var passwordInput = $("#" + passwordId);
         var icon = $("." + iconId + " i");

         // Toggle password visibility
         passwordInput.attr("type", passwordInput.attr("type") === "password" ? "text" : "password");
         icon.toggleClass("ti-eye ti-eye-off");
     }

     $("#toggleCurrentPassword").click(function () {
         togglePasswordVisibility("current_password", "input-group-text3");
     });

     $("#togglePassword").click(function () {
         togglePasswordVisibility("password", "input-group-text");
     });

     $("#toggleNewPassword").click(function () {
         togglePasswordVisibility("password_confirmation", "input-group-text2");
     });
 });
