jQuery(document).ready(function($) {
    

    
//live videos hide functionality    
 var liveHideVideos = $('#facebook_live_video_live_video_hide').val();
    
if (liveHideVideos != null) {
 var livehideVideosArray = liveHideVideos.split(',');   
}

 $( ".liveVideoCheckboxes" ).each(function() {
     

  if($.inArray($(this).attr('id'),livehideVideosArray) != -1) {
    $(this).prop('checked', true);   
  }   
     

     
  $(this).change(function(){
     
      if($(this).is(":checked")){
        
          livehideVideosArray.push($(this).attr('id'));
          
          $('#facebook_live_video_live_video_hide').val(livehideVideosArray.join());
          
      } else {
          
          
         livehideVideosArray.splice( $.inArray($(this).attr('id'), livehideVideosArray), 1 ); 
      $('#facebook_live_video_live_video_hide').val(livehideVideosArray.join());    
      }
      
      
  });
     
      
});   
        
    
    
//past videos hide functionality    
 var pastHideVideos = $('#facebook_live_video_past_video_hide').val();
    
if (pastHideVideos != null) {
 var pasthideVideosArray = pastHideVideos.split(',');     
}    
    
 
    

 $( ".pastVideoCheckboxes" ).each(function() {
     

  if($.inArray($(this).attr('id'),pasthideVideosArray) != -1) {
    $(this).prop('checked', true);   
  }   
     

     
  $(this).change(function(){
     
      if($(this).is(":checked")){
        
          pasthideVideosArray.push($(this).attr('id'));
          
          $('#facebook_live_video_past_video_hide').val(pasthideVideosArray.join());
          
      } else {
          
          
         pasthideVideosArray.splice( $.inArray($(this).attr('id'), pasthideVideosArray), 1 ); 
      $('#facebook_live_video_past_video_hide').val(pasthideVideosArray.join());    
      }
      
      
  });
     
      
});   
    
    
    


    
    
    
    
    
    
    
    //hides facebook page options when user option is selected
    if ($('#facebook_live_video_profile_type').val() == "User") {
        $(".facebook-page-option").hide();
    } else {
        $(".facebook-page-option").show();
    }
    
    
    
    
$('#facebook_live_video_profile_type').on('change', function() {

if ($('#facebook_live_video_profile_type').val() == "User") {
        $(".facebook-page-option").hide();
    } else {
        $(".facebook-page-option").show();
    }

});
    
    
    
      //hides comment option when comment option is disabled
    if ($('#facebook_live_video_show_comments').val() == "No") {
        $(".facebook-comment-option").hide();
    } else {
        $(".facebook-comment-option").show();
    }
    
    
    
    
$('#facebook_live_video_show_comments').on('change', function() {

if ($('#facebook_live_video_show_comments').val() == "No") {
        $(".facebook-comment-option").hide();
    } else {
        $(".facebook-comment-option").show();
    }

});
    
    
    
    
    
    
    
  
    
    if( $('#facebook_live_video_access_token').val().length < 1) {
    
    
    
    
  
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
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
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

  
var myAppId = $('#facebook_live_video_app_id').val();
    
    
  window.fbAsyncInit = function() {
  FB.init({
    appId      : myAppId,
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
        
        
  
        
        
        
// now that we have the short facebook access token we need to request a longer one        
        
var clientId = $('#facebook_live_video_app_id').val();
var clientSecret = $('#facebook_live_video_app_secret').val();  
var fbExchangeToken = FB.getAuthResponse()['accessToken'];             

jQuery.ajax({
    url: "https://graph.facebook.com//oauth/access_token",
    type: "GET",
    data: {
        "grant_type": "fb_exchange_token",
        "client_id": clientId,
        "client_secret": clientSecret,
        "fb_exchange_token": fbExchangeToken,
    },
})
.done(function(data, textStatus, jqXHR) {
    console.log("HTTP Request Succeeded: " + jqXHR.status);


    
var longAccessToken = data;
var longAccessTokenTrimmed = longAccessToken.replace("access_token=", "");  
//var findLongAccessTokenTrimmed = longAccessTokenTrimmed.indexOf("&expires");  
//var theLongAccessToken = longAccessTokenTrimmed.substring(0,findLongAccessTokenTrimmed);

    
  
  

if(longAccessTokenTrimmed.indexOf("&expires") !== -1) {
    
var findLongAccessTokenTrimmed = longAccessTokenTrimmed.indexOf("&expires");  
var theLongAccessToken = longAccessTokenTrimmed.substring(0,findLongAccessTokenTrimmed);   
    
} else {
var theLongAccessToken = longAccessTokenTrimmed;    
}    
    
    
    
    
    
    
    
        //now implant the long access token into the settings field

 $('#facebook_live_video_access_token').val(theLongAccessToken);        

    

    
    
    
    
    
    
})
.fail(function(jqXHR, textStatus, errorThrown) {
    console.log("HTTP Request Failed");
})
.always(function() {
    /* ... */
});     
        
        
        
        

        
  //implant the user id into the settings field as well      
 $('#facebook_live_video_user_id').val(FB.getAuthResponse()['userID']);
        

        //put a save settings notice to prompt the user
$('<div class="notice notice-info is-dismissible gotowebinar_mailchimp_api"><p>Please press Save All Settings.</p></div>').insertBefore('.button-primary');        
        
        
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
      
      
      
      
      
          FB.api('/me/accounts', function(response) {
    console.log(JSON.stringify(response));
});

      
  } //end test api function

    } //end if condition 
    
    
    
    
    
    

//now i need to get the long access token for the page    
$('.extended-access-token').click(function (event) {
        event.preventDefault();
    
    
var clientIdPage = $('#facebook_live_video_app_id').val();
var clientSecretPage = $('#facebook_live_video_app_secret').val();  
var fbExchangeTokenPage = $('#facebook_live_video_page_selection').find(':selected').attr('data');             

 
    
jQuery.ajax({
    url: "https://graph.facebook.com//oauth/access_token",
    type: "GET",
    data: {
        "grant_type": "fb_exchange_token",
        "client_id": clientIdPage,
        "client_secret": clientSecretPage,
        "fb_exchange_token": fbExchangeTokenPage,
    },
})
.done(function(data, textStatus, jqXHR) {
    console.log("HTTP Request Succeeded: " + jqXHR.status);


var longAccessTokenPage = data;
    
var longAccessTokenTrimmedPage = longAccessTokenPage.replace("access_token=", "");
  



if(longAccessTokenTrimmedPage.indexOf("&expires") !== -1) {
    
var findLongAccessTokenTrimmedPage = longAccessTokenTrimmedPage.indexOf("&expires");  
var theLongAccessTokenPage = longAccessTokenTrimmedPage.substring(0,findLongAccessTokenTrimmedPage);   
    
} else {
  var theLongAccessTokenPage = longAccessTokenTrimmedPage;  
}    
    
    

        
    
$('#facebook_live_video_extended_access_token').val(theLongAccessTokenPage);
        
        
$('<div class="notice notice-info is-dismissible gotowebinar_mailchimp_api"><p>Please press Save All Settings.</p></div>').insertBefore('.button-primary');   
    
    
    
    
    
    
})
.fail(function(jqXHR, textStatus, errorThrown) {
    console.log("HTTP Request Failed");
})
.always(function() {
    /* ... */
});



    });
    
    

    
    
    
});