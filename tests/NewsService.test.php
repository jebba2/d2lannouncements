<?php

declare(strict_types=1);

use GAState\Tools\D2L\API\NewsServiceAPI;
use GAState\Tools\D2L\Model\NewsService\CreateNewsItemModel;
use GAState\Tools\D2l\Model\NewsService\NewsItemModel;
use GAState\Tools\D2L\Exception\D2LResponseException;

global $d2l;

require 'bootstrap.php';

main: {

    $newsAPI = new NewsServiceAPI($d2l);

    $newNewsItem = new CreateNewsItemModel();
    $newNewsItem->Title = 'Fake News';
    //$newNewsItem->Body = 'More Fake News';
    $newNewsItem->IsPublished = true;

    $body = [];
    $body["Text"] = "Test text";
    $body['Html'] = null;

    $test = [];
    $test["Title"] = "test5";    //title
    $test["Body"] = $body;      //body
    $test["StartDate"] = "2024-04-18T14:42:00.000Z";  //start date
    $test["EndDate"] = null;  //enddate
    $test["IsGlobal"] = false;  //isglobal
    $test["IsPublished"] = true;  // ispublushed
    $test["ShowOnlyInCourseOfferings"] = false;  //y
    $test["IsAuthorInfoShown"] = false;  //y
    $test["IsPinned"] = false; //y

    var_dump(json_encode($test));

    try {
       //var_dump($newsAPI->createNewsItem(2915419, $test));
       //var_dump($newsAPI->updateNewsItem(2915419, )
       var_dump($newsAPI->getAllNewsItemForOrg(2915419));

    } catch (D2LResponseException $ex) {
        var_dump($ex->getMessage(), $ex->response->statusCode, $ex->response->data);
    }
}