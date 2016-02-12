<?php

namespace Jobles\Careerjet;

use Jobles\Careerjet\Builder\BrazilianLocationsBuilder;
use Jobles\Core\Job\Job;

class JobBuilder
{
    /**
     * @param \stdClass $apiJob
     * @param $country
     * @return Job
     */
    public static function fromApi(\stdClass $apiJob, $country)
    {
        $job = new Job;
        $job->setTitle($apiJob->title);
        $job->setDate(new \DateTime($apiJob->date));
        $job->setSnippet($apiJob->description);
        $job->setViewUrl($apiJob->url);
        if (isset($apiJob->salary_currency_code)) {
            $job->setSalaryCurrencyCode($apiJob->salary_currency_code);
        }
        if (isset($apiJob->salary_min)) {
            $job->setSalaryMin($apiJob->salary_min);
        }
        if (isset($apiJob->salary_max)) {
            $job->setSalaryMax($apiJob->salary_max);
        }
        $job->setCountry($country);
        switch ($country) {
            case 'Brazil':
                $job = BrazilianLocationsBuilder::fromApi($apiJob, $job);
                break;
            default:
                break;
        }

        return $job;
    }
}
