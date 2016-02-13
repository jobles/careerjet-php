<?php

namespace Jobles\Tests\Careerjet\Builder;

use Jobles\Careerjet\Builder\JobWithBrazilianLocationsBuilder;
use Jobles\Core\Job\Job;

class JobWithBrazilianLocationsBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \stdClass
     */
    private $apiJob;

    /**
     * @var Job
     */
    private $job;

    public function setUp()
    {
        $this->apiJob = new \stdClass;
        $this->job = new Job;
        $this->job->setCountry('Brazil');
    }

    public function testFromApiThrowsCareerjetExceptionWhenLocationIsNotPresent()
    {
        $this->expectException(\Jobles\Careerjet\Exception\CareerjetException::class);
        $this->expectExceptionMessage('Invalid API job');

        JobWithBrazilianLocationsBuilder::fromApi(new \stdClass, new Job);
    }

    public function testLocationIsBrasil()
    {
        $this->apiJob->locations = 'Brasil';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertNull($this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }

    public function testLocationIsAcre()
    {
        $this->apiJob->locations = 'Acre';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('AC', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }

    public function testLocationIsAlagoas()
    {
        $this->apiJob->locations = 'Alagoas';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('AL', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }

    public function testLocationIsAmapa()
    {
        $this->apiJob->locations = 'Amapá';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('AP', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());

        $this->apiJob->locations = 'Amapa';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('AP', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }

    public function testLocationIsAmazonas()
    {
        $this->apiJob->locations = 'Amazonas';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('AM', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }

    public function testLocationIsBahia()
    {
        $this->apiJob->locations = 'Bahia';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('BA', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }

    public function testLocationIsCeara()
    {
        $this->apiJob->locations = 'Ceará';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('CE', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());

        $this->apiJob->locations = 'Ceara';
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals('CE', $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }
}
