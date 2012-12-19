<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error <?php echo $code; ?> - Fonto Framework</title>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Font -->
    <link href='http://fonts.googleapis.com/css?family=Mate+SC' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body {
            background: #0f0f0f;
        }
        h1, h2 {
            font-family: 'Mate SC', serif;
            color: #e3e3e3;
        }
        p {
            color: #f2f2f2;
        }
        a {
            color: #3e64e8;
            text-decoration: none;
        }
        a:hover {
            color: #800000;
        }
        .fontoContainer {
            margin: 0 auto;
            width: 960px;
        }
        .highlight {
            color: #db6b19;
        }
    </style>
</head>
<body>
<div class="fontoContainer">
    <header>
        <h1><span class="highlight">404</span>: <?php echo $e; ?></h1>
    </header>
    <section>
        <h2>Sorry, but it seems to me like you have gone wrong. </h2>
        <a href="<?php echo $baseUrl; ?>">Go back</a>
    </section>
</div>
</body>
</html>