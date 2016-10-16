<?php
function make_seed()
{
	  list($usec, $sec) = explode(' ', microtime());
	    return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());
define("WIDTH", 200);
define("HEIGHT", 200);
$img = imagecreatetruecolor(WIDTH, HEIGHT);
imagealphablending($img, false);
$transparency = imagecolorallocatealpha($img, 0, 0, 0, 127);
imagefill($img, 0, 0, $transparency);
imagesavealpha($img, true);
for ($y = 0; $y < HEIGHT; ++$y)
{
	$r = rand(0, WIDTH / 2);
	for ($x = $r; $x < WIDTH - $r; ++$x)
	{
		$c = imagecolorallocate($img, rand(0, 1) * 255, rand(0, 1) * 255, rand(0, 1) * 255);
		imagesetpixel($img, $x, $y, $c);
	}
}
for ($i = 0; $i < WIDTH; $i++)
{
	$r = rand(0, HEIGHT / 2);
	for ($y = 0; $y < $r; ++$y)
	{
		imagesetpixel($img, $i, $y, $transparency);
	}
	for ($y = HEIGHT - $r - 1; $y < HEIGHT; ++$y)
	{
		imagesetpixel($img, $i, $y, $transparency);
	}
}
imagepng($img, "test.png");
?>
