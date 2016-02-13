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

    /**
     * @dataProvider statesDataProvider
     * @param $stateName
     * @param $shortState
     * @throws \Jobles\Careerjet\Exception\CareerjetException
     */
    public function testLocationsAsStateNameSetsShortStateOnJob($stateName, $shortState)
    {
        $this->apiJob->locations = $stateName;
        $this->job = JobWithBrazilianLocationsBuilder::fromApi($this->apiJob, $this->job);

        $this->assertEquals($shortState, $this->job->getState());
        $this->assertNull($this->job->getCity());
        $this->assertEquals('Brazil', $this->job->getCountry());
    }

    public function statesDataProvider()
    {
        return [
            ['Acre', 'AC'],
            ['Alagoas', 'AL'],
            ['Amapá', 'AP'],
            ['Amapa', 'AP'],
            ['Amazonas', 'AM'],
            ['Bahia', 'BA'],
            ['Ceará', 'CE'],
            ['Ceara', 'CE'],
            ['Distrito-Federal', 'DF'],
            ['Distrito Federal', 'DF'],
            ['Espírito Santo', 'ES'],
            ['Espirito Santo', 'ES'],
            ['Goiás', 'GO'],
            ['Goias', 'GO'],
            ['Maranhão', 'MA'],
            ['Maranhao', 'MA'],
            ['Mato Grosso', 'MT'],
            ['Mato Grosso do Sul', 'MS'],
            ['Minas Gerais', 'MG'],
            ['Pará', 'PA'],
            ['Para', 'PA'],
            ['Paraíba', 'PB'],
            ['Paraiba', 'PB'],
            ['Paraná', 'PR'],
            ['Parana', 'PR'],
            ['Pernambuco', 'PE'],
            ['Piauí', 'PI'],
            ['Piaui', 'PI'],
            ['Rio de Janeiro', 'RJ'],
            ['Rio Grande do Norte', 'RN'],
            ['Rio Grande do Sul', 'RS'],
            ['Rondônia', 'RO'],
            ['Rondonia', 'RO'],
            ['Roraima', 'RR'],
            ['Santa Catarina', 'SC'],
            ['São Paulo', 'SP'],
            ['Sao Paulo', 'SP'],
            ['Sergipe', 'SE'],
            ['Tocantins', 'TO'],
        ];
    }
}
