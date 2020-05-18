<?php

namespace modules\console\controllers;

use Algolia\AlgoliaSearch\SearchClient;
use Craft;
use rias\scout\Scout;
use Tightenco\Collect\Support\Collection;
use yii\console\ExitCode;
use yii\helpers\Console;

class AlgoliaController extends \craft\console\Controller
{
    public function actionUpdateViewCount(string $indexName): int
    {
        $scoutSettings = Scout::$plugin->getSettings();
        $scoutIndex = $scoutSettings->getIndices()
            ->firstWhere('indexName', $indexName);

        $index = Craft::$container->get(SearchClient::class)->initIndex($indexName);
        $ids = $scoutIndex->criteria->ids();
        $updates = Collection::make($scoutIndex->criteria->all())
          ->map(function ($entry) {
              return [
                'objectID' => $entry->id,
                'viewCount' => $entry->viewCount,
              ];
          });

        $batches = Collection::make($index->partialUpdateObjects($updates->all()));
        $total = Collection::make($batches)->reduce(function ($carry, $item) {
            return $carry + count($item['objectIDs']);
        }, 0);

        $this->stdout("{$total} element(s) updated in {$batches->count()} batch(es).\n");

        return ExitCode::OK;
    }
}