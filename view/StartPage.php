<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </head>
<body>
<?php
            foreach($_SESSION['ComentDb'] as $product) { ?>
                <div class="container mt-3">
                    <div class="media border p-3">
                        <div class="media-body">
                            <h5><?php echo $product['login']; ?>
                               <small><i>Posted on <?php echo $product['data_time']?>;</i></small>
                               <button class= "answerButton" data-id="<?php echo $product['id']?>" >Ответить</button>
                            </h5>
                            <p><?php echo $product['coment'];?></p>
                        </div>
                    </div>
                </div>
<?php }

             if(isset($_SESSION["UserID"])){ ?>
                <title>Welcome</title>
                <div class="container">
                    <div class="form-group">
                        <form action="AddNewComent" method="post">
                            <label for="coment">Comment:</label>
                            <textarea name="coment" class="form-control" rows="5" id="comment"></textarea><br>
                            <button class="btn btn-primary " type="sumit">Send coment</button><br>
                            <input type="hidden" name="comentid" id="comentid" value="0">
                        <form/>
                    </div>
                </div>
<?php        }

