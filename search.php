<?
/**
 * @var $path
 * @var Request     $request
 * @var Response    $response
 */
$keyword = urldecode($path[1]);
$queryResult = CCFApi::query($keyword);
if ($queryResult) $response->redirect("/{$keyword}");
$offset = $request->offset ?: 0;
$limit = $request->limit ?: 15;
$searchResult = CCFApi::search($keyword);
//todo: Render and Show
//todo: size是页面大小,需要转换成字节、KB、MB等等; timestamp需要转换成中文格式