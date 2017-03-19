$(document).ready(function(){
	/*post message via ajax*/
	$("#reply").on("click", function(){
		var message = $.trim($("#message").val()),
			conversation_id = $.trim($("#conversation_id").val()),
			user_form = $.trim($("#user_form").val()),
			user_to = $.trim($("#user_to").val()),
			error = $("#error");

		if((message != "") && (conversation_id != "") && (user_form != "") && (user_to != "")){
			error.text("Sending...");
			$.post("post_message_ajax.php",{message:message,conversation_id:conversation_id,user_form:user_form,user_to:user_to}, function(data){
				error.text(data);
				//clear the message box
				$("#message").val("");
			});
		}
	});


	//get message
	c_id = $("#conversation_id").val();
	//get new message every 1 second
	setInterval(function(){
		$(".display-message").load("get_message_ajax.php?c_id="+c_id);
	}, 10);

  // $("body, .sajan1").animate({ scrollTop: $(document).height()+1800 }, 1000);
	

	// $(".sajan1").scrollTop($(".sajan1")[-10].scrollHeight).animate({ scrollTop: $(document).height() }, 1000);
});



// $(window).load(function() {
//   $("html, .display-message").animate({ scrollTop: $(document).height() }, 1000);
// });


          // window.scrollTo(0,document.body.scrollHeight);

  


