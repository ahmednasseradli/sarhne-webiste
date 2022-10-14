
    // Making navbar background color visible by adding class name .bk-transparent
    window.onscroll = function () {
        var navbar = document.querySelector(".home > .navbar");

        if (navbar !== null ) {
            if (window.scrollY > 300) {

                navbar.classList.remove("bk-transparent");
                console.log("Class removed");
            }if (window.scrollY < 300 ) {
                navbar.classList.add("bk-transparent");
                console.log("Class added");
            }
        }
     }

    // Function to Copy URL to clipboard
    function copyToClipboard() {
        
        copyText = document.getElementById("link"); /* Get the text field */
              
        navigator.clipboard.writeText(copyText.textContent);    /* Copy the text inside the text field */
        
        $("#link").tooltip({title: "copied 😀", delay: {"show": 500 ,"hide": 500 }}); 
        $("#link").tooltip("show"); // Showing link tooltip 

    };

    // Controlling Settings Different Blocks [active control button]
    $(".controls > div").click(function () {

        $(this).siblings().removeClass("active");

        $(this).addClass("active");

        $($(this).data("show")).siblings().hide();

        $($(this).data("show")).show();
    });

    $(".nav-link").click(function () {

        $(this).siblings().removeClass("active");

        $(this).addClass("active");
    });

    // Disabling and Enabling Submit Picture Uploading
    // Depending on input:file value if empty set disabled else set enabled 
    var x = document.getElementById("user-image");
    var u_image = document.getElementById("submit-image");
    if (x !== null) {

        x.onchange = function (e) {
        
            if (x.value !== "") {
                u_image.removeAttribute("disabled");
            } else {
                u_image.setAttribute("disabled", "disabled");
            }
        }
    
        u_image.onclick = function (e) {
    
            if (x.value == "") {
                e.preventDefault();
            }
            
        }
    }


    // Live Preview of entered username in sign up page
    $("#username").keyup(function () {

        $("#username-preview > span").html($(this).val());
    });


    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
         return new bootstrap.Tooltip(tooltipTriggerEl)
        })
