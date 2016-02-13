<?php

namespace Jobles\Tests\Careerjet;

use Jobles\Careerjet\Locale;

class LocaleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider localeDataProvider
     * @param $country
     * @param $language
     * @param $locale
     */
    public function testLocales($country, $language, $locale)
    {
        $this->assertEquals($locale, Locale::byCountryAndLanguage($country, $language));
    }

    public function localeDataProvider()
    {
        return [
            ['Australia', null, 'en_AU'],
            ['Austria', null, 'de_AT'],
            ['Argentina', null, 'es_AR'],
            ['Belgium', 'French', 'fr_BE'],
            ['Belgium', 'Dutch', 'nl_BE'],
            ['Bolivia', null, 'es_BO'],
            ['Brazil', null, 'pt_BR'],
            ['Canada', 'French', 'fr_CA'],
            ['Canada', 'English', 'en_CA'],
            ['Chile', null, 'es_CL'],
            ['China', 'English', 'en_CN'],
            ['China', 'Chinese', 'zh_CN'],
            ['Costa Rica', null, 'es_CR'],
            ['Czech Republic', null, 'cs_CZ'],
            ['Denmark', null, 'da_DK'],
            ['Dominican Republic', null, 'es_DO'],
            ['Ecuador', null, 'es_EC'],
            ['Finland', null, 'fi_FI'],
            ['France', null, 'fr_FR'],
            ['Germany', null, 'de_DE'],
            ['Guatemala', null, 'es_GT'],
            ['Hungary', null, 'hu_HU'],
            ['Hong Kong', null, 'en_HK'],
            ['Italy', null, 'it_IT'],
            ['Ireland', null, 'en_IE'],
            ['India', null, 'en_IN'],
            ['Japan', null, 'ja_JP'],
            ['Korea', null, 'ko_KR'],
            ['Luxembourg', null, 'fr_LU'],
            ['Malaysia', null, 'en_MY'],
            ['Mexico', null, 'es_MX'],
            ['Morocco', null, 'fr_MA'],
            ['Netherlands', null, 'nl_NL'],
            ['New Zealand', null, 'en_NZ'],
            ['Norway', null, 'no_NO'],
            ['Oman', null, 'en_OM'],
            ['Pakistan', null, 'en_PK'],
            ['Panama', null, 'es_PA'],
            ['Paraguay', null, 'es_PY'],
            ['Philippines', null, 'en_PH'],
            ['Peru', null, 'es_PE'],
            ['Poland', null, 'pl_PL'],
            ['Portugal', null, 'pt_PT'],
            ['Puerto Rico', null, 'es_PR'],
            ['Qatar', null, 'en_QA'],
            ['Russia', null, 'ru_RU'],
            ['Singapore', null, 'en_SG'],
            ['Slovakia', null, 'sk_SK'],
            ['South Africa', null, 'en_ZA'],
            ['Spain', null, 'es_ES'],
            ['Sweden', null, 'sv_SE'],
            ['Switzerland', 'German', 'de_CH'],
            ['Switzerland', 'French', 'fr_CH'],
            ['Taiwan', null, 'en_TW'],
            ['Turkey', null, 'tr_TR'],
            ['Ukraine', 'Russian', 'ru_UA'],
            ['Ukraine', 'Ukrainian', 'uk_UA'],
            ['United Arab Emirates', null, 'en_AE'],
            ['United Kingdom', null, 'en_GB'],
            ['United States', null, 'en_US'],
            ['Uruguay', null, 'es_UY'],
            ['Venezuela', null, 'es_VE'],
            ['Vietnam', 'English', 'en_VN'],
            ['Vietnam', 'Vietnamese', 'vi_VN'],
        ];
    }
}
