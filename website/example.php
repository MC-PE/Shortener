<html>
<head>
<title>Redirection to €url</title>
<link rel="icon" src="http://boxofdevs.ml/favicon.ico" />
<?php
if(isset($_GET['clicks'])) {
    echo '<link rel="stylesheet" href="/css/skel.css" />
<link rel="stylesheet" href="/css/style.css" />
<link rel="stylesheet" href="/css/style-xlarge.css" />
<script src="/js/jquery.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/skel-layers.min.js"></script>
<script src="/js/init.js"></script>
</head>
<body>
<section id="one" class="wrapper style1">
<p>Downloads : '.file_get_contents("clicks").'</p>
</section>
</body>';
} else {
$c = file_get_contents("clicks");
$c = $c + 1;
file_put_contents("clicks", $c);
echo '</head>
<body>
<script>
location.replace("€url");
</script>
</body>';
}
?>