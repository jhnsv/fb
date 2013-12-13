<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title></title>
	<meta name="description" content=""/>
	<meta name="viewport" content="width=device-width"/>
</head>
<body>
<?php
$access_token = "YOUR_ACCES_TOKEN";
$content = file_get_contents('https://graph.facebook.com/galleriaduvan/posts?access_token='.$access_token);
$content = json_decode($content, true);

foreach ( $content['data'] as $fb ) : ?>
	<?php if ( $fb['message'] ) : ?>
		<div>
			<?php echo wpautop($fb['message']) ?>
			<?php $replace = array('_s.jpg', '_s.png') ?>
			<?php if ( $fb['picture'] ) : ?>
				<p><img src="<?php echo str_replace($replace, '_n.jpg', $fb['picture']) ?>" /></p>
			<?php endif ?>
			<time datetime="<?php echo $fb['updated_time'] ?>"><?php echo nicetime($fb['updated_time']) ?></time>
		</div>
	<?php endif ?>
<?php endforeach ?>
</body>
</html>
