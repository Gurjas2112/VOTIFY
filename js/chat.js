$(document).ready(function() {
    var chatboxOpen = false;

    // Function to open the chat_box
    function openChat_box() {
        $("#chat_box").addClass("active");
        chatboxOpen = true;
    }

    // Function to close the chat_box
    function closeChat_box() {
        $("#chat_box").removeClass("active");
        chatboxOpen = false;
    }

    // Toggle chat_box when chatbot button is clicked
    $("#chatbot-toggler").click(function() {
        if (chatboxOpen) {
            closeChat_box();
        } else {
            openChat_box();
        }
    });

    // When the Send button is clicked
    $(".chat_box-input button").click(function() {
        var message = $(".chat_box-input textarea").val();
        if (message != "") {
            $(".chat_box-content").append("<div class='chat_box-message-row'><div class='chat_box-message chat_box-message-user'>" + message + "</div></div>");

            // Send the message to the PHP server with Ajax
            $.ajax({
                type: "POST",
                url: "process_message.php",
                data: "message=" + message,
                success: function(result) {
                    $(".chat_box-content").append("<div class='chat_box-message-row'><div class='chat_box-message chat_box-message-bot'>" + result + "</div></div>");
                    $(".chat_box-input textarea").val("");
                }
            });
        }
    });
    });