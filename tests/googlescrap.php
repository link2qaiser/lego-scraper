<?php
include("simple_html_dom.php");
class Scrapping {
    function googleSearch($keyword,$page = 1){
        $keyword = str_replace(' ','+',$keyword); // space is a +

        if($page == 1) {
            $url  = 'http://www.google.com/search?hl=en&tbo=d&site=&source=hp&q='.$keyword.'&oq='.$keyword.'';
        }
        else{
            $page = ($page - 1) * 10;
            $url  = 'http://www.google.com/search?hl=en&tbo=d&site=&source=hp&q='.$keyword.'&oq='.$keyword.'&start='.$page;
        }
        $html = file_get_html($url);
        $i=0;
        $linkObjs = $html->find('h3.r a'); 
        $glinks = [];
        foreach ($linkObjs as $linkObj) {
            $title = trim($linkObj->plaintext);
            $link  = trim($linkObj->href);
            // if it is not a direct link but url reference found inside it, then extract
            if (!preg_match('/^https?/', $link) && preg_match('/q=(.+)&amp;sa=/U', $link, $matches) && preg_match('/^https?/', $matches[1])) {
                $link = $matches[1];
            } else if (!preg_match('/^https?/', $link)) { // skip if it is not a valid link
                continue;
            }
            $descr = $html->find('span.st',$i); // description is not a child element of H3 thereforce we use a counter and recheck.
            $glinks[$i]['link'] =  $link;
            $glinks[$i]['title'] =  $title;
            //$glinks[$i]['descr'] =  $descr;
            $i++;
        }
        return $glinks;
    }
}
$scrap = new Scrapping();
$resp = $scrap->googleSearch('celebrity networht write for us');
echo "<pre>"; print_r($resp); die();
