<?php
/**
 * Created by PhpStorm.
 * User: zxy96
 * Date: 2016/09/28
 * Time: 15:57
 */
require_once 'HttpClient.php';
class CCFApi{
    public static function search($word,$offset){
        $url = 'http://term.ccf.org.cn/api.php?';
        $params = array();
        $params['action'] = 'query';
        $params['list'] = 'search';
        $params['srsearch'] = $word;
        $params['sroffset'] = $offset;
        $params['utf8'] = '';
        $params['format'] = 'json';

        $params['srwhat'] = 'text';
        //return json_decode(HttpClient::get($url.http_build_query($params)));
        var_dump(json_decode(HttpClient::get($url.http_build_query($params),true)));
    }

    public static function query($title){
        $url = 'http://term.ccf.org.cn/api.php?';
        $params = array();
        $params['action'] = 'query';
        $params['prop'] = 'revisions';
        $params['titles'] = $title;
        $params['rvprop'] = 'content';
        $params['format'] = 'json';
        $page = array_values(json_decode(HttpClient::get($url.http_build_query($params)),true)['query']['pages']);
        if(isset($page[0]['revisions'])) return $page[0]['revisions'][0]['*'];
    }
}