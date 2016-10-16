<?
/**
 * @var $path
 * @var Request     $request
 * @var Response    $response
 */
$keyword = urldecode(isset($path[2]) ? $path[2] : '');
if (!$keyword) $response->renderAndSend('search.php', compact('keyword'));
$queryResult = CCFApi::query($keyword);
if ($queryResult) $response->redirect("/mobile/{$keyword}");
$offset = $request->offset ?: 0;
$limit = $request->limit ?: 15;
$searchResult = CCFApi::search($keyword, $offset, $limit);
$response->renderAndSend('search.php', compact('keyword', 'searchResult', 'offset', 'limit'));