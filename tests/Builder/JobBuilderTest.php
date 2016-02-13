<?php

namespace Jobles\Tests\Careerjet\Builder;

use Jobles\Careerjet\Builder\JobBuilder;
use Jobles\Careerjet\Exception\CareerjetException;

class JobBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testFromApiShouldThrowCareerjetExceptionOnInvalidData()
    {
        $this->expectException(CareerjetException::class);
        $this->expectExceptionMessage('Invalid API job');

        JobBuilder::fromApi(new \stdClass, 'Brazil');
    }

    public function testFromApi()
    {
        $apiJob = new \stdClass;
        $apiJob->title = 'Analista de Sistema para Software de RH';
        $apiJob->date = 'Sat, 13 Feb 2016 08:59:39 GMT';
        $apiJob->description = 'Principais atribuições do cargo...';
        $apiJob->url = 'http://jobviewtrack.com/pt-br/job-12345';
        $apiJob->site = 'www.ceviu.com.br';
        $apiJob->company = 'Mega Enterprise, Co';
        $apiJob->locations = 'São Paulo - SP';

        $job = JobBuilder::fromApi($apiJob, 'Brazil');

        $this->assertEquals('Analista de Sistema para Software de RH', $job->getTitle());
        $this->assertInstanceOf(\DateTime::class, $job->getDate());
        $this->assertEquals('2016-02-13 08:59:39', $job->getDate()->format('Y-m-d H:i:s'));
        $this->assertEquals('Principais atribuições do cargo...', $job->getSnippet());
        $this->assertEquals('http://jobviewtrack.com/pt-br/job-12345', $job->getViewUrl());
        $this->assertEquals('www.ceviu.com.br', $job->getSource());
        $this->assertEquals('Mega Enterprise, Co', $job->getCompany());
        $this->assertEquals('São Paulo', $job->getCity());
        $this->assertEquals('SP', $job->getState());
    }
}
