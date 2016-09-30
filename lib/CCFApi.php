<?php
/**
 * Created by PhpStorm.
 * User: zxy96
 * Date: 2016/09/28
 * Time: 15:57
 */
require_once 'HttpClient.php';
class CCFApi{
    public static function search($word,$offset,$limit){
        $url = 'http://term.ccf.org.cn/api.php?';
        $params = array();
        $params['action'] = 'query';
        $params['list'] = 'search';
        $params['srsearch'] = $word;
        $params['sroffset'] = $offset;
        $params['srlimit'] = $limit;
        $params['utf8'] = '';
        $params['format'] = 'json';
        $srtext = json_decode(HttpClient::get($url.http_build_query($params)),true)['query']['search'];
        $params['srwhat'] = 'text';
        $srtitle = json_decode(HttpClient::get($url.http_build_query($params)),true)['query']['search'];
        return array('title' => $srtitle, 'text' => $srtext);
    }

    public static function query($title){
        $url = 'http://term.ccf.org.cn/api.php?';
        $params = array();
        $params['action'] = 'query';
        $params['prop'] = 'revisions';
        $params['titles'] = $title;
        $params['rvprop'] = 'content';
        $params['format'] = 'json';
	    $result = json_decode(HttpClient::get($url.http_build_query($params)),true);
	    if (!isset($result['query'])) return false;
        $page = array_values($result['query']['pages']);
        if(isset($page[0]['revisions'])) return $page[0]['revisions'][0]['*'];
        else return false;
    }

    public static function interpretToHTML($encoded) {
    	$result = preg_replace('/{{#seo.*}}/s', '', $encoded);
	    //解析大分类标题,ex:==XXXX==
	    preg_match_all('/==.*==/', $result, $matches);
	    if (isset($matches[0])) {
	    	foreach ($matches[0] as $code) {
	    		preg_match('/==(.*)==/', $code, $internalMatches);
			    $title = $internalMatches[1];
			    $result = str_replace($code, "<h2>{$title}</h2>", $result);
		    }
	    }
	    //解析小分类标题,ex:[[:分类:XXXX|XXXX]]
    	preg_match_all('/\[\[:分类:.*?\]\]/', $result, $matches);
	    if (isset($matches[0])) {
		    foreach ($matches[0] as $code) {
			    preg_match('/\[\[:(.*)\|(.*)\]\]/', $code, $internalMatches);
			    $uri = $internalMatches[1];
			    $shown = $internalMatches[2];
			    $result = str_replace($code, "<a href='/{$uri}'>{$shown}</a>", $result);
		    }
	    }
	    return $result;
    }
}