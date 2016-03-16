<?php

namespace Jobles\Careerjet\Builder;

use Jobles\Careerjet\Exception\CareerjetException;
use Jobles\Core\Job\Job;

class JobBuilder
{

    /**
     * @param \stdClass $apiJob
     * @param           $country
     *
     * @return Job
     * @throws CareerjetException
     */
    public static function fromApi(\stdClass $apiJob, string $country) : Job
    {
        self::validateJob($apiJob);

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
                $job = JobWithBrazilianLocationsBuilder::fromApi($apiJob, $job);
                break;
            default:
                break;
        }
        $job->setSource($apiJob->site);
        if (!empty($apiJob->company)) {
            $job->setCompany($apiJob->company);
        }

        return $job;
    }

    /**
     * @param \stdClass $apiJob
     *
     * @throws CareerjetException
     */
    private static function validateJob(\stdClass $apiJob)
    {
        if (!isset($apiJob->title)
            || !isset($apiJob->date)
            || !isset($apiJob->description)
            || !isset($apiJob->url)
            || !isset($apiJob->site)
        ) {
            throw new CareerjetException('Invalid API job');
        }
    }
}
