jQuery(document).ready(function ($) {


    
    if(document.getElementById("run-facebook-live-video-script") !== null) {
    

    
        
        

          // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {

      $('#facebookCommentLoginButton').css('display','inline-block'); 

    } else {

              $('#facebookCommentLoginButton').css('display','inline-block'); 

    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : applicationId,
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
        
          $('#facebookCommentLoginButton').hide(); 
    
    });
  }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


    

    (function getComments() {    
        
    if(document.getElementById("facebook-live-comments") !== null) {    

    var data = {
        'action': 'wp_facebook_live_video_get_comments',
    };
    // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        
        
        
    jQuery.post(ajax_object.ajax_url, data, function (response) {

        $( ".facebook-live-comments li" ).remove();
        
        
    
        $(response).appendTo(".facebook-live-comments ul");
        
        $(".timeago").timeago();
        
        setTimeout(getComments, 10000);
        
    }); //end post response

    } //end if comments required
    })(); //end function

        

  $('#facebook_live_video_comment_submit').click(function (event) {
        event.preventDefault();      
      
      
      var userComment = $('#facebook_live_video_comment').val();
            
      var videoIdComment = $('#facebook_live_video_comment_submit').attr('data'); 
      
      

      
if (userComment.length < 1){
    
$('#facebook_live_video_comment').effect("shake", { times:3 }, 300);
    
} else {     
      
      
FB.api(
  '/'+videoIdComment+'/comments',
  'POST',
  {"message":userComment},
  function(response) {
      // Insert your code here
      
      console.log(response);
      
      if(response.hasOwnProperty("id")) {
      $('#facebook_live_video_comment').val('');
      $('#commentSuccessMessage').show().delay(2000).fadeOut();    
         
          
      } else {
      $('#commentFailureMessage').show().delay(2000).fadeOut(); 
      }
      
  }
);
      
}
    
      
 
        
  }); //end if comment button is clicked 
        
        
   
         


        
         
        


    } //end if Facebook script is necessary


}); //end documentreadyfunction