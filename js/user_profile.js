$(document).ready(function() {
    // Toggle the dropdown on button click
    $(".user-profile-btn").click(function() {
        $(".user-dropdown-content").toggle();
    });

    // Close the dropdown when clicking outside of it
    $(document).click(function(event) {
        if (!$(event.target).closest(".user-profile").length) {
            $(".user-dropdown-content").hide();
        }
    });
});