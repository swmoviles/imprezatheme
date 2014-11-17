<?php
$output = $title = $link = $size = $el_class = '';
extract(shortcode_atts(array(
	'link' => 'http://vimeo.com/23237102',
	'ratio' => '16-9'
), $atts));

$ratio_class = ($ratio != '')?' ratio_'.$ratio:'';

$regexes = array (
    array (
        'regex' => '/^http(?:s)?:\/\/(?:.*?)\.?youtube\.com\/(watch\?[^#]*v=(\w+)).*$/i',
        'provider' => 'youtube',
        'id' => 2,
    ),
    array (
        'regex' => '/^http(?:s)?:\/\/(?:.*?)\.?youtu\.be\/(\w+).*$/i',
        'provider' => 'youtube',
        'id' => 1,
    ),
    array (
        'regex' => '/^http(?:s)?:\/\/(?:.*?)\.?vimeo\.com\/(\d+).*$/i',
        'provider' => 'vimeo',
        'id' => 1,
    ),
);
$result = false;

foreach ($regexes as $regex) {
    if (preg_match($regex['regex'], $link, $matches)) {
        $result = array ('provider' => $regex['provider'], 'id' => $matches[$regex['id']]);
    }
}

if ($result) {
    if ($result['provider'] == 'youtube') {
        $output = '<div class="w-video'.$ratio_class.'"><iframe width="420" height="315" src="//www.youtube.com/embed/' . $result['id'] . '" frameborder="0" allowfullscreen></iframe></div>';
    } elseif ($result['provider'] == 'vimeo') {
        $output = '<div class="w-video'.$ratio_class.'"><iframe src="//player.vimeo.com/video/' . $result['id'] . '?byline=0&amp;color=cc2200" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
    }
} else {
    global $wp_embed;
    $embed = $wp_embed->run_shortcode('[embed]'.$link.'[/embed]');

    $output = '<div class="w-video'.$ratio_class.'">' . $embed . '</div>';
}

echo $output;