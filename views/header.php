<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->

        <script type="text/javascript" >
        function preventBack(){window.history.forward();}
            setTimeout("preventBack()", 0);
            window.onunload=function(){null};
        </script>
        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- Bootstrap -->
	    <link href="./css/bootstrap.min.css" rel="stylesheet">
	    <!-- jQuery -->
	    <script src="./js/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="./js/bootstrap.min.js"></script>

	    <link href="./css/styles.css" rel="stylesheet">

        <?php if (isset($title)): ?>
            <title>The General Elections : <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>The General Elections</title>
        <?php endif ?>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/server/public"><img id="bphc_logo" alt="BITS Pilani, Hyderabad Campus" src="./img/bphc_logo.png"/></a>
                <a href="/server/public"><img id="ec_logo" alt="The Election Commission" src="./img/ec_logo.png"/></a>
            <div id="middle">
