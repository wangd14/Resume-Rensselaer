$(document).ready(function () {

   window.addEventListener("load", uponLoad);

   // focus 
   function uponLoad() {
       var first = document.getElementById("loginuserID");
       first.focus();
   }


   
   function sendAjaxRequest(formObj, action, head) {
      var action_type = "POST";  
      var url = "../src/php/login_signup.php";
      var redirectURL;
  
      // Append the 'action' parameter to the serialized form data
      var formData = $(formObj).serialize() + "&action=" + action;
      
      $.ajax({
         type: action_type,
         url: url,
         data: formData,
         dataType: 'json',
         success: function (response) {
            if (response.status == "success") {
               alert(response.message);

               // redirect user to another page after login / sign up success
               redirectURL = response.redirectURL;
               if (redirectURL) {
                  window.location.href = redirectURL;
               }

               return true;

            } else {
   
               alert(response.message);
            }
         },
         error: function (error) {
            console.error(error);
         }
      });
  
      // prevent the default form submission
      return false;
   }
        

   // validating functions that validate login and signup
   function validateLogin(formObj) {
      var finalAlert = "";
      var setFocus = 0;
  
      if (formObj.loginuserID.value == "" || formObj.loginuserID.value == "Username") {
          finalAlert += "-You must enter a username\n";

          if (setFocus == 0) {

              formObj.loginuserID.focus(); // Corrected property name
              setFocus = 1;
          }
      }
  
      if (formObj.loginPassWD.value == "" || formObj.loginPassWD.value == "Password") {
          finalAlert += "-You must enter a password\n";

          if (setFocus == 0) {

              formObj.loginPassWD.focus(); // Corrected property name
              setFocus = 1;
          }
      }
  

      if (finalAlert == "") {
         return true
      } else {
         alert(finalAlert);
      }
      // should never reach
      return false;
   }
      
   function validateSignup(formObj) {
      var finalAlert = "";
      var setFocus = 0;
  
      var username = formObj.signupUsername.value.trim();

      var password1 = formObj.signupPassWD1.value.trim();
      var password2 = formObj.signupPassWD2.value.trim();
        
      if (username == "" || username != formObj.signupUsername.value) {
          finalAlert += "-You must enter a valid username\n";
          if (setFocus == 0) {

              formObj.signupUsername.focus();
              setFocus = 1;
          }
      }
  

      if (password1 == "" || password1 == "Password" || password1 != formObj.signupPassWD1.value) {
          finalAlert += "-You must enter a valid password\n";
          if (setFocus == 0) {
              formObj.signupPassWD1.focus();

              setFocus = 1;
          }
      }
  

      if (password1 != password2 || password2 != formObj.signupPassWD2.value) {
          finalAlert += "-Passwords do not match\n";
          if (setFocus == 0) {
              formObj.signupPassWD2.focus();
              setFocus = 1;
          }
      }
  
      if (finalAlert == "") {

         return true
      } else {
         alert(finalAlert);
      }

      // should never be reach
      return false;
   }
     

   document.getElementById("loginForm").addEventListener("submit", function(event) {
      if (validateLogin(this)) {
         // good to go, no validation error
         var head;
         if (sendAjaxRequest(this, 'login') == true) {
            formObj.action = head;
            return true;
         }  
      } 

      event.preventDefault();


      return false;
   });
  
   document.getElementById("signupForm").addEventListener("submit", function(event) {

      if (validateSignup(this)) {
         var head;
         if (sendAjaxRequest(this, 'signup') == true) {
            return true;
         } 
      } 
      event.preventDefault();
      return false;
   });
  

   function showForm(showForm, hideForm) {
      // update showing form
      $(`#${hideForm}`).hide();
      $(`#${showForm}`).show();
    
      // Update the active tab
      $('.form-tabs button').removeClass('active').addClass('inactive');
      $(`.form-tabs .${showForm}`).removeClass('inactive').addClass('active');
   }
   
   // swap forms between login and sign up
   $('.form-tabs button').on('click', function () {
       if ($(this).hasClass('login')) {
           showForm("loginForm", "signupForm");
       } else if ($(this).hasClass('signup')) {
           showForm("signupForm", "loginForm");
       }
   });

   // event listenier to clear place holder when specific input are clicked
   $('#loginuserID, #loginPassWD, #signupuserID, #signupPassWD1, #signupPassWD2')
      .focus(function () {
         $(this).attr('placeholder', '');
      })
      .blur(function () {
         if (!$(this).val()) {
            $(this).attr('placeholder', $(this).data('placeholder'));
         }
      })
      .each(function () {
         $(this).data('placeholder', $(this).attr('placeholder'));
   });



});
