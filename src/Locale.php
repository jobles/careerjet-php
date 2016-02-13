<?php

namespace Jobles\Careerjet;

class Locale
{
    /**
     * @param string $country
     * @param string $language
     * @return string
     */
    public static function byCountryAndLanguage($country, $language = null)
    {
        switch ($country) {
            case 'Australia': // English
                $locale = 'en_AU';
                break;
            case 'Austria': // German
                $locale = 'de_AT';
                break;
            case 'Argentina': // Spanish
                $locale = 'es_AR';
                break;
            case 'Belgium':
                switch ($language) {
                    case 'French':
                        $locale = 'fr_BE';
                        break;
                    case 'Dutch':
                    default:
                        $locale = 'nl_BE';
                }
                break;
            case 'Bolivia': // Spanish
                $locale = 'es_BO';
                break;
            case 'Brazil': // Portuguese
                $locale = 'pt_BR';
                break;
            case 'Canada': // French
                switch ($language) {
                    case 'French':
                        $locale = 'fr_CA';
                        break;
                    case 'English':
                    default:
                        $locale = 'en_CA';
                }
                break;
            case 'Chile': // Spanish
                $locale = 'es_CL';
                break;
            case 'China':
                switch ($language) {
                    case 'English':
                        $locale = 'en_CN';
                        break;
                    case 'Chinese':
                    default:
                        $locale = 'zh_CN';
                }
                break;
            case 'Costa Rica': // Spanish
                $locale = 'es_CR';
                break;
            case 'Czech Republic': // Czech
                $locale = 'cs_CZ';
                break;
            case 'Denmark': // Danish
                $locale = 'da_DK';
                break;
            case 'Dominican Republic': // Spanish
                $locale = 'es_DO';
                break;
            case 'Ecuador': // Spanish
                $locale = 'es_EC';
                break;
            case 'Finland': // Finnish
                $locale = 'fi_FI';
                break;
            case 'France': // French
                $locale = 'fr_FR';
                break;
            case 'Germany': // German
                $locale = 'de_DE';
                break;
            case 'Guatemala': // Spanish
                $locale = 'es_GT';
                break;
            case 'Hungary': // Hungarian
                $locale = 'hu_HU';
                break;
            case 'Hong Kong': // English
                $locale = 'en_HK';
                break;
            case 'Italy': // Italian
                $locale = 'it_IT';
                break;
            case 'Ireland': // English
                $locale = 'en_IE';
                break;
            case 'India': // English
                $locale = 'en_IN';
                break;
            case 'Japan': // Japanese
                $locale = 'ja_JP';
                break;
            case 'Korea': // Korean
                $locale = 'ko_KR';
                break;
            case 'Luxembourg': // French
                $locale = 'fr_LU';
                break;
            case 'Malaysia': // English
                $locale = 'en_MY';
                break;
            case 'Mexico': // Spanish
                $locale = 'es_MX';
                break;
            case 'Morocco': // French
                $locale = 'fr_MA';
                break;
            case 'Netherlands': // Dutch
                $locale = 'nl_NL';
                break;
            case 'New Zealand': // English
                $locale = 'en_NZ';
                break;
            case 'Norway': // Norwegian
                $locale = 'no_NO';
                break;
            case 'Oman': // English
                $locale = 'en_OM';
                break;
            case 'Pakistan': // English
                $locale = 'en_PK';
                break;
            case 'Panama': // Spanish
                $locale = 'es_PA';
                break;
            case 'Paraguay': // Spanish
                $locale = 'es_PY';
                break;
            case 'Philippines': // English
                $locale = 'en_PH';
                break;
            case 'Peru': // Spanish
                $locale = 'es_PE';
                break;
            case 'Poland': // Polish
                $locale = 'pl_PL';
                break;
            case 'Portugal': // Portuguese
                $locale = 'pt_PT';
                break;
            case 'Puerto Rico': // Spanish
                $locale = 'es_PR';
                break;
            case 'Qatar': // English
                $locale = 'en_QA';
                break;
            case 'Russia': // Russian
                $locale = 'ru_RU';
                break;
            case 'Singapore': // English
                $locale = 'en_SG';
                break;
            case 'Slovakia': // Slovak
                $locale = 'sk_SK';
                break;
            case 'South Africa': // English
                $locale = 'en_ZA';
                break;
            case 'Spain': // Spanish
                $locale = 'es_ES';
                break;
            case 'Sweden': // Swedish
                $locale = 'sv_SE';
                break;
            case 'Switzerland':
                switch ($language) {
                    case 'German':
                        $locale = 'de_CH';
                        break;
                    case 'French':
                    default:
                        $locale = 'fr_CH';
                }
                break;
            case 'Taiwan': // English
                $locale = 'en_TW';
                break;
            case 'Turkey': // Turkish
                $locale = 'tr_TR';
                break;
            case 'Ukraine':
                switch ($language) {
                    case 'Russian':
                        $locale = 'ru_UA';
                        break;
                    case 'Ukrainian':
                    default:
                        $locale = 'uk_UA';
                }
                break;
            case 'United Arab Emirates': // English
                $locale = 'en_AE';
                break;
            case 'United Kingdom': // English
                $locale = 'en_GB';
                break;
            case 'United States': // English
                $locale = 'en_US';
                break;
            case 'Uruguay': // Spanish
                $locale = 'es_UY';
                break;
            case 'Venezuela': // Spanish
                $locale = 'es_VE';
                break;
            case 'Vietnam':
                switch ($language) {
                    case 'English':
                        $locale = 'en_VN';
                        break;
                    case 'Vietnamese':
                    default:
                        $locale = 'vi_VN';
                }
                break;
            default:
                throw new \InvalidArgumentException('Please use a valid country');
        }

        return $locale;
    }
}
