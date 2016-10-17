<?
/**
 * @var $path
 * @var Request     $request
 * @var Response    $response
 */
$keyword = urldecode($path[1]);
$result = CCFApi::query($keyword);
$htmlContent = CCFApi::interpretToHTML($result);
$statistics = CCFApi::statistics();
$response->renderAndSend('query.php', compact('keyword', 'htmlContent', 'statistics'));