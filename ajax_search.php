<?php
/**
 * @var Request $request
 * @var Response $response
 */
$keyword = $request->s;
$searchResult = CCFApi::search($keyword)['title'];
$result = [];
if ($searchResult) {
	foreach ($searchResult as $item) $result[] = $item['title'];
}
$response->send(json_encode($result));