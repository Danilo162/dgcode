<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['Afghanistan', 'Afghanistan', 'أفغانستان', '93', 'AF', 'https://flagcdn.com/w320/af.png', '🇦🇫'],
            ['Afrique du Sud', 'South Africa', 'جنوب أفريقيا', '27', 'ZA', 'https://flagcdn.com/w320/za.png', '🇿🇦'],
            ['Albanie', 'Albania', 'ألبانيا', '355', 'AL', 'https://flagcdn.com/w320/al.png', '🇦🇱'],
            ['Algérie', 'Algeria', 'الجزائر', '213', 'DZ', 'https://flagcdn.com/w320/dz.png', '🇩🇿'],
            ['Allemagne', 'Germany', 'ألمانيا', '49', 'DE', 'https://flagcdn.com/w320/de.png', '🇩🇪'],
            ['Andorre', 'Andorra', 'أندورا', '376', 'AD', 'https://flagcdn.com/w320/ad.png', '🇦🇩'],
            ['Angola', 'Angola', 'أنغولا', '244', 'AO', 'https://flagcdn.com/w320/ao.png', '🇦🇴'],
            ['Antigua-et-Barbuda', 'Antigua and Barbuda', 'أنتيغوا وباربودا', '1268', 'AG', 'https://flagcdn.com/w320/ag.png', '🇦🇬'],
            ['Arabie saoudite', 'Saudi Arabia', 'المملكة العربية السعودية', '966', 'SA', 'https://flagcdn.com/w320/sa.png', '🇸🇦'],
            ['Argentine', 'Argentina', 'الأرجنتين', '54', 'AR', 'https://flagcdn.com/w320/ar.png', '🇦🇷'],
            ['Arménie', 'Armenia', 'أرمينيا', '374', 'AM', 'https://flagcdn.com/w320/am.png', '🇦🇲'],
            ['Australie', 'Australia', 'أستراليا', '61', 'AU', 'https://flagcdn.com/w320/au.png', '🇦🇺'],
            ['Autriche', 'Austria', 'النمسا', '43', 'AT', 'https://flagcdn.com/w320/at.png', '🇦🇹'],
            ['Azerbaïdjan', 'Azerbaijan', 'أذربيجان', '994', 'AZ', 'https://flagcdn.com/w320/az.png', '🇦🇿'],
            ['Bahamas', 'Bahamas', 'جزر البهاما', '1242', 'BS', 'https://flagcdn.com/w320/bs.png', '🇧🇸'],
            ['Bahreïn', 'Bahrain', 'البحرين', '973', 'BH', 'https://flagcdn.com/w320/bh.png', '🇧🇭'],
            ['Bangladesh', 'Bangladesh', 'بنغلاديش', '880', 'BD', 'https://flagcdn.com/w320/bd.png', '🇧🇩'],
            ['Barbade', 'Barbados', 'بربادوس', '1246', 'BB', 'https://flagcdn.com/w320/bb.png', '🇧🇧'],
            ['Belgique', 'Belgium', 'بلجيكا', '32', 'BE', 'https://flagcdn.com/w320/be.png', '🇧🇪'],
            ['Belize', 'Belize', 'بليز', '501', 'BZ', 'https://flagcdn.com/w320/bz.png', '🇧🇿'],
            ['Bénin', 'Benin', 'بنين', '229', 'BJ', 'https://flagcdn.com/w320/bj.png', '🇧🇯'],
            ['Bhoutan', 'Bhutan', 'بوتان', '975', 'BT', 'https://flagcdn.com/w320/bt.png', '🇧🇹'],
            ['Biélorussie', 'Belarus', 'بيلاروس', '375', 'BY', 'https://flagcdn.com/w320/by.png', '🇧🇾'],
            ['Bolivie', 'Bolivia', 'بوليفيا', '591', 'BO', 'https://flagcdn.com/w320/bo.png', '🇧🇴'],
            ['Bosnie-Herzégovine', 'Bosnia and Herzegovina', 'البوسنة والهرسك', '387', 'BA', 'https://flagcdn.com/w320/ba.png', '🇧🇦'],
            ['Botswana', 'Botswana', 'بوتسوانا', '267', 'BW', 'https://flagcdn.com/w320/bw.png', '🇧🇼'],
            ['Brésil', 'Brazil', 'البرازيل', '55', 'BR', 'https://flagcdn.com/w320/br.png', '🇧🇷'],
            ['Brunei', 'Brunei', 'بروناي', '673', 'BN', 'https://flagcdn.com/w320/bn.png', '🇧🇳'],
            ['Bulgarie', 'Bulgaria', 'بلغاريا', '359', 'BG', 'https://flagcdn.com/w320/bg.png', '🇧🇬'],
            ['Burkina Faso', 'Burkina Faso', 'بوركينا فاسو', '226', 'BF', 'https://flagcdn.com/w320/bf.png', '🇧🇫'],
            ['Burundi', 'Burundi', 'بوروندي', '257', 'BI', 'https://flagcdn.com/w320/bi.png', '🇧🇮'],
            ['Cambodge', 'Cambodia', 'كمبوديا', '855', 'KH', 'https://flagcdn.com/w320/kh.png', '🇰🇭'],
            ['Cameroun', 'Cameroon', 'الكاميرون', '237', 'CM', 'https://flagcdn.com/w320/cm.png', '🇨🇲'],
            ['Canada', 'Canada', 'كندا', '1', 'CA', 'https://flagcdn.com/w320/ca.png', '🇨🇦'],
            ['Cap-Vert', 'Cape Verde', 'الرأس الأخضر', '238', 'CV', 'https://flagcdn.com/w320/cv.png', '🇨🇻'],
            ['Chili', 'Chile', 'تشيلي', '56', 'CL', 'https://flagcdn.com/w320/cl.png', '🇨🇱'],
            ['Chine', 'China', 'الصين', '86', 'CN', 'https://flagcdn.com/w320/cn.png', '🇨🇳'],
            ['Chypre', 'Cyprus', 'قبرص', '357', 'CY', 'https://flagcdn.com/w320/cy.png', '🇨🇾'],
            ['Colombie', 'Colombia', 'كولومبيا', '57', 'CO', 'https://flagcdn.com/w320/co.png', '🇨🇴'],
            ['Comores', 'Comoros', 'جزر القمر', '269', 'KM', 'https://flagcdn.com/w320/km.png', '🇰🇲'],
            ['Congo', 'Congo', 'الكونغو', '242', 'CG', 'https://flagcdn.com/w320/cg.png', '🇨🇬'],
            ['Corée du Nord', 'North Korea', 'كوريا الشمالية', '850', 'KP', 'https://flagcdn.com/w320/kp.png', '🇰🇵'],
            ['Corée du Sud', 'South Korea', 'كوريا الجنوبية', '82', 'KR', 'https://flagcdn.com/w320/kr.png', '🇰🇷'],
            ['Costa Rica', 'Costa Rica', 'كوستاريكا', '506', 'CR', 'https://flagcdn.com/w320/cr.png', '🇨🇷'],
            ['Côte d\'Ivoire', 'Ivory Coast', 'ساحل العاج', '225', 'CI', 'https://flagcdn.com/w320/ci.png', '🇨🇮'],
            ['Croatie', 'Croatia', 'كرواتيا', '385', 'HR', 'https://flagcdn.com/w320/hr.png', '🇭🇷'],
            ['Cuba', 'Cuba', 'كوبا', '53', 'CU', 'https://flagcdn.com/w320/cu.png', '🇨🇺'],
            ['Danemark', 'Denmark', 'الدنمارك', '45', 'DK', 'https://flagcdn.com/w320/dk.png', '🇩🇰'],
            ['Djibouti', 'Djibouti', 'جيبوتي', '253', 'DJ', 'https://flagcdn.com/w320/dj.png', '🇩🇯'],
            ['République dominicaine', 'Dominican Republic', 'جمهورية الدومينيكان', '1809', 'DO', 'https://flagcdn.com/w320/do.png', '🇩🇴'],
            ['Égypte', 'Egypt', 'مصر', '20', 'EG', 'https://flagcdn.com/w320/eg.png', '🇪🇬'],
            ['Émirats arabes unis', 'United Arab Emirates', 'الإمارات العربية المتحدة', '971', 'AE', 'https://flagcdn.com/w320/ae.png', '🇦🇪'],
            ['Équateur', 'Ecuador', 'الإكوادور', '593', 'EC', 'https://flagcdn.com/w320/ec.png', '🇪🇨'],
            ['Érythrée', 'Eritrea', 'إريتريا', '291', 'ER', 'https://flagcdn.com/w320/er.png', '🇪🇷'],
            ['Espagne', 'Spain', 'إسبانيا', '34', 'ES', 'https://flagcdn.com/w320/es.png', '🇪🇸'],
            ['Estonie', 'Estonia', 'إستونيا', '372', 'EE', 'https://flagcdn.com/w320/ee.png', '🇪🇪'],
            ['États-Unis', 'United States', 'الولايات المتحدة', '1', 'US', 'https://flagcdn.com/w320/us.png', '🇺🇸'],
            ['Eswatini', 'Eswatini', 'إسواتيني', '268', 'SZ', 'https://flagcdn.com/w320/sz.png', '🇸🇿'],
            ['Éthiopie', 'Ethiopia', 'إثيوبيا', '251', 'ET', 'https://flagcdn.com/w320/et.png', '🇪🇹'],
            ['France', 'France', 'فرنسا', '33', 'FR', 'https://flagcdn.com/w320/fr.png', '🇫🇷'],
            ['Gabon', 'Gabon', 'الغابون', '241', 'GA', 'https://flagcdn.com/w320/ga.png', '🇬🇦'],
            ['Gambie', 'Gambia', 'غامبيا', '220', 'GM', 'https://flagcdn.com/w320/gm.png', '🇬🇲'],
            ['Ghana', 'Ghana', 'غانا', '233', 'GH', 'https://flagcdn.com/w320/gh.png', '🇬🇭'],
            ['Mali', 'Mali', 'مالي', '223', 'ML', 'https://flagcdn.com/w320/ml.png', '🇲🇱'],
            ['Maroc', 'Morocco', 'المغرب', '212', 'MA', 'https://flagcdn.com/w320/ma.png', '🇲🇦'],
            ['Niger', 'Niger', 'النيجر', '227', 'NE', 'https://flagcdn.com/w320/ne.png', '🇳🇪'],
            ['Nigéria', 'Nigeria', 'نيجيريا', '234', 'NG', 'https://flagcdn.com/w320/ng.png', '🇳🇬'],
            ['Sénégal', 'Senegal', 'السنغال', '221', 'SN', 'https://flagcdn.com/w320/sn.png', '🇸🇳'],
            ['Togo', 'Togo', 'توغو', '228', 'TG', 'https://flagcdn.com/w320/tg.png', '🇹🇬'],
            ['Tunisie', 'Tunisia', 'تونس', '216', 'TN', 'https://flagcdn.com/w320/tn.png', '🇹🇳'],
        ];

        foreach ($countries as $index => $country) {
            DB::table('countries')->insert([
                'code' => $country[4], // Code ISO 2 lettres
                'code3' => $this->getIso3Code($country[4]), // Code ISO 3 lettres
                'name' => json_encode([
                    'fr' => $country[0],
                    'en' => $country[1],
                    'ar' => $country[2]
                ]),
                'flag_emoji' => $country[6],
                'phone_code' => '+' . $country[3],
                'currency_code' => $this->getCurrencyCode($country[4]),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1, // Sera mis à jour après création du super admin
            ]);
        }

        $this->command->info('✅ ' . count($countries) . ' pays créés avec succès!');
    }

    /**
     * Obtenir le code ISO 3 lettres à partir du code 2 lettres
     */
    private function getIso3Code($iso2): string
    {
        $codes = [
            'AF' => 'AFG', 'ZA' => 'ZAF', 'AL' => 'ALB', 'DZ' => 'DZA', 'DE' => 'DEU',
            'AD' => 'AND', 'AO' => 'AGO', 'AG' => 'ATG', 'SA' => 'SAU', 'AR' => 'ARG',
            'AM' => 'ARM', 'AU' => 'AUS', 'AT' => 'AUT', 'AZ' => 'AZE', 'BS' => 'BHS',
            'BH' => 'BHR', 'BD' => 'BGD', 'BB' => 'BRB', 'BE' => 'BEL', 'BZ' => 'BLZ',
            'BJ' => 'BEN', 'BT' => 'BTN', 'BY' => 'BLR', 'BO' => 'BOL', 'BA' => 'BIH',
            'BW' => 'BWA', 'BR' => 'BRA', 'BN' => 'BRN', 'BG' => 'BGR', 'BF' => 'BFA',
            'BI' => 'BDI', 'KH' => 'KHM', 'CM' => 'CMR', 'CA' => 'CAN', 'CV' => 'CPV',
            'CL' => 'CHL', 'CN' => 'CHN', 'CY' => 'CYP', 'CO' => 'COL', 'KM' => 'COM',
            'CG' => 'COG', 'KP' => 'PRK', 'KR' => 'KOR', 'CR' => 'CRI', 'CI' => 'CIV',
            'HR' => 'HRV', 'CU' => 'CUB', 'DK' => 'DNK', 'DJ' => 'DJI', 'DO' => 'DOM',
            'EG' => 'EGY', 'AE' => 'ARE', 'EC' => 'ECU', 'ER' => 'ERI', 'ES' => 'ESP',
            'EE' => 'EST', 'US' => 'USA', 'SZ' => 'SWZ', 'ET' => 'ETH', 'FR' => 'FRA',
            'GA' => 'GAB', 'GM' => 'GMB', 'GH' => 'GHA', 'ML' => 'MLI', 'MA' => 'MAR',
            'NE' => 'NER', 'NG' => 'NGA', 'SN' => 'SEN', 'TG' => 'TGO', 'TN' => 'TUN',
        ];

        return $codes[$iso2] ?? strtoupper($iso2) . 'X';
    }

    /**
     * Obtenir le code de devise
     */
    private function getCurrencyCode($iso2): string
    {
        $currencies = [
            'AF' => 'AFN', 'ZA' => 'ZAR', 'AL' => 'ALL', 'DZ' => 'DZD', 'DE' => 'EUR',
            'AD' => 'EUR', 'AO' => 'AOA', 'AG' => 'XCD', 'SA' => 'SAR', 'AR' => 'ARS',
            'AM' => 'AMD', 'AU' => 'AUD', 'AT' => 'EUR', 'AZ' => 'AZN', 'BS' => 'BSD',
            'BH' => 'BHD', 'BD' => 'BDT', 'BB' => 'BBD', 'BE' => 'EUR', 'BZ' => 'BZD',
            'BJ' => 'XOF', 'BT' => 'BTN', 'BY' => 'BYN', 'BO' => 'BOB', 'BA' => 'BAM',
            'BW' => 'BWP', 'BR' => 'BRL', 'BN' => 'BND', 'BG' => 'BGN', 'BF' => 'XOF',
            'BI' => 'BIF', 'KH' => 'KHR', 'CM' => 'XAF', 'CA' => 'CAD', 'CV' => 'CVE',
            'CL' => 'CLP', 'CN' => 'CNY', 'CY' => 'EUR', 'CO' => 'COP', 'KM' => 'KMF',
            'CG' => 'XAF', 'KP' => 'KPW', 'KR' => 'KRW', 'CR' => 'CRC', 'CI' => 'XOF',
            'HR' => 'EUR', 'CU' => 'CUP', 'DK' => 'DKK', 'DJ' => 'DJF', 'DO' => 'DOP',
            'EG' => 'EGP', 'AE' => 'AED', 'EC' => 'USD', 'ER' => 'ERN', 'ES' => 'EUR',
            'EE' => 'EUR', 'US' => 'USD', 'SZ' => 'SZL', 'ET' => 'ETB', 'FR' => 'EUR',
            'GA' => 'XAF', 'GM' => 'GMD', 'GH' => 'GHS', 'ML' => 'XOF', 'MA' => 'MAD',
            'NE' => 'XOF', 'NG' => 'NGN', 'SN' => 'XOF', 'TG' => 'XOF', 'TN' => 'TND',
        ];

        return $currencies[$iso2] ?? 'USD';
    }
}
