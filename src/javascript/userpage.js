$(document).ready(function () {
    $(".account_setting").hide();

    var resume_file;

    // fetch json file right after html is ready
    function sendAjaxRequest(callback) {
        $.ajax({
            type: 'GET',
            url: "../src/php/userpage.php",
            dataType: 'json',
            success: function (data) {
                resume_file = data;
                callback(true);
            },
            error: function (error) {
                console.log('Error fetching JSON from the server:', error.statusText);
                callback(false);
            }
        });

        // prevent the default form submission
        return false;
    }

    sendAjaxRequest(function (success) {
        if (success) {
            // Successfully fetched data
            console.log(resume_file);
            
        } else {
            // Error fetching data
            alert("Error fetching data");
        }
    });

    
    function switch_main () {
        $(".Presenting").show(0);
        $(".NotPresenting").hide(0);
    };

    $("#account_setting").click(function () {
        $(".profile").removeClass("Presenting");
        $(".profile").addClass("NotPresenting");
        $(".account_setting").removeClass("NotPresenting");
        $(".account_setting").addClass("Presenting");
        switch_main();
    });

    $("#edit_profile_info").click(function () {
        window.location.href = './editprofileinfo.php';
    });

    $("#profile").click(function () {
        $(".Presenting").addClass("NotPresenting");
        $(".Presenting").removeClass("Presenting");
        $(".profile").removeClass("NotPresenting");
        $(".profile").addClass("Presenting");
        switch_main();
    });


    
});