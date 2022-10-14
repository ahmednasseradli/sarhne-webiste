// Sending Messages Request
var userID      = document.getElementById("userID");
var msgInfo     = document.getElementById("msg-info");
var message     = document.getElementById("message");
var submitBtn   = document.getElementById("send-button");

if (submitBtn !== null) {
    submitBtn.onclick = function (e) {

        e.preventDefault();
        // Server response

        var myrequest   = new XMLHttpRequest();
        myrequest.open("GET", "./serverResponses/sendMsg.php?user=" + userID.value + "&msg=" + message.value);
        myrequest.onreadystatechange = function () {

            if(myrequest.readyState == 4 && myrequest.status == 200) {

                msgInfo.style.display = "block";
                msgInfo.innerHTML = myrequest.responseText;
                message.value = "";
            }

        };

        myrequest.send();

    };
}

// Updating Profile settings Request 
var submit_profile  = document.getElementById("submit-profile");
if (submit_profile !== null) {

    submit_profile.onclick = function(e) {
        
        e.preventDefault();
            
        var user_name       = document.getElementById("name").value;
        var user_email      = document.getElementById("email").value;
        var user_gender     = document.getElementById("gender").value;
        var user_about      = document.getElementById("about").value;
        // var update_msg      = document.getElementById("update-msg");
        var pRequest        = new XMLHttpRequest();
        pRequest.open("GET", "./serverResponses/updateProfile.php?name=" + user_name + "&email=" + user_email + "&gender=" + user_gender + "&about=" + user_about);
        pRequest.onreadystatechange = function () {

            if (pRequest.readyState == 4 && pRequest.status == 200) {

                if (pRequest.responseText == "done") {
                    
                    $("#submit-profile").tooltip({title: "تم تحديث البيانات يرجى اعادة تحميل الصفحة😀", delay: {"show": 500 ,"hide": 1000 }}); 
                    $("#submit-profile").tooltip("show"); // Showing link tooltip 
                    // setTimeout(location.reload(), 2555000);
                } else {

                    alert(pRequest.responseText);
                }
                
            }
        }
        pRequest.send();    
    }

}


// Updating Password settings Request 
var submit_pass  = document.getElementById("submit-pass");
if (submit_pass !== null) {

    submit_pass.onclick = function(e) {
        
        e.preventDefault();
            
        var new_pass        = document.getElementById("new-pass").value;
        var re_pass         = document.getElementById("re-pass").value;
        var pass_errors     = document.getElementById("password-errors");
        var pass_Request    = new XMLHttpRequest();
        pass_Request.open("GET", "./serverResponses/updatePass.php?new-pass=" + new_pass + "&re-pass=" + re_pass);
        pass_Request.onreadystatechange = function () {

            if (pass_Request.readyState == 4 && pass_Request.status == 200) {

                if (pass_Request.responseText == "done") {
                    
                    // alert("تم تحديث كلمة المرور سيتم اعادة تحميل الصفحة بعد الضغط على موافق");
                    // location.reload();
                    $("#submit-pass").tooltip({title: "تم تحديث كلمة المرور يرجى اعادة تحميل الصفحة😀", delay: {"show": 500 ,"hide": 1000 }}); 
                    $("#submit-pass").tooltip("show"); // Showing link tooltip 
                    // setTimeout(location.reload(), 2000);
                } else {

                    pass_errors.style.display = "block";
                    pass_errors.innerHTML = pass_Request.responseText;
                }
            }
        }
        // pass_Request.setRequestHeader("Content-type", "application/x-www-fprm-urlencoded");
        pass_Request.send();    
    }

}



// Updating User Social Links Request 
var submit_links  = document.getElementById("submit-links");
if (submit_links !== null) {

    submit_links.onclick = function(e) {
        
        e.preventDefault();
            
        var facebook        = document.getElementById("facebook").value;
        var instagram       = document.getElementById("instagram").value;
        var twitter         = document.getElementById("twitter").value;
        var snapchat        = document.getElementById("snapchat").value;
        var youtube         = document.getElementById("youtube").value;
        var whatsapp        = document.getElementById("whatsapp").value;
        var tiktok          = document.getElementById("tiktok").value;
        var gmail           = document.getElementById("gmail").value;
        var social_errors    = document.getElementById("social-errors");
        var query           = "facebook=" + facebook + "&instagram=" + instagram + "&twitter=" + twitter + "&snapchat=" + snapchat +"&youtube=" + youtube + "&whatsapp=" + whatsapp + "&tiktok=" + tiktok + "&gmail=" + gmail;
        var links_Request    = new XMLHttpRequest();
        links_Request.open("GET", "./serverResponses/updateSocialLinks.php?" + query);
        links_Request.onreadystatechange = function () {

            if (links_Request.readyState == 4 && links_Request.status == 200) {

                if (links_Request.responseText == "done") {
                    
                    $("#submit-links").tooltip({title: "تم تحديث البيانات يرجى اعادة تحميل الصفحة😀", delay: {"show": 500 ,"hide": 1000 }}); 
                    $("#submit-links").tooltip("show"); // Showing link tooltip
                } else {
                    social_errors.style.display = "block";
                    social_errors.innerHTML = links_Request.responseText;
                }
            }
        }
        links_Request.send();    
    }

}



$(".msg-action").click(function () {

    var msg_id              = this.parentNode.previousSibling.previousSibling.previousSibling.value;
    var user_id             = this.parentNode.previousSibling.previousSibling.value
    var msg_container       = this.parentNode.parentNode.parentNode.parentElement.parentNode.classList[2];
    var action_type         = this.classList[1];
    var query               = "type=" + action_type + "&uID=" + user_id + "&msgID=" + msg_id;
    var controlMsg_Request    = new XMLHttpRequest();
    controlMsg_Request.open("GET", "./serverResponses/messageControl.php?" + query);
    controlMsg_Request.onreadystatechange = function () {

        if (controlMsg_Request.readyState == 4 && controlMsg_Request.status == 200) {

            if (controlMsg_Request.responseText == "public") {
                
                alert("الرسالة أصبحت عامة الأن");
                location.reload();
            }

            if (controlMsg_Request.responseText == "private") {
                
                alert("الرسالة أصبحت خاصة الأن");
                location.reload();
            }
            if (controlMsg_Request.responseText == "deleted") {
                
                $("." + msg_container).hide(700);

            }
        }
    }
    controlMsg_Request.send();
});