<?php

namespace Jobles\Careerjet\Builder;

class BrazilianLocationsBuilder
{
    /**
     * @param \stdClass $apiJob
     * @param \Jobles\Core\Job\Job $job
     * @return \Jobles\Core\Job\Job
     */
    public static function fromApi(\stdClass $apiJob, \Jobles\Core\Job\Job $job)
    {
        switch ($apiJob->locations) {
            case 'Brasil':
                break;
            case 'Acre':
                $job->setState('AC');
                break;
            case 'Alagoas':
                $job->setState('AL');
                break;
            case 'Amapá':
            case 'Amapa':
                $job->setState('AP');
                break;
            case 'Amazonas':
                $job->setState('AM');
                break;
            case 'Bahia':
                $job->setState('BA');
                break;
            case 'Ceará':
            case 'Ceara':
                $job->setState('CE');
                break;
            case 'Distrito-Federal':
            case 'Distrito Federal':
                $job->setState('DF');
                break;
            case 'Espírito Santo':
            case 'Espirito Santo':
                $job->setState('ES');
                break;
            case 'Goiás':
            case 'Goias':
                $job->setState('GO');
                break;
            case 'Maranhão':
            case 'Maranhao':
                $job->setState('MA');
                break;
            case 'Mato Grosso':
                $job->setState('MT');
                break;
            case 'Mato Grosso do Sul':
                $job->setState('MS');
                break;
            case 'Minas Gerais':
                $job->setState('MG');
                break;
            case 'Pará':
            case 'Para':
                $job->setState('PA');
                break;
            case 'Paraíba':
            case 'Paraiba':
                $job->setState('PB');
                break;
            case 'Paraná':
            case 'Parana':
                $job->setState('PR');
                break;
            case 'Pernambuco':
                $job->setState('PE');
                break;
            case 'Piauí':
            case 'Piaui':
                $job->setState('PI');
                break;
            case 'Rio de Janeiro':
                $job->setState('RJ');
                break;
            case 'Rio Grande do Norte':
                $job->setState('RN');
                break;
            case 'Rio Grande do Sul':
                $job->setState('RS');
                break;
            case 'Rondônia':
            case 'Rondonia':
                $job->setState('RO');
                break;
            case 'Roraima':
                $job->setState('RR');
                break;
            case 'Santa Catarina':
                $job->setState('SC');
                break;
            case 'São Paulo':
            case 'Sao Paulo':
                $job->setState('SP');
                break;
            case 'Sergipe':
                $job->setState('SE');
                break;
            case 'Tocantins':
                $job->setState('TO');
                break;
            default:
                list($city, $state) = explode(' - ', $apiJob->locations);
                $job->setState($state);
                $job->setCity($city);
                break;
        }

        return $job;
    }
}
