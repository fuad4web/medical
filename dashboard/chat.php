<?php 
    include_once('../core/init.php');
    
    if($getFromU->loggedIn() !== true) {
        header('Location: '.BASE_URL.'dashboard/login');
    }

    $user_id = $_SESSION['id'];
    $user = $getFromU->userData($user_id);

    $padi_id = $_GET['user_id'];
    $padi = $getFromU->myPadi($padi_id);
    // $messages = $getFromU->selectMessagesSession($user_id, $padi_id);

    $letsee = $getFromU->koyemi();

    // exit(var_dump(compact('user_id', 'padi_id')));

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Real Time Chat App</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="hhtps://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/css/all.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->

</head>

<body>
    <div class="wrapper">
        
        <section class="chat-area">
        <input type="hidden" value="<?=$user->id?>" id="fromuser">
        <input type="hidden" value="<?=$padi_id?>" id="touser">
            <header>
                <img src="profileImage/<?=$padi->profile_pic?>" alt="">
                <div class="details">
                    <span><?php 
                        if(isset($padi_id)) {
                            echo $padi->firstname;
                        }
                        // else {
                        //     echo '<script>window.location.href = "/medical/dashboard/dashboard.php";</script>';
                        // }
                    ?></span>
                    <p>Active now</p>
                    
                </div>
            </header>
            <div class="chat-box">

                
                 
            </div>

                    
                <input type="text" id="message" class="form-control" placeholder="Type a message here...">
                <button id="send" class="btn btn-primary">Send</button>
            
        </section>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#send').on('click', function() {
                $.ajax({
                    url:"insertmessage.php",
                    method: "POST",
                    data:{
                        fromuser: $("#fromuser").val(),
                        touser: $("#touser").val(),
                        message: $("#message").val()
                    },
                    success:function(data) {
                        if(data)
                        $("#message").val("");
                        else alert('Unable to send message');

                        fetchChats();
                    },
                    error: function(jqXHR, status, message){
                        console.error(message);
                    }
                });
            });


            const fetchChats = () => {
                var padi_id = "<?=$padi_id?>";
                $.ajax({
                    url: './fetchChats.php',
                    data: {padi_id: padi_id},
                    method: 'post',
                    success:function(data){
                        console.log(data);
                        $('.chat-box').html(data);
                    },
                    error:function(jqXHR, status, message){
                        console.error(message);
                    }
                })
            };

            fetchChats();

            setInterval(() => {
                fetchChats();
            }, 1000);

        });
    </script>
</body>
</html>
