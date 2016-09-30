<?
/**
 * @var $path
 * @var Request     $request
 * @var Response    $response
 */
$keyword = urldecode($path[0]);
$result = CCFApi::query($keyword);
$htmlContent = CCFApi::interpretToHTML($result);
$response->renderAndSend('index.php', compact('keyword', 'htmlContent'));