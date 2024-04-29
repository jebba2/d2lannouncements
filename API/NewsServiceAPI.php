<?php

declare(strict_types=1);

namespace GAState\Tools\D2L\API;

use GAState\Tools\D2L\{
    Exception\D2LResponseException,
    Exception\D2LExpectedObjectException,
    Exception\D2LExpectedArrayException
};
use GAState\Tools\D2L\Model\NewsService\NewsItemModel;
use GAState\Tools\D2L\Model\NewsService\CreateNewsItemModel;
use InvalidArgumentException;

/**
 * Manages the News Items in the courses
 *
 * @package GAState\Tools\D2L\API
 * @access public
 * @see https://docs.valence.desire2learn.com/res/news.html
 */
class NewsServiceAPI extends D2LAPI
{
    /**
     * Delete a particular news item from an org unit.
     *
     * @param int $orgUnitId Org unit ID
     * @param int $newsItemId News Item ID
     *
     * @return void
     *
     * @see https://docs.valence.desire2learn.com/res/news.html#delete--d2l-api-le-(version)-(orgUnitId)-news-(newsItemId)
     */
    public function deleteNewsItem(int $orgUnitId, int $newsItemId): void
    {
        $response = $this->callAPI(
            product: 'le',
            action: 'GET',
            route: "/$orgUnitId/news/$newsItemId"
        );
        if (!is_object($response->data)) {
            throw new D2LExpectedObjectException(response: $response);
        }
    }

    /**
     * Retrieve a list of news items for an org unit.
     *
     * @param int $orgUnitId Org unit ID
     *
     * @return ?array<int,NewsItemModel>
     *
     * @see https://docs.valence.desire2learn.com/res/news.html#get--d2l-api-le-(version)-(orgUnitId)-news-
     */
    public function getAllNewsItemForOrg(int $orgUnitId): ?array
    {
        $response = $this->callAPI(
            product: 'le',
            action: 'GET',
            route: "/$orgUnitId/news/"
        );

        if (!is_array($response->data)) {
            throw new D2LExpectedArrayException(response: $response);
        }

        $newsItems = [];
        foreach ($response->data as $values) {
            if (is_object($values)) {
                $newsItems[] = new NewsItemModel(values: $values);
            }
        }

        return $newsItems;
    }

    /**
     * Create a news item for an org unit.
     *
     * @param int                 $orgUnitId Org unit ID
     * @param CreateNewsItemModel $newNewsItem News Item Data
     *
     * @return NewsItemModel
     *
     * @see https://docs.valence.desire2learn.com/res/news.html#get--d2l-api-le-(version)-(orgUnitId)-news-
     */
    public function createNewsItem(int $orgUnitId, array $newNewsItem): NewsItemModel
    {
        $response = $this->callAPI(
            product: 'le',
            action: 'POST',
            route: "/$orgUnitId/news/",
            data: $newNewsItem
        );

        if (!is_object($response->data)) {
            throw new D2LExpectedObjectException(response: $response);
        }
        return new NewsItemModel(values: $response->data);
    }

    /**
     * Dismiss (hide) a news item for an org unit.
     *
     * @param int $orgUnitId Org unit ID
     * @param int $newsItemId News Item ID
     *
     * @return void
     *
     * @see https://docs.valence.desire2learn.com/res/news.html#post--d2l-api-le-(version)-(orgUnitId)-news-(newsItemId)-dismiss
     */
    public function dismissNewsItem(int $orgUnitId, int $newsItemId): void
    {
        $response = $this->callAPI(
            product: 'le',
            action: 'POST',
            route: "/$orgUnitId/news/$newsItemId/dismiss"
        );
        if (!is_object($response->data)) {
            throw new D2LExpectedObjectException(response: $response);
        }
    }

     /**
     * Publish a draft news item for an org unit.
     *
     * @param int $orgUnitId Org unit ID
     * @param int $newsItemId News Item ID
     *
     * @return void
     *
     * @see https://docs.valence.desire2learn.com/res/news.html#post--d2l-api-le-(version)-(orgUnitId)-news-(newsItemId)-publish
     */
    public function publishNewsItem(int $orgUnitId, int $newsItemId): void
    {
        $response = $this->callAPI(
            product: 'le',
            action: 'POST',
            route: "/$orgUnitId/news/$newsItemId/publish"
        );
        if (!is_object($response->data)) {
            throw new D2LExpectedObjectException(response: $response);
        }
    }

     /**
     * Restore (unhide) a news item for an org unit.
     *
     * @param int $orgUnitId Org unit ID
     * @param int $newsItemId News Item ID
     *
     * @return void
     *
     * @see https://docs.valence.desire2learn.com/res/news.html#post--d2l-api-le-(version)-(orgUnitId)-news-(newsItemId)-restore
     */
    public function restoreNewsItem(int $orgUnitId, int $newsItemId): void
    {
        $response = $this->callAPI(
            product: 'le',
            action: 'POST',
            route: "/$orgUnitId/news/$newsItemId/restore"
        );
        if (!is_object($response->data)) {
            throw new D2LExpectedObjectException(response: $response);
        }
    }

    /**
     * Update a news item for an org unit.
     *
     * @param int $orgUnitId Org unit ID
     * @param int $newsItemId News Item ID
     * @param CreateNewsItemModel $newsItem News Item Data Item
     *
     * @return void
     *
     * @see https://docs.valence.desire2learn.com/res/news.html#put--d2l-api-le-(version)-(orgUnitId)-news-(newsItemId)
     */
    public function updateNewsItem(int $orgUnitId, int $newsItemId, CreateNewsItemModel $newsItem): void
    {
        $response = $this->callAPI(
            product: 'le',
            action: 'PUT',
            route: "/$orgUnitId/news/$newsItemId",
            data: $newsItem
        );
        if (!is_object($response->data)) {
            throw new D2LExpectedObjectException(response: $response);
        }
    }
}
