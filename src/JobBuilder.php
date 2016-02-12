<?php

namespace Jobles\Careerjet;

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
        $city = $state = null;
        if ($country == 'Brazil') {
            list($city, $state) = explode(' - ', $apiJob->locations);
        }
        $job->setCity($city);
        $job->setState($state);
        $job->setCountry($country);

        return $job;
    }
}
