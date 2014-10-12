<!-- Example Layout -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
    <title>Muffin PHP Micro Framework</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php foreach ($styles as $style):?>
    <link rel="stylesheet" href="<?= $style ?>">
	<?php endforeach ?>
</head>
<body>
<?= $view_content; ?>
</body>
</html>