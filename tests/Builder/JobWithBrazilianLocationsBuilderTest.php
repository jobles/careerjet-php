<?php

namespace Jobles\Tests\Careerjet\Builder;

use Jobles\Careerjet\Builder\JobWithBrazilianLocationsBuilder;
use Jobles\Core\Job\Job;

class JobWithBrazilianLocationsBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testFromApiThrowsCareerjetExceptionWhenLocationIsNotPresent()
    {
        $this->expectException(\Jobles\Careerjet\Exception\CareerjetException::class);
        $this->expectExceptionMessage('Invalid API job');

        JobWithBrazilianLocationsBuilder::fromApi(new \stdClass, new Job);
    }

    public function testLocationIsBrasil()
    {
        $apiJob = new \stdClass;
        $apiJob->locations = 'Brasil';

        $job = new Job;
        $job->setCountry('Brazil');
        $job = JobWithBrazilianLocationsBuilder::fromApi($apiJob, $job);

        $this->assertNull($job->getState());
        $this->assertNull($job->getCity());
        $this->assertEquals('Brazil', $job->getCountry());
    }
}
