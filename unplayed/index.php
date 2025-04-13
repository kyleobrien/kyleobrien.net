<?php

require_once 'libs/Michelf/Markdown.inc.php';
require_once 'libs/Michelf/SmartyPants.inc.php';

use Michelf\Markdown, Michelf\SmartyPants;

function e($html) { echo preg_replace('#\(([^\)]+)\)#', '<span>\1</span>', $html); }
function t($filename) {
	$text = file_get_contents($filename);
	$html = Markdown::defaultTransform($text);
	$html = SmartyPants::defaultTransform($html);

	return $html;
}

?>

<html lang="en-US">
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width" />
		<!--<meta name="viewport" content="width=320, initial-scale=1, minimum-scale=0.45" />-->
		<title>Unplayed</title>
		<style>

		*
		{
			margin: 0;
			padding: 0;
			border: none;
		}

		body
		{
			font: 13px/18px sans-serif;
			color: black;
			background-color: whitesmoke;
			padding: 16px;
		}

		a
		{
			text-decoration: none;
			font-weight: bold;
			color: inherit;
		}

		a:hover
		{
			color: #333;
		}

		div
		{
			-webkit-box-sizing: border-box;
			-ms-box-sizing: border-box;
			-moz-box-sizing: border-box;
			-o-box-sizing: border-box;
			box-sizing: border-box;
			padding: 16px;
			width: 25%;
			float: left;
		}

		#footer
		{
			margin: 16px 16px 0;
			padding: 16px 0 0;
			border-top: 1px solid #333;
			float: none;
			clear: both;
			width: auto;
		}

		h1
		{
			margin: 0 0 16px;
			padding: 0 0 16px;
			border-bottom: 4px solid #333;
		}

		p
		{
			margin: 0 0 16px;
		}

		li
		{
			list-style: none;
			padding: 0 0 2px 16px;
			position: relative;
		}

		li:before
		{
			display: block;
			content: '-';
			font-weight: bold;
			position: absolute;
			top: -2px;
			left: 0;
			font-size: 24px;
		}

		span
		{
			color: black;
			font-size: 9px;
		}

		span + span
		{
			font-size: 11px;
			line-height: 13px;
			display: block;
			position: relative;
			top: -2px;
			color: #212121;
		}

		/* iPhone [portrait + landscape] */
		@media only screen and (max-device-width: 480px)
		{
			body
			{
				padding: 0;
			}
			div
			{
				width: 320px;
				clear: both;
			}
			#footer
			{
				margin: 16px;
			}
		}
		</style>
	</head>
	<body>
	<div>
	<h1>Unplayed</h1>
	<?php e(t('unplayed.markdown')); ?>
	</div>

	<div>
	<h1>Unbeaten</h1>
	<?php e(t('unbeaten.markdown')); ?>
	</div>

	<div>
	<h1>Beaten</h1>
	<?php e(t('beaten.markdown')); ?>
	</div>

	<div>
	<h1>Abandoned</h1>
	<?php e(t('abandoned.markdown')); ?>
	</div>

	<div id="footer"><a href="http://shauninman.com/">Shaun Inman</a> gave me this idea. <a href="http://shauninman.com/archive/2011/04/18/unplayed">More info</a></div>

	</body>
</html>
