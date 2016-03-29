<?php

namespace Jobles\Careerjet;

use Jobles\Careerjet\Builder\JobBuilder;
use Jobles\Core\API\SearchInterface;
use Jobles\Core\Job\JobCollection;

class Api implements SearchInterface
{

    /**
     * @var string
     */
    private $affiliateId;

    /**
     * @var \Careerjet_API
     */
    private $api;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $language;

    public function __construct(
        string $affiliateId,
        string $country,
        string $language = null,
        \Careerjet_API $api = null
    ) {
        $this->affiliateId = $affiliateId;
        $this->country = $country;
        $this->language = $language;

        $this->api = !empty($api) ? $api : new \Careerjet_API(Locale::byCountryAndLanguage($country, $language));
    }

    /**
     * @param array $filters
     *
     * @return JobCollection
     * @throws Exception\CareerjetException
     */
    public function search(array $filters = []) : JobCollection
    {
        $collection = new JobCollection;
        $search = ['affid' => $this->affiliateId];
        if (isset($filters['keywords'])) { // empty allowed
            $search['keywords'] = $filters['keywords'];
        }
        if (isset($filters['location'])) { // empty allowed
            $search['location'] = $filters['location'];
        }
        if (isset($filters['limit'])) { // max 99
            $search['pagesize'] = $filters['limit'];
        }
        $search['page'] = isset($filters['offset']) ? $filters['offset'] : 1; // starts on 1

        $result = $this->api->search($search);
        foreach ($result->jobs as $job) {
            $collection->add(JobBuilder::fromApi($job, $this->country));
        }

        return $collection;
    }
}
