<?php

namespace App\Repository;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;

class Analytics {
    protected $client;
    public function __construct()
    {
        $this->client = new BetaAnalyticsDataClient([
            'credentials' => storage_path(env('ANALYTICS_CREDENTIALS_PATH'))
        ]);;
    }

    public function getPopular($propertyId = '')
    {
        $response = $this->client->runReport([
            'property' => 'properties/'.$propertyId,
            'dateRanges' => [
                new DateRange([
                    'start_date' => '7daysAgo',
                    'end_date' => 'today',
                ]),
            ],
            'dimensions' => [
                new Dimension(
                    [
                        'name' => 'pageTitle',
                    ]
                ),
                new Dimension(
                    [
                        'name' => 'pagePath',
                    ]
                ),
            ],
            'metrics' => [
                new Metric(
                    [
                        'name' => 'screenPageViews',
                    ]
                )
            ],
            'orderBys' => [
                new OrderBy(
                    [
                        'metric' => new MetricOrderBy(
                            [
                                'metric_name' => 'screenPageViews',
                            ]
                        ),
                        'desc' => true
                    ]
                ),
            ],
            'pageSize' => 10,

        ]);

        $data = [];
        foreach ($response->getRows() as $row) {
            $data[] = [
                'pageTitle' => $row->getDimensionValues()[0]->getValue(),
                'pagePath' => $row->getDimensionValues()[1]->getValue(),
                'screenPageViews' => $row->getMetricValue()[0]->getValue(),
            
            ];
            // [END analyticsdata_json_credentials_run_report_response]
        }

        return $data;
    }
}