<?php

require_once 'api/src/conn.php';
require_once 'api/src/Book.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book Store API</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Theme -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

    <!-- Custom styles -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-3">
            <h1>Book Store API</h1>
        </div>
        <div class="col-xs-12 col-md-2">
            <h1 class="text-right"><a href="" class="btn btn-primary addBtn" data-toggle="modal" data-target="#addModal">Add Book</a></h1>
        </div>
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="alert alert-dismissible hidden" role="alert" id="message-box">
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-md-offset-3 main-content">
        </div>
    </div>
</div>

<!-- Add / Edit Book Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Book</h4>
            </div>
            <div class="modal-body">
                <form id="add-book" name="add-book">
                    <div class="form-group">
                        <label for="add-title">Title</label>
                        <input type="text" class="form-control" placeholder="Title of the book" id="add-title" name="add-title">
                    </div>
                    <div class="form-group">
                        <label for="add-author">Author</label>
                        <input type="text" class="form-control" placeholder="Author of the book" id="add-author" name="add-author">
                    </div>
                    <div class="form-group">
                        <label for="add-isbn">ISBN</label>
                        <input type="text" class="form-control" placeholder="ISBN number" id="add-isbn" name="add-isbn">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="add-description" id="add-description" cols="30" rows="3" placeholder="Description of the book"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" form="add-book" class="btn btn-primary">Add Book</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Book Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Book</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Custom js -->
<script src="js/custom.js"></script>
</body>
</html>