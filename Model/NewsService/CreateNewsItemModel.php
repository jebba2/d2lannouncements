<?php

declare(strict_types=1);

namespace GAState\Tools\D2L\Model\NewsService;

use DateTime;
use GAState\Tools\D2L\Model\D2LModel;
use GAState\Tools\D2L\Model\API\RichTextInputModel;

/**
 * This news feed information block is the one handled by the newfeed service actions (notice that it’s different to the
 * newsfeed.NewsItemData information block handled by the news feed Management service actions).
 *
 * @package GAState\Tools\D2L\Model\NewsItemModel
 * @access public
 * @see https://docs.valence.desire2learn.com/res/news.html#News.NewsItem
 */
class CreateNewsItemModel extends D2LModel
{
    /**
     *
     * @var string $Title
     */
    public string $Title = '';

    /**
     * @var RichTextInputModel $Body
     */
    public RichTextInputModel $Body;


     /**
     *
     * @var ?string $StartDate
     */
    public ?string $StartDate = null;

    /**
     *
     * @var ?string $EndDate
     */
    public ?string $EndDate = null;

    /**
     *
     * @var bool $IsGlobal
     */
    public bool $IsGlobal = false;

     /**
     *
     * @var bool $IsPublished
     */
    public bool $IsPublished = false;

    /**
     *
     * @var bool $ShowOnlyInCourseOfferings
     */
    public bool $ShowOnlyInCourseOfferings = false;

    /**
     *
     * @var bool $IsAuthorInfoShown
     */
    public bool $IsAuthorInfoShown = true;

     /**
     *
     * @var bool $IsPinned
     */
    //public bool $IsPinned = false;

    public function __construct()
    {
        parent::__construct();
        $this->StartDate = gmdate("Y-m-d\TH:i:s\Z");
        $richTextModel = new RichTextInputModel();
        $richTextModel->Type = "Html";
        $richTextModel->Content = 'test';
        $this->Body = $richTextModel;
    }
}
