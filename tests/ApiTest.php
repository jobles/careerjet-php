<?php

namespace Jobles\Tests\Careerjet;

use Jobles\Careerjet\Api;
use Jobles\Core\Job\Job;
use Jobles\Core\Job\JobCollection;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    public function testSearch()
    {
        $filtersOutside = [
            'keywords' => 'PHP',
            'location' => 'Sao Paulo',
            'limit' => '5',
        ];
        $filtersInside = [
            'keywords' => 'PHP',
            'location' => 'Sao Paulo',
            'pagesize' => '5',
            'page' => 1,
            'affid' => '12345',
        ];
        $json = '{"jobs":[{"locations":"São Paulo - SP","site":"www.ceviu.com.br","date":"Sat, 13 Feb 2016 08:57:17 GMT","url":"http://jobviewtrack.com/pt-br/job-12345","title":"Programador PHP PL","description":"Atividades: Responsável pela implementação dos projetos web","company":"","salary":""}],"hits":748,"response_time":0.0886948108673096,"type":"JOBS","pages":748}';
        $mock = $this->getMockBuilder('Careerjet_API')->disableOriginalConstructor()->getMock();
        $mock->method('search')->with($filtersInside)->willReturn(json_decode($json));
        $api = new Api('12345', 'Brazil', null, $mock);
        $result = $api->search($filtersOutside);

        $this->assertInstanceOf(JobCollection::class, $result);
        $this->assertCount(1, $result);
        $job = $result->pick(0);
        $this->assertInstanceOf(Job::class, $job);
        $this->assertEquals('Programador PHP PL', $job->getTitle());
    }
}
