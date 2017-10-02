<?php

function BBCode($string) {

    $BBcode = array(
        '/\[i\](.*?)\[\/i\]/is',
        '/\[b\](.*?)\[\/b\]/is',
        '/\[u\](.*?)\[\/u\]/is',
        '/\[s\](.*?)\[\/s\]/is',
        '/\[img\](.*?)\[\/img\]/is',
        '/\[center\](.*?)\[\/center\]/is',
        '/\[h1\](.*?)\[\/h1\]/is',
        '/\[h2\](.*?)\[\/h2\]/is',
        '/\[h3\](.*?)\[\/h3\]/is',
        '/\[h4\](.*?)\[\/h4\]/is',
        '/\[h5\](.*?)\[\/h5\]/is',
        '/\[h6\](.*?)\[\/h6\]/is',
        '/\[quote\](.*?)\[\/quote\]/is',
        '/\[url=(.*?)\](.*?)\[\/url\]/is',
        '/\[bgcolor=(.*?)\](.*?)\[\/bgcolor\]/is',
        '/\[color=(.*?)\](.*?)\[\/color\]/is',
        '/\[bgimage=(.*?)\](.*?)\[\/bgimage\]/is',
        '/\[size=(.*?)\](.*?)\[\/size\]/is',
        '/\[font=(.*?)\](.*?)\[\/font\]/is'
    );

    $HTML = array(
        '<i>$1</i>',
        '<b>$1</b>',
        '<u>$1</u>',
        '<s>$1</s>',
        '<img src="$1" />',
        '<center>$1</center>',
        '<h1>$1</h1>',
        '<h2>$1</h2>',
        '<h3>$1</h3>',
        '<h4>$1</h4>',
        '<h5>$1</h5>',
        '<h6>$1</h6>',
        '<blockquote style="background:#f1f5f7;color:#404040;padding:4px;border-radius:4px;">$1</blockquote>',
        '<a href="$1" target="_blank">$2</a>',
        '<div style="background: $1;">$2</div>',
        '<span style="color: $1;">$2</span>',
        '<div style="background: url(\'$1\');">$2</div>',
        '<span style="font-size: $1px">$2</span>',
        '<span style="font-family: $1">$2</span>'
    );

    return nl2br(preg_replace($BBcode,$HTML,$string));
}

?>
