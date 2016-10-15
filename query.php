<?
/**
 * @var $path
 * @var Request     $request
 * @var Response    $response
 */
$keyword = urldecode($path[1]);
$result = CCFApi::query($keyword);
$htmlContent = CCFApi::interpretToHTML($result);
$response->renderAndSend('query.php', compact('keyword', 'htmlContent'));