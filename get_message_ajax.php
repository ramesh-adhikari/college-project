<?php
    // require_once("connect.php");
    $con = mysqli_connect("localhost","root","","college");

    if(isset($_GET['c_id'])){
        //get the conversation id and
        $conversation_id = base64_decode($_GET['c_id']);
        
        //fetch all the messages of $user_id(loggedin user) and $user_two from their conversation
        $q = mysqli_query($con, "SELECT * FROM `messages` WHERE conversation_id='$conversation_id'  && deleted='no'  ");
        //check their are any messages
        if(mysqli_num_rows($q) > 0){
            while ($m = mysqli_fetch_assoc($q)) {
                //format the message and display it to the user
                $user_form = $m['user_from'];
                $user_to = $m['user_to'];
                $message = $m['message'];

                //get name and image of $user_form from `user` table
                $user = mysqli_query($con, "SELECT profile_pic,first_name,last_name FROM `users` WHERE id='$user_form'");
                $user_fetch = mysqli_fetch_assoc($user);
                // $user_form_username = $user_fetch['username'];
                $fname= $user_fetch['first_name'];
                $lname= $user_fetch['last_name'];

                $img = $user_fetch['profile_pic'];

            if($img==""){
        $profile="img/default_pic.png";
    }
    else{
        $profile="userdata/profile_pics/".$img;
}


                //display the message

                echo " <div class='chat-message'>

                        <ul class='chat'>
                            <li class='left clearfix'>
                                <span class='chat-img pull-left'>
                                    <img src='$profile' alt='User Avatar'>
                                </span>
                                <div class='chat-body clearfix'>
                                    <div class='header'>
                                        <strong class='primary-font'>$fname  $lname</strong>
                                    </div>
                                    <p>
                                        {$message}
                                    </p>
                                </div>
                            </li>  </ul></div>"; 



                        }
        }else{
             echo "  <div class='chat-message'>No Messages</div>";
        }
            
    }

    // if($conversation_id){
    // }
// echo "<script>window.location='inbox.php';</script>";
?>



