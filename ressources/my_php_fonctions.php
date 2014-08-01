<?php 

//Convert URL to HyperLink
function ShortUrl($matches) {
	 $link_displayed = (strlen($matches[0]) > 50) ? substr( $matches[0], 0, 10).'…'.substr($matches[0], -10) : $matches[0];
	 return '<a href="'.$matches[0].'" title="Se rendre à « '.$matches[0].' »" target=_blank>'.$link_displayed.'</a>';
}
function UrlToShortLink ($text) {
	//Pattern to retrieve the url in the comment
    	$pattern = '`((?:https?|ftp)://\S+?)(?=[[:punct:]]?(?:\s|\Z)|\Z)`'; 
	//Replacement of the pattern
	$text = preg_replace_callback($pattern, 'ShortUrl', $text);
	return $text;
}
?>