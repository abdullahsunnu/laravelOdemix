setInterval(() => {
    if ($("#loading #loader-image").css("width") == "200px") {
        $("#loading #loader-image").css("width", "300px");
    } else {
        $("#loading #loader-image").css("width", "200px");
    }
}, 400);
$(function() {
    setTimeout(() => {
        $("#loading").hide('slow');
    }, 500);
});
