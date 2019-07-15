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
            foreach($comentData as $value) {?>

<?php         if($value['coment_id'] == 0 ){?>

                <div class="container mt-3">
                    <div class="media border p-3">
                        <div class="media-body">
                            <h5><?php echo $value['login']; ?>
                                <small><i>Posted on <?php echo $value['data_time']?>;</i></small>
                                <button type="button" class="btn btn-primary btn-sm answerButton" data-id="<?php echo $value['id']?>">reply</button>
                            </h5>
                            <p><?php echo $value['coment'];?></p>
       <?php } ?>

<?php                       foreach ($comentData as $valueTwo) {

                                if ($value['id'] == $valueTwo['coment_id']) { ?>
                                    <div class="container mt-3">
                                        <div class="media border p-3">
                                            <div class="media-body">
                                                <h5><?php echo $valueTwo['login']; ?>
                                                    <small><i>Posted on <?php echo $valueTwo['data_time']?>;</i></small>
                                                </h5>
                                                <p><?php echo $valueTwo['coment'];?></p>
                                            </div>
                                        </div>
                                    </div>
        <?php
                                }
                            }
        ?>
                        </div>
                    </div>
                </div>

</body>
        <?php } ?>
        <?php $pageUp = $_GET['page'] + 1; $pageDown = $_GET['page'] - 1 ?>
<ul class="pagination">

    <li class="page-item"><a class="page-link" href="?page=<?php echo $pageDown ;?>"><-</a></li>
  <li class="page-item active"><a class="page-link" href="?page=1"><?php echo $_GET['page']?></a></li>
  <li class="page-item"><a class="page-link" href="?page=<?php echo $pageUp ;?>">-></a></li>
</ul>

           <?php  if(isset($_SESSION["UserID"])){ ?>
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




