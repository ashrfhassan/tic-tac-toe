<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Post Json</title>
    <link rel="stylesheet" href="./public/fontawesome-free-5.2.0-web/css/all.css">
    <link rel="stylesheet" href="./public/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/app.css">
</head>

<body>
<div id="startSection" class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label>X Player</label>
                <input id="p1-name" type="text" class="form-control" placeholder="enter your name..." value="Player1">
            </div>
            <div class="col-sm-6 form-group">
                <label>O Player</label>
                <input id="p2-name" type="text" class="form-control" placeholder="enter your name..." value="Player2">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="#" class="btn btn-success">Start Match</a>
            </div>
        </div>
    </div>
</div>
<div id="gameSection" class="d-none">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2><i id="player-name-turn">Player1 </i> Turn (<i id="player-symbol-turn" class="alert-danger">X</i>)</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <table id="game-table" class="table table-bordered">
            <tbody>
            <tr>
                <td id="s1" data-snumber="s1"></td>
                <td id="s2" data-snumber="s2"></td>
                <td id="s3" data-snumber="s3"></td>
            </tr>
            <tr>
                <td id="s4" data-snumber="s4"></td>
                <td id="s5" data-snumber="s5"></td>
                <td id="s6" data-snumber="s6"></td>
            </tr>
            <tr>
                <td id="s7" data-snumber="s7"></td>
                <td id="s8" data-snumber="s8"></td>
                <td id="s9" data-snumber="s9"></td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
<div id="winnerSection" class="d-none">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2>winner is <i id="winner-name">No one</i></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="#" class="btn btn-warning">Again</a>
        </div>
    </div>
</div>
<script src="./public/jquery/jquery.min.js"></script>
<script src="./public/popper/umd/popper.min.js"></script>
<script src="./public/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script>
    <?php include_once './config.php';?>
    var apiUrl = '<?php echo API_URL?>';
</script>
<script src="./public/app.js"></script>
</body>

</html>