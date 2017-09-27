<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SOAP</title>
    </head>
    <body>

    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <table class="table">
        <tr>
            <td >Cities</td>
        </tr>
<?php
    foreach($result as $key => $val)
    {
        foreach($val as $values)
        {
            foreach($values as $item)
            {
                ?>
                    <tr class="warning">
                        <td><?php echo $item; ?></td>
                    </tr>
<?php
            }
        }
    }
    ?>
    </table>
    <table class="table table-striped">
        <tr>
            <td>Names</td>
            <td>Flags</td>
        </tr>
    <?php

    echo "<br>";
    echo "<br>";
    foreach($resultCurlFootball as $key => $val)
    {
        ?>
        <tr>
                        <td class="danger"><?php echo $key; ?></td>
                        <td class="info"><?php echo $val; ?></td>
        </tr>
        <?php
    }

    ?>
    </table>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Enter date</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Push</button>
    </form>

    <?php
    echo "<br>";
    echo "<br>";
    ?>
    <table class="table">
        <tr>
            <td>Vname</td>
            <td>Vcurs</td>
            <td>Vcode</td>
            <td>VchCode</td>
        </tr>
        <?php
        if(isset($_POST["date"]))
        {


    foreach ($resBank as $val)
        {
        ?>
        <tr>
            <td><?php  echo $val->Vname; ?></td>
            <td><?php  echo $val->Vcurs; ?></td>
            <td><?php  echo $val->Vcode; ?></td>
            <td><?php  echo $val->VchCode; ?></td>
        </tr>
        <?php
    }
        }
    ?>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Enter date</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date" name="var">
        </div>
        <button type="submit" class="btn btn-primary">Push</button>
    </form>
    <?php
    ?>
        <table class="table">
            <tr>
                <td>Vname</td>
                <td>Vcurs</td>
                <td>Vcode</td>
                <td>VchCode</td>
            </tr>
            <?php
            if (isset($_POST["var"])) {
                foreach ($resCurlBank as $val) {
                    ?>
                    <tr>
                        <td><?php echo $val->Vname; ?></td>
                        <td><?php echo $val->Vcurs; ?></td>
                        <td><?php echo $val->Vcode; ?></td>
                        <td><?php echo $val->VchCode; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>