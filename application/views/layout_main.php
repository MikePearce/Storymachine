<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $title_for_layout; ?></title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>	
    <script type="text/javascript" src="/js/usm.js"></script>	
	<link rel="stylesheet" type="text/css" href="/css/usm.css" />
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body id="home">
    <div id="header">
        <div id="header_title" class="clearfix">
            <h1>User story machine</h1>
        </div>
        <div id="header_nav">
            <ul class="navigation">
                <li><a href=''>Mike Pearce</a> |</li>
                <li><a href=''>settings</a> |</li>
                <li><a href=''>logout</a></li>                                
            </ul>
        </div>
    </div>
    <div id="main_content">
        <div id="menu">
            <ul class="navigation">
                <li><a href='/backlogs'>backlogs</a> |</li>
                <li><a href='/themes'>themes</a> |</li>
                <li><a href='/help'>help</a></li>
            </ul>    
        </div>
        <div id="content">
            <?php echo $content_for_layout?>
        </div>
    </div>
</body>
</html>
