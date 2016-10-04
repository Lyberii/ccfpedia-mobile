<?php
/**
 * Created by PhpStorm.
 * User: zxy96
 * Date: 2016/09/28
 * Time: 15:57
 */
require_once 'HttpClient.php';
class CCFApi {
	const API_URL = "http://term.ccf.org.cn/api.php?";
	public static function search($word, $offset = 0, $limit = 15) {
		$params = array();
		$params['action'] = 'query';
		$params['list'] = 'search';
		$params['srsearch'] = $word;
		$params['sroffset'] = $offset;
		$params['srlimit'] = $limit;
		$params['utf8'] = '';
		$params['format'] = 'json';
		$textSearchResult = json_decode(HttpClient::get(self::API_URL . http_build_query($params)), true);
		$srtext = isset($textSearchResult['query']['search']) ? $textSearchResult['query']['search'] : [];
		$params['srwhat'] = 'text';
		$titleSearchResult = json_decode(HttpClient::get(self::API_URL . http_build_query($params)), true);
		$srtitle = isset($titleSearchResult['query']['search']) ? $titleSearchResult['query']['search'] : [];
		return [
			'title' => $srtitle,
			'text' => $srtext,
		];
	}

	public static function query($title) {
		$params = array();
		$params['action'] = 'query';
		$params['prop'] = 'revisions';
		$params['titles'] = $title;
		$params['rvprop'] = 'content';
		$params['format'] = 'json';
		$result = json_decode(HttpClient::get(self::API_URL . http_build_query($params)), true);
		if (!isset($result['query'])) return false;
		$page = array_values($result['query']['pages']);
		if (isset($page[0]['revisions'])) return $page[0]['revisions'][0]['*'];
		else return false;
	}

	public static function sizeInterpret($size) {
		if ($size > 1048576) {
			$unit = 'MB';
		} elseif ($size > 1024) {
			$unit = 'KB';
		} else {
			$unit = '字节';
		}
		switch ($unit) {
			case 'MB':
				$size /= 1048576;
				break;
			case 'KB':
				$size /= 1024;
				break;
		}
		return (int)$size . $unit;
	}

	public static function timeInterpret($timestamp) {
		return date('Y年m月d日 H:i', strtotime($timestamp));
	}

	public static function interpretToHTML($encoded) {
		//去SEO文本
		$result = preg_replace('/{{#seo.*}}/s', '', $encoded);
		//解析大分类标题,ex:==XXXX==
		preg_match_all('/==.*==/', $result, $matches);
		if (isset($matches[0])) {
			foreach ($matches[0] as $code) {
				preg_match('/==(.*)==/', $code, $internalMatches);
				$title = $internalMatches[1];
				$result = str_replace($code, "<h3>{$title}</h3>", $result);
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
		//解析链接,ex:[[XXX]]
		$result = preg_replace('/\[\[(.*?)\]\]/', '<a href=\'/$1\'>$1</a>', $result);
		//解析链接,ex:|XXX|http[s]://XXXXXXX
		$result = preg_replace('/\|(.*)\|\|(http[s]?.*)/', '|<td><a href="$2">$1</a>', $result);
		//解析wikitable
		while(true) {
			$wikitableStartPos = strpos($result, '{|');
			$wikitableEndPos = strpos($result, '|}');
			$wikitable = $wikitableStartPos !== false && $wikitableEndPos !== false ? substr($result, $wikitableStartPos, $wikitableEndPos+2) : false;
			if ($wikitable) {
				$tableDesctiption = substr($wikitable, strpos($wikitable, '{|') + 2, strpos($wikitable, '|-') - 2);
				$htmlTable = "<table {$tableDesctiption}>";
				$table = substr($wikitable, strpos($wikitable, '|-') + 2);
				$table = preg_replace('/\|\|/', '</td><td>', $table);
				$table = preg_replace('/\|\-/', '</td></tr>', $table);
				$table = preg_replace('/\|}/', '</tr></table>', $table);
				$table = preg_replace('/\|/', '<tr>', $table);
				$htmlTable .= $table;
				$result = str_replace($wikitable, $htmlTable, $result);
			} else {
				break;
			}
		}
		return $result;
	}
}