<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
<?php
include('../src/FontLib/Autoloader.php');
$font = \FontLib\Font::load('../fonts/AC Youth-Italic.otf');
$font->parse();  // for getFontWeight() to work this call must be done first!
// echo $font->getFontName() .'<br>';
// echo $font->getFontSubfamily() .'<br>';
// echo $font->getFontSubfamilyID() .'<br>';
// echo $font->getFontFullName() .'<br>';
// echo $font->getFontVersion() .'<br>';
// echo $font->getFontWeight() .'<br>';
// echo $font->getFontPostscriptName() .'<br>';

// echo '<pre>' . var_dump($font) . '</pre>';
?>
</body>
</html>


