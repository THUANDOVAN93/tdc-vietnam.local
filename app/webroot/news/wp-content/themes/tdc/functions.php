<?php 
function find_link($html) {
    preg_match_all("|<a.+href\s*=\s*'(.*?)'.+?>|", $html, $match) ;
    return $match[1][0];
}
 
function my_archives_link($link_html){
$nowurl='http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$displaylink=find_link($link_html);
    if($nowurl == $displaylink){
        $link_html = preg_replace('@<li>@i', '<li class="navcr">', $link_html);
    }
    return $link_html;
}
add_filter('get_archives_link', 'my_archives_link');
add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));
?>