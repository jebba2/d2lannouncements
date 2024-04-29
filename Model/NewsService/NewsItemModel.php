<?php

declare(strict_types=1);

namespace GAState\Tools\D2L\Model\NewsService;

use GAState\Tools\D2L\Model\D2LModel;

/**
 * This news feed information block is the one handled by the newfeed service actions (notice that it’s different to the
 * newsfeed.NewsItem information block handled by the news feed Management service actions).
 *
 * @package GAState\Tools\D2L\Model\NewsItemModel
 * @access public
 * @see https://docs.valence.desire2learn.com/res/news.html#News.NewsItemData
 */
class NewsItemModel extends D2LModel
{
    /**
     * @var string $Id
     */
    public string $Id = '';

    /**
     * @var string $IsHidden
     */
    public string $IsHidden = '';

    /**
     * @var array<string> $Attachments
     */
    public array $Attachments;

    /**
     *
     * @var string $Title
     */
    public string $Title = '';

    /**
     * @var object $Body
     */
    public object $Body;

    /**
     *
     * @var ?int $CreatedBy
     */
    public ?int $CreatedBy = null;

    /**
     *
     * @var string $CreatedDate
     */
    public ?string $CreatedDate = null;

     /**
     *
     * @var ?int $LastModifiedBy
     */
    public ?int $LastModifiedBy = null;

     /**
     *
     * @var ?string $LastModifiedDate
     */
    public ?string $LastModifiedDate = null;

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
    public bool $IsPinned = false;
}
