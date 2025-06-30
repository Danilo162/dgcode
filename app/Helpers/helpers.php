<?php

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Nwidart\Modules\Facades\Module;
use Ramsey\Uuid\Guid\Guid;
use Tuupola\Base62;


if (!function_exists('allMonth')) {
    function allMonth()
    {
        return [1=>__("label.title_january"),2=> __("label.title_february")
            ,3=> __("label.title_march"),4=> __("label.title_april")
            ,5=> __("label.title_may"),6=>__("label.title_june")
            ,7=>__("label.title_july"),8=> __("label.title_august")
            ,9=> __("label.title_september"),10=> __("label.title_october")
            ,11=> __("label.title_november"),12=> __("label.title_december")];
    }
}
if (!function_exists('allMonthArra')) {
    function allMonthArra()
    {
        return [__("label.title_january"),__("label.title_february")
            , __("label.title_march"),__("label.title_april")
            , __("label.title_may"),__("label.title_june")
            ,__("label.title_july"), __("label.title_august")
            ,__("label.title_september"), __("label.title_october")
            ,__("label.title_november"),__("label.title_december")];
    }
}
if (!function_exists('month_name_by')) {
    function month_name_by($id)
    {
        $months =  [__("label.title_january"),  __("label.title_february"), __("label.title_march"), __("label.title_april"), __("label.title_may"), __("label.title_june"), __("label.title_july"), __("label.title_august"), __("label.title_september"), __("label.title_october"), __("label.title_november"), __("label.title_december")];
        if(is_numeric($id)){
            if($id<13)
                return $months[intval($id)-1];
        }
        return "";
    }
}
if (!function_exists('d_format')) {
    function d_format($date)
    {
        if ($date && $date != "1970-01-01" && $date != null && $date != "") {
            return date("d/m/Y", strtotime($date));
        } else {
            return "";
        }


    }
}
if (!function_exists('d_format_rw')) {
    function d_format_rw($date)
    {

        if ($date && $date != "1970-01-01" && $date != "__/__/___" && $date != "____-__-__"
            && $date != "____-__-__") {
            $array = explode("/", $date);

            if (count($array) == 3 ) {

                $full = $array[2] . "-" . $array[1] . "-" . $array[0];
                if(is_numeric($array[2])){
//                    return;
                    return $full;
                }
//                dd($full);

            }
//            else
//            $array = explode("-", $date);
//            if (count($array) == 3 && array_filter($array,       'is_int')) {
//                $full = $array[2] . "-" . $array[1] . "-" . $array[0];
//                return $full;
//            }
            return null;
        } else {
            return null;
        }


    }

}
if (!function_exists('d_number')) {
    function d_number($number,$decimal=",")
    {
        $number = str_replace(" ","",$number);
        if($number && is_numeric($number)){
            return number_format($number, 0, $decimal, ' ');
        }
        else
            return 0;
    }
}

if (!function_exists('d_diff_get_day')) {
    function d_diff_get_day($from,$to)
    {
        if(!$from || !$to ){
            return "";
        }
        if(is_date($from) && is_date($to))
            $from = date('Y-m-d',strtotime($from));
              $to = date('Y-m-d',strtotime($to));

        $nodays=(strtotime($to) - strtotime($from))/ (60 * 60 * 24);
        if($nodays>0){
            return $nodays;
        }
        elseif ($nodays==0){
            return  1;
        }else{
            return "";
        }

    }

}
if (!function_exists('is_date')) {
    function is_date($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;

    }

}
if (!function_exists('number_replace_blank')) {
    function number_replace_blank($montant)
    {

        if($montant){
            $montant = str_replace("_","",$montant);
            $montant = str_replace(" ","",$montant);
            return $montant;
        }
        return null;
    }


}
if (!function_exists('linked')) {
    function linked($route,$val)
    {
        if(!$route or !$val) return "";
        $link =  "<a style='color:inherit !important '  href='".$route."'>$val</a>";
        return $link;
    }


}
if (!function_exists('linkeDetailOfCanvas')) {
    function linkeDetailOfCanvas($route,$id,$val,$size=100)
    {
        if(!$route or !$val) return "";
        $link = "<a style='color:inherit !important;cursor:pointer' onclick=\"loadOfCanvas('" . $route . "', '" . htmlspecialchars(json_encode(["id" => $id]), ENT_QUOTES, 'UTF-8') . "', $size)\">" . $val . "</a>";

        return $link;
    }


}
if (!function_exists('JsonResponse')) {
    function  JsonResponse($succesState = false, $Message = 'Erreur', $Url = 0)
    {
        return json_encode(array("success" => $succesState, "message" => $Message, "url" => $Url));
    }

}
if (!function_exists('d_date_days')) {
    function d_date_days($from, $to)
    {

        if ($from && $to) {
            $from = date('d-m-Y', strtotime($from));
            $to = date('d-m-Y', strtotime($to));
            $nodays = (strtotime($to) - strtotime($from)) / (60 * 60 * 24);
            return $nodays;
        } else {
            return "";
        }

    }
}
if (!function_exists('dateDiff')) {
    function dateDiff($begen, $end, $out_in_array = false)
    {
        $intervalo = date_diff(date_create($begen), date_create($end));
        $out = $intervalo->format("<span style='color: orangered'>%Y</span> ans <span style='color: orangered'>%M</span> mois %D jours");
        if (!$out_in_array)
            return $out;
        $a_out = array();
        $expodeText = explode(',', $out);
        array_walk($expodeText,
            function ($val, $key) use (&$a_out) {
                $v = explode(':', $val);
                $a_out[$v[0]] = $v[1];
            });
        return $a_out;
    }


}
if (!function_exists('datetofr')) {
    /**
     * Format and return the date in french
     *
     * @access    public
     * @param null|unix $timestamp
     * @param string $modejour
     * @param string $modemois
     * @param string $modeheure
     * @return string Usage:
     *
     * Usage:
     * Function has 4 params:
     * - timestamp: date/time (UNIX format)
     * - modejour: l:long (lundi 23) ; c:short (lun 23) ; n:day number (23) ; h:nothing
     * L or C in Caps puts the first letter of the day in Caps (ex C : Lun)
     * - modemois: l:long (septembre) ; c:short (sept) ; n:number (09) ; h:nothing
     * L or C in Caps puts the first letter of the day in Caps (ex C : Lun)
     * - modeheure: l:long (7 heures 35) ; c:short (7h35) ; n:nothing
     *
     * Examples :
     * $this->load->library('dateutils');
     *
     * echo $this->dateutils->datefr()                    =    27/04/1980
     * echo $this->dateutils->datefr(325689845,'C','L','n');    =    Dim 27 Avril 1980
     * echo $this->dateutils->datefr(325689845,'n','c','n');    =    27 avr 1980
     * echo $this->dateutils->datefr(325689845,'l','n','l');    =    dimanche 27/04/1980 7 heures 35
     * echo $this->dateutils->datefr(325689845,'h','h','l');    =    7 heures 35
     * @internal param unix $timestamp timestamp
     * @internal param day $string display formatting
     * @internal param month $string display formatting
     * @internal param hour $string display formatting
     */
    function datetofr($timestamp = null, $modejour = 'n', $modemois = 'n', $modeheure = 'n')
    {
        $defaulttime = time();
        if ($timestamp == null) {
            $timestamp =$defaulttime;
        }

        /* On formate notre date */
        $jour = date("d", $timestamp);      // jour
        $mois = date("m", $timestamp);      // mois
        $annee = date("Y", $timestamp);      // annee
        $num_jour = date("w", $timestamp);     // numero du jour de la semaine
        $hour = date("H", $timestamp);         // heure
        $minute = date("i", $timestamp);     // minute

        /* Initialisation*/
        $heure = '';
        $aff_heure = ' heures ';
        if ($hour == 0 || $hour == 1)
            $aff_heure = ' heure ';

        /* On definit numero du mois */
        $zero = substr($mois, 0, 1);
        if ($zero == "0") {
            $num_mois = substr($mois, 1, 1);  // On supprime le premier zero
        } else {
            $num_mois = $mois;
        }

        /* Nom long des jours */
        $noml_jour[0] = __("label.title_sunday");
        $noml_jour[1] = __("label.title_monday");
        $noml_jour[2] = __("label.title_tuesday");
        $noml_jour[3] = __("label.title_wednesday");
        $noml_jour[4] = __("label.title_thursday");
        $noml_jour[5] = __("label.title_friday");
        $noml_jour[6] =__("label.title_thursday");
        /* Nom court des jours */
        $nomc_jour[0] = __("label.title_sun");
        $nomc_jour[1] = __("label.title_mon");
        $nomc_jour[2] = __("label.title_tue");
        $nomc_jour[3] = __("label.title_wed");
        $nomc_jour[4] = __("label.title_thu");
        $nomc_jour[5] = __("label.title_fri");
        $nomc_jour[6] = __("label.title_sat");

        /* Nom long des mois */
        $noml_mois[1] = __("label.title_january");
        $noml_mois[2] = __("label.title_february");
        $noml_mois[3] = __("label.title_march");
        $noml_mois[4] = __("label.title_april");
        $noml_mois[5] = __("label.title_may");
        $noml_mois[6] = __("label.title_june");
        $noml_mois[7] = __("label.title_july");
        $noml_mois[8] = __("label.title_august");
        $noml_mois[9] = __("label.title_september");
        $noml_mois[10] = __("label.title_october");
        $noml_mois[11] = __("label.title_november");
        $noml_mois[12] = __("label.title_december");
        /* Nom court des mois */
        $nomc_mois[1] = __("label.title_jan");
        $nomc_mois[2] = __("label.title_feb");
        $nomc_mois[3] = __("label.title_mar");
        $nomc_mois[4] = __("label.title_apr");
        $nomc_mois[5] = __("label.title_ma");
        $nomc_mois[6] = __("label.title_jun");
        $nomc_mois[7] = __("label.title_jul");
        $nomc_mois[8] = __("label.title_aug");
        $nomc_mois[9] = __("label.title_sept");
        $nomc_mois[10] = __("label.title_oct");
        $nomc_mois[11] = __("label.title_nov");
        $nomc_mois[12] = __("label.title_dec");

        /* Affichage du jour */
        switch ($modejour) {
            case  "l":
                $jour = $noml_jour[$num_jour] . ' ' . $jour;                 // samedi 23
                break;
            case  "L":
                $jour = ucfirst($noml_jour[$num_jour]) . ' helpers.php' . $jour;         // Samedi 23
                break;
            case  "c":
                $jour = $nomc_jour[$num_jour] . ' ' . $jour;                 // sam 23
                break;
            case  "C":
                $jour = ucfirst($nomc_jour[$num_jour]) . ' helpers.php' . $jour;         // Sam 23
                break;
            case  "h":
                $jour = '';
                break;
        }                                                             // default : 23
        /* Affichage du mois */
        switch ($modemois) {
            case  "l":
                $mois = ' ' . $noml_mois[$num_mois] . ' ' . $annee;              // janvier 1999
                break;
            case  "L":
                $mois = ' ' . ucfirst($noml_mois[$num_mois]) . ' ' . $annee;     // Janvier 1999
                break;
            case  "c":
                $mois = ' ' . $nomc_mois[$num_mois] . ' ' . $annee;              // jan 1999
                break;
            case  "C":
                $mois = ' ' . ucfirst($nomc_mois[$num_mois]) . ' ' . $annee;     // Jan 1999
                break;
            case  "h":
                $mois = '';
                break;
            default:
                $mois = '/' . $mois . '/' . $annee;                             // /08/1999
                break;
        }
        /* Affichage de l'heure */
        switch ($modeheure) {
            case  "l":
                $heure = ' ' . $hour . $aff_heure . $minute;                     // 23 heures 54
                break;
            case  "c":
                $heure = ' ' . $hour . 'h' . $minute;                             // 23h54
                break;
        }

        /* Valeur retourn�e */
        return $jour . $mois . $heure;
    }


}
if (!function_exists('truncate')) {
    function truncate($string, $length, $ellipsis = true)
    {
        $string = strip_tags($string);
        // Count all the uppercase and other wider-than-normal characters
        $wide = strlen(preg_replace('/[^A-Z0-9_@#%$&]/', '', $string));

        // Reduce the length accordingly
        $length = round($length - $wide * 0.2);

        // Condense all entities to one character
        $clean_string = preg_replace('/&[^;]+;/', '-', $string);
        if (strlen($clean_string) <= $length) return $string;

        // Use the difference to determine where to clip the string
        $difference = $length - strlen($clean_string);
        $result = substr($string, 0, $difference);

        if ($result != $string and $ellipsis) {
            $result = add_ellipsis($result);
        }

        return $result;
    }
}
if (!function_exists('add_ellipsis')) {
    function add_ellipsis($string)
    {
        $string = strip_tags($string);
        $string = substr($string, 0, strlen($string) - 3);
        return trim(preg_replace('/ .{1,3}$/', '', $string)) . '...';
    }
}
//ajout agnimel 25/08/2020 en remplacement du project_img progressivement
if (!function_exists('help_img_config')) {

    /**
     * @param $maxi 1 = maxi, 2 = entete
     * @param $ipublic
     * @return string
     */
    function help_img_config($maxi=null, $ipublic=null)
    {
        //
            if(!$maxi){
                $defaultUrl =  asset_or_public('logos/default_mini.png',$ipublic);
                $picture = "configs/logo_mini.png";
            }
            else{
                if($maxi==1){
                    $defaultUrl =  asset_or_public('logos/default_maxi.png',$ipublic);
                    $picture = "configs/logo_maxi.png";
                }elseif ($maxi==2){
                    $defaultUrl =  asset_or_public('logos/default_entete.png',$ipublic);
                    $picture = "configs/logo_entete.png";
                }

            }

            if (Storage::disk('public')->exists($picture))
            {
                $defaultUrl = asset_or_public('storage/' . $picture,$ipublic);
            }
        return $defaultUrl;
    }
}
if (!function_exists('help_img')) {

    function help_img($picture, $organ = "default",$is_public=null)
    {
        // Recherche d'image de couverture

        $array_picture_file=["user"=>"users/" ,"default"=>""];
        $isIcon = !is_numeric($picture);


        if($isIcon) $picture=$array_picture_file[$organ].$picture.".png";

        $defaultUrl = $isIcon ? asset_or_public('img/avatars/1.png',$is_public) : asset_or_public('img/avatars/1.png',$is_public);


        if($organ!=""){

            if (Storage::disk('public')->exists($picture))
            {

                $defaultUrl = asset_or_public('storage/' . $picture,$is_public);
            }

        }else{
            $defaultUrl = asset_or_public('img/avatars/1.png',$is_public);
            if (Storage::disk('public')->exists($picture)) $defaultUrl = asset_or_public('storage/' . $picture,);
        }

        return $defaultUrl;
    }
}
if (!function_exists('asset_or_public')) {
    function asset_or_public($path,$is_public=null)
    {

        if($is_public){
        $img =    public_path($path)    ;
      //   $img = "data:image/png;base64,".base64_encode(file_get_contents(public_path($path)))  ;
        }else{
            $img =   asset($path)    ;
        }
        return $img;

    }
}
if (!function_exists('help_tempsecouler')) {
    ///fonction du temp ecoulé
    function help_tempsecouler($session_time)
    {

        $time_difference = time() - $session_time;
        $seconds = $time_difference;
        $minutes = round($time_difference / 60);
        $hours = round($time_difference / 3600);
        $days = round($time_difference / 86400);
        $weeks = round($time_difference / 604800);
        $months = round($time_difference / 2419200);
        $years = round($time_difference / 29030400);

        if ($seconds <= 60) {
            echo __('label.title_secondvar',["scde"=>$seconds]);


           // echo trans('motorcycles.success', ['attributes' => trans('motorcycles.attributes.updated')]);

        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                echo __("label.title_aminago");
            } else {
                echo __('label.title_minutevar',["min"=>$minutes]);
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                echo __("label.title_anhour");
            } else {
                echo __('label.title_hourvar',["hr"=>$hours]);
            }
        } else if ($days <= 7) {
            if ($days == 1) {
                echo __("label.title_yesterday");
            } else {
                echo __('label.title_dayvar',["dys"=>$days]);
            }

        } else if ($weeks <= 4) {
            if ($weeks == 1) {
                echo __("label.title_aweek");
            } else {
                echo __('label.title_weekvar',["wk"=>$weeks]);
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                echo __("label.title_amonthago");
            } else {
                echo __('label.title_monthvar',["mth"=>$months]);
            }

        } else {
            if ($years == 1) {
                echo __("label.title_ayearago");
            } else {
                echo __('label.title_yearvar',["yr"=>$years]);
            }
        }
    }

}
if (!function_exists('duration_now')) {
    ///fonction du temp ecoulé
    function duration_now($session_time)
    {

        $time_difference = time() - $session_time;
        $seconds = $time_difference;
        $minutes = round($time_difference / 60);
        $hours = round($time_difference / 3600);
        $days = round($time_difference / 86400);
        $weeks = round($time_difference / 604800);
        $months = round($time_difference / 2419200);
        $years = round($time_difference / 29030400);

        if ($seconds <= 60) {
            return __('label.title_secondvar',["scde"=>$seconds]);
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return __("label.title_aminago");
            } else {
                return __('label.title_minutevar',["min"=>$minutes]);
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return __("label.title_anhour");
            } else {
                return __('label.title_hourvar',["hr"=>$hours]);
            }
        } else if ($days <= 7) {
            if ($days == 1) {
                return __("label.title_yesterday");
            } else {
                return __('label.title_dayvar',["dys"=>$days]);
            }

        } else if ($weeks <= 4) {
            if ($weeks == 1) {
                return __("label.title_aweek");
            } else {
                return __('label.title_weekvar',["wk"=>$weeks]);
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return __("label.title_amonthago");
            } else {
                return __('label.title_monthvar',["mth"=>$months]);
            }


        } else {
            if ($years == 1) {
                return __("label.title_ayearago");
            } else {
                return __('label.title_yearvar',["yr"=>$years]);
            }
        }
    }

}
if (!function_exists('truncate_lines')) {
    function truncate_lines($string, $line_length, $lines, $ellipsis = true)
    {
        $string = strip_tags($string);

        $result = '';
        $spaces_added = 0;
        $next_start =null;

        // Divide up the string into lines
        for ($i = 0; $i < $lines; $i++) {
            if (!$next_start) {
                $start = $i * $line_length;
            } else {
                $start = $next_start;
            }

            $line = substr($string, $start, $line_length + 1);

            // Truncate the line by the appropriate length
            $old_line = $line;
            $line = truncate($line, $line_length, false);
            $difference = strlen($old_line) - strlen($line);
            $next_start = (($i + 1) * $line_length) - $difference + 1;

            // If there are no line breaks in this line at all
            if (strlen($line) < strlen($string) and !strstr($line, ' ')) {
                // Add a space to it, keep track of how many spaces are added
                $line .= ' ';
                $spaces_added++;
            }

            $result .= $line;
        }

        $result = substr($result, 0, strlen($result) - $spaces_added);

        if ($result != $string and $ellipsis) {
            $result = add_ellipsis($result);
        }

        return $result;
    }
}
if (!function_exists('date_l')) {
    function date_l($date)
    {
        help_tempsecouler(strtotime($date));

    }
}
if (!function_exists('getBrowserSession')) {
    function getBrowserSession($u_agent)
    {
        // $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }

        if (preg_match('/Android/i', $u_agent)) {
            $platform = 'android';
        }

        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= $matches['version'][1];
            }
        }
        else {
            $version= $matches['version'][0];
        }

        // check if we have a number
        if ($version==null || $version=="") {$version="?";}

        return array(
            'userAgent' => $u_agent,
            'name'      => $bname,
            'version'   => $version,
            'platform'  => $platform,
            'pattern'    => $pattern
        );
    }

}
if (!function_exists('navigator_logo')) {
    function navigator_logo($name)
    {

        $path = asset('assets/images/navigators');
        switch ($name){
            case 'Google Chrome':
                $data=$path."/chrome.png";
                break;
            case 'Mozilla Firefox':
                $data=$path."/firefox.png";
                break;
            case 'Internet Explorer':
                $data=$path."/internet_explore.png";
                break;
            case 'Safari':
                $data=$path."/safari.png";
                break;
            case 'Opera':
                $data=$path."/opera.png";
                break;
            case 'Netscape':
                $data=$path."/netscape.png";
                break;
            default:
                $data=$path."/navigator.png";
                break;
        }

        return $data;






    }

}
if (!function_exists('platform_icon')) {
    function platform_icon($plaform)
    {


        switch ($plaform){
            case 'android':
                $data="<i class='ui icon mobile alternate text-gray'></i>";

                break;

            case 'linux':
                $data="<i class='ui icon desktop text-gray'></i>";
                break;
            case 'windows':
                $data="<i class='ui icon desktop text-gray'></i>";
                break;

            case 'mac':
                $data="<i class='ui icon desktop text-gray'></i>";

                break;

            default:
                //  $data="<i class='ui icon tablet alternate'></i>";
                $data="";
                break;
        }

        return $data;






    }

}
if (!function_exists('getRoles')) {
    function getRoles($role=null)
    {
         $query= DB::table("roles");
        if($role){
            $query->where("id","=",$role);
        }

        $rs =$query->whereNull("deleted_at")->get();

        return $rs;

    }
}
if (!function_exists('getRoleArrays')) {
    function getRoleArrays($type)
    {
         $query= DB::table("roles")
         ->whereIn("id",$type);

        $rs =$query->whereNull("deleted_at")->get();

        return $rs;

    }
}

if (!function_exists('listingModule')) {
    function listingModule()
    {

        $tabMenu = [];
        $allModules = Module::getOrdered();

        foreach ($allModules as $allModule) {
            $config = [];
            $namef = strtolower($allModule->getName());

            $name = config($namef . ".name");
            $nameFull = config($namef . ".name_full");
            $route = config($namef . ".route") ?? "";
            $permission = config($namef . ".permission") ?? "";

            $nameFull_2 = config($namef . ".name_full_2");
            $nameFull_1 = config($namef . ".name_full_1");
            $route_2 = config($namef . ".route_2") ?? "";
            $route_1 = config($namef . ".route_1") ?? "";
            $permission_2 = config($namef . ".permission_2") ?? "";
            $active_2 = config($namef . ".active_2") ?? "";
            $permission_1 = config($namef . ".permission_1") ?? "";
            $active_1 = config($namef . ".active_1") ?? "";

            $icon = config($namef . ".icon") ?? "";
            $route_param = config($namef . ".route_param") ?? "";
            $menu_module = config($namef . ".menu_module") ?? "";


            $config["name"] = $name;
            $config["route"] = $route;
            $config["route_2"] = $route_2;
            $config["route_1"] = $route_1;
            $config["route_param"] = $route_param;
            $config["permission"] = $permission;
            $config["permission_2"] = $permission_2;
            $config["active_2"] = $active_2;
            $config["active_1"] = $active_1;
            $config["permission_1"] = $permission_1;
            $config["icon"] = $icon;
            $config["name_full"] = $nameFull;
            $config["name_full_2"] = $nameFull_2;
            $config["name_full_1"] = $nameFull_1;
            $config["menu_module"] = $menu_module;

            if( $config["name"] != "Consoles" &&  $config["name"] != "Dashboard" ){
                $tabMenu[] = $config;
            }

        }

       // dd($tabMenu);
        return $tabMenu;
    }
}
if (!function_exists('menusModule')) {
    function menusModule($module)
    {

        if ($module) {
            $menus = Config($module . ".menu_module");
            if ($menus && is_array($menus)) {
                return $menus;
            }
        }
        return [];
    }
}
if (!function_exists('params')) {
    function params()
    {
        $params = [];
        if(request()->id){
            $params["id"]=request()->id;
        }

        if(request()->P){
            $params["P"]=request()->P;
        }

        return $params;

    }
}
if (!function_exists('s_date_diff')) {
    function s_date_diff($debut,$fin)
    {
        if(!$debut or !$fin){
            return '';
        }

        $date_debut = new DateTime($debut);
        $date_fin = new DateTime($fin);


            $interval_prev = $date_debut->diff($date_fin);

       return  $interval_prev->days;


    }
}
if (!function_exists('getDaysInDate')) {
    function getDaysInDate($Days)
    {
        $days = $Days;

        $start_date = new DateTime();
        $end_date = (new $start_date)->add(new DateInterval("P{$days}D") );
        $dd = date_diff($start_date,$end_date);
        return $dd->y." Année.s ".$dd->m." mois ".$dd->d." jour.s";
    }
}
if (!function_exists('months_between_dates')) {
    /**
     * @param $currentIndex
     * @param $organ
     * @param $organ_id
     * @param $module
     * @param $search
     * @param $user_id
     * @return array
     */
    function months_between_dates($startDate, $endDate)
    {

        if($startDate && $endDate){
            $start    = new DateTime($startDate);
            $start->modify('first day of this month');
            $end      = new DateTime($endDate);
            $end->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            $tab = [];
            foreach ($period as $dt) {
                // echo $dt->format("Y-m");
                $obj = new stdClass();
                $obj->m = $dt->format("m");
                $obj->d = $dt->format("d");
                $obj->y = $dt->format("Y");
                $obj->full = $dt->format("Y-m-d");

                $tab[]= $obj;                }
            return $tab;

        }
        return [];
    }


}
if (!function_exists('returnBack')) {

    function returnBack()
    {

return  "<a class=\"btn btn-secondary btn-sm\" href=".url()->previous()."> <i class=\"bx bxs-arrow-from-right\"></i> Retour</a>";
    }


}
if (!function_exists('pictureUser')) {
    function pictureUser($picture,$height=40)
    {
       $height = $height."px";
        $img = "<img style='height: $height' src=\"".getPicturePath($picture)."\" alt=\"\" class=\"img-thumbnail\" />";

        return $img;
    }

}
if (!function_exists('pictureUserSimple')) {
    function pictureUserSimple($picture)
    {

        $img = getAvatar();
        if($picture){
            $img = asset('storage/'.$picture)  ;
        }
        return $img;
    }

}
if (!function_exists('isPassWordChange')) {

    function isPassWordChange(){
       // if( auth()->check() && !auth()->user()->password_change_at){
          //  return redirect()->route('auth.password.change');
       //     return redirect()->route('password.first.change');
      //  }
    }
}
if (!function_exists('sendNotifType')) {
    function sendNotifType($arrayType,$msg,$user_id,$link=null){


        if(!$msg or !$user_id) return null;
        //   dd($user_id);
        $user = UserRapport::FindOrFail($user_id);
        //   $user = User::FindOrFail(1);
        //DB::table("users")->where("id","=",$user_id)->first();
//dd($user);
        if(in_array("sms",$arrayType)){
            if($user){
                $contact = $user->phone;
                //   dd($arrayType,$user->phone);
                // dd($contact,$msg);
                if($contact)  ApiHelper::sms($msg,"225".$contact);
            }
        }
        if(in_array("email_wellcome",$arrayType)){
            //  if($user->email)
            Notification::send($user, new SendWellcomeMail($user));
        }
        if(in_array("email",$arrayType)){
            if($user->email)
                Notification::send($user, new SendAllModelMail($user,$msg,$link));
        }
    }
}
if (!function_exists('saveBase64Image')) {
    function saveBase64Image($picture,$name,$specFolder){
        $image_parts = explode(";base64,",$picture);
        $image_type_aux = explode("image/", $image_parts[0]);
        //  $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName =  $specFolder.$name;

        // dd($fileName, $image_base64);
        $saveImage =  Storage::disk('public')->put($fileName, $image_base64);
        //dd($saveImage);
        //  dd($fileName,$save, $image_base64);
        return $saveImage;
    }

}
if (!function_exists('getConfigs')) {
    function getConfigs(){
        $data["l"]="ppm.png";
        $data["a"]="ppm.png";
        $data["n"]="Entreprise Test";
        $query = DB::table("configs")
            ->whereNotNull("logo")
            ->whereNotNull("name")
            ->first();
        if($query){
            $logo = $query->logo;
            $name = $query->name;
            $data["a"]=$logo;
            $data["n"]=$name;
        }
        return $data;
    }
}
if (!function_exists('getLogo')) {
    function getLogo(){
        $logo = "./storage/".getConfigs()["l"];
        return $logo;
    }
}
if (!function_exists('encodeValue')) {
    function encodeValue($val)
    {


//        ALOGORITHME
//        - 2 premiere valeurs entière
//        - &_
//        - valeur
//        - 1 dernier entier

        $newsValue = "";
        $one = 2;
        $newsValue .="&1/";
        $newsValue .=$val."&=";
        //  $one_digit =  rand(pow(10, $one-1), pow(10, $one)-1);
        //   $newsValue .= $one_digit;

        return base64_encode($newsValue);




    }

}
if (!function_exists('decodeValue')) {
    function decodeValue($val)
    {

        if($val){
            $decodeValue = base64_decode($val);

            $dstripFirstDigit = explode("&1/",$decodeValue)[1];

            $othePart = explode("&=",$dstripFirstDigit)[0];
            //  dd($val,$decodeValue,$dstripFirstDigit,$othePart);
            return $othePart;

        }
        return "";





    }

}
if (!function_exists('checkPermis')) {
    /** Check permissions
     * @return \Illuminate\Http\RedirectResponse|void
     */
    function checkPermis($permissions)
    {
      //  dd(auth()->user()->can($permissions));
        if(auth()->user()->can($permissions)==false){
            return redirect()->route('notauthorized');
        }
    }
}
if (!function_exists('replaceSpecialCharsAndSpaces')) {

    function replaceSpecialCharsAndSpaces($string) {
        // Convertir les accents en équivalents non accentués
        $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);

        // Remplacer les espaces par des underscores
        $string = str_replace(' ', '_', $string);

        // Retirer les caractères non alphanumériques sauf les underscores
        $string = preg_replace('/[^A-Za-z0-9_]/', '', $string);

        // Mettre en majuscule
        return strtoupper($string);
    }
}
if (!function_exists('getOrSaveConfigs')) {

    function getOrSaveConfigs(){
        $check = DB::table("configs")
            //  ->leftJoin("sub_departements","sub_departements.id","=","configs.drh_id")
            //   ->whereNull("sub_departements.deleted_at")
            //   ->orderBy("configs.id")
            ->selectRaw("configs.*")
            ->first();
        if($check) return $check;

        $save = DB::table("configs")
            ->insertGetId(["created_at"=>now(),"created_by"=>auth()->user()->id]);
        $checkNews = DB::table("configs")->orderBy("id")->where("id","=",$save)->first();
        return $checkNews;
    }

}

if (!function_exists('getPays')) {
    function getPays()
    {
        $rs = DB::table("pays")->whereNull("deleted_at")->get();
        return $rs;

    }
}
if (!function_exists('getCategories')) {
    function getCategories($limit=null)
    {
         $query= DB::table("ment_categories")->selectRaw("id,name,description,slug")
         ->orderBy("name");
         if($limit){
             $query->limit($limit);
             }
            $rs = $query->whereNull("deleted_at")->get();
        return $rs;

    }
}
if (!function_exists('getCompetences')) {
    function getCompetences($limit=null)
    {
         $query= DB::table("competences")->selectRaw("id,name,description,slug");
         if($limit){
             $query->limit($limit);
             }
            $rs = $query->whereNull("deleted_at")->get();
        return $rs;

    }
}
if (!function_exists('getDiplomes')) {
    function getDiplomes()
    {
        $rs = DB::table("diplomes")->get();
        return $rs;

    }
}
if (!function_exists('getSituationMaritale')) {
    function getSituationMaritale()
    {
        $rs = DB::table("situation_matrimoniale")->get();
        return $rs;

    }

}
if (!function_exists('getPicturePath')) {
    function getPicturePath($path)
    {
         if($path) return asset('storage/'.$path);
         else  return getAvatar();


    }

}

if (!function_exists('logUserAction')) {
    function  logUserAction($action, Request $request)
    {
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());

       // dd($agent->deviceType());
        Log::channel('user_actions')->info("User", [
            'user_id' => \auth()->check()? Auth::id():null,
            'user_name' =>\auth()->check()? Auth::user()->name:null,
            'user_phone' => \auth()->check()? Auth::user()->phone:null,
            'user_email' =>\auth()->check()? Auth::user()->email:null,
            'ip_address' => $request->ip(),
             'message' =>$action,
         //   'user_agent' => $request->userAgent(),
            'operating_system' => $agent->platform(),   // Nom du système d’exploitation
            'browser' => $agent->browser(),             // Nom du navigateur
            'platform' => $agent->platform(),             // Nom du navigateur
            'device' => $agent->device(),             // Nom du navigateur
            'deviceType' => $agent->deviceType(),             // Nom du navigateur
            'timestamp' => now(),
        ]);
    }

}

if (!function_exists('cryptID')) {
    function cryptID($id)
    {
        if (!$id) return null;

        // Clé secrète pour le chiffrement (doit être de 16, 24 ou 32 caractères)
        $secretKey = env('CLIENT_SECRET_KEY', 'votre_clé_secrète_de_32_caractères');

        // Compression des données
        $compressedId = gzcompress($id, 9);

        // Chiffrement des données compressées
        $encryptedId = openssl_encrypt($compressedId, 'aes-256-cbc', $secretKey, 0, substr(hash('sha256', $secretKey, true), 0, 16));

        // Encodage en Base64
        $encodedId = base64_encode($encryptedId);

        // Limiter à 32 caractères pour la chaîne encodée
        return substr($encodedId, 0, 32);
    }
}

if (!function_exists('deCryptID')) {
    function deCryptID($encodedId)
    {
        if (!$encodedId) return null;

        // Clé secrète pour le décryptage
        $secretKey = env('CLIENT_SECRET_KEY', 'votre_clé_secrète_de_32_caractères');

        // Décoder la chaîne Base64
        $decodedData = base64_decode($encodedId);

        if ($decodedData === false) {
            return null; // Retourner null si le décodage échoue
        }

        // Déchiffrement des données
        $decryptedId = openssl_decrypt($decodedData, 'aes-256-cbc', $secretKey, 0, substr(hash('sha256', $secretKey, true), 0, 16));

        if ($decryptedId === false) {
            return null; // Retourner null si le déchiffrement échoue
        }

        // Décompression des données
        $decompressedId = gzuncompress($decryptedId);

        if ($decompressedId === false) {
            return null; // Retourner null si la décompression échoue
        }

        return (int)$decompressedId; // Retourner l'ID décompressé
    }
}


if (!function_exists('formatMonth')) {
    function formatMonth($month)
    {

        $month = trim($month);

        try {
            // Créer un objet Carbon à partir du mois au format 'Y-m' (ex. 2024-11)
            $formattedDate = Carbon::createFromFormat('m-Y', $month)->startOfMonth()->toDateString();
          //  dd($month,$formattedDate);
            return $formattedDate; // Retourner la date au format 'yyyy-mm-dd'
        } catch (\Exception $e) {
          return null;
        }

    }

}
if (!function_exists('getDefautTheme')) {

    function getDefautTheme(){
        $class = '';
        $rep = \App\Http\Controllers\UtilsController::getCustomTheme();
        //  dd($rep);
        if($rep && isset($rep['type']) && $rep['type'] =='theme'){
            //    dd($rep['type']);
            $class =  $rep['theme'];
        }else{
            if($rep['headercolor']){
                $class .= " color-header ". $rep['headercolor'];
            }
            if($rep['sidebarcolor']){
                $class .= " color-sidebar ". $rep['sidebarcolor'];
            }

        }
        return $class;
    }

}
if (!function_exists('getDefautThemeMenu')) {

    function getDefautThemeMenu(){
        $class = '';
        $rep = \App\Http\Controllers\UtilsController::getCustomTheme();
        if($rep && isset($rep['menu']) && $rep['menu']=='toggled'){
            $class =  $rep['menu'] .' ';
        }
        /* dd($class);*/
        return $class;
    }

}
if (!function_exists('getDefaultLogo')) {

    function getDefaultLogo(){
        return asset('assets/images/logo_full.png');
    }
    if (!function_exists('getRoleListSelect')) {
        function getRoleListSelect()
        {
            $tab= [6];
            // eliminer les rôles
            // le super administrateur voit tout
            // administrateur
            if(auth()->user()->role_id==2){
                $tab=[1,6];
            }
            // si superviseur
            if(auth()->user()->role_id==3){
                $tab=[1,2,6,5];
            }
            $query= DB::table("users");

            if(count($tab)>0){
                $query->whereNotIn("role_id","=",$tab);
            }

            $query->selectRaw("id,name");
            $rs =$query->whereNull("deleted_at")->get();

            return $rs;

        }
    }
    if (!function_exists('getCommunes')) {
        function getCommunes()
        {
            $rs = DB::table("communes")->whereNull("deleted_at")->get();
            return $rs;

        }
    }
    if (!function_exists('getAgences')) {
        function getAgences($id=null)
        {
            $rs = DB::table("agences")->whereNull("deleted_at");
            if($id){
                $rs->where("id","=",$id);
            }
            return $rs->get();

        }
    }

    if (!function_exists('getAvatar')) {
        function getAvatar()
        {
            return asset('manages/assets/images/avatars/1.png');

        }
    }

}

if (!function_exists('getRoles')) {
    function getRoles($role=null)
    {
        $query= DB::table("roles");
        if($role){
            $query->where("id","=",$role);
        }

        $rs =$query->whereNull("deleted_at")->get();

        return $rs;

    }
}
if (!function_exists('getOffres')) {
    function getOffres()
    {
        $query= DB::table("ses_offres");
        $rs =$query->whereNull("deleted_at")->get();

        return $rs;

    }
}
if (!function_exists('getRoleArrays')) {
    function getRoleArrays($type)
    {
        $query= DB::table("roles")
            ->whereIn("id",$type);

        $rs =$query->whereNull("deleted_at")->get();

        return $rs;

    }
}
if (!function_exists('f_TextToHtml')) {
    function f_TextToHtml($text) {
        $parsedown = new Parsedown();
        $html = $parsedown->text($text); // Convertit le Markdown en HTML
        return $html;
    }
}
if (!function_exists('getPays')) {
    function getPays()
    {
        $query= DB::table("pays");

        $rs =$query->whereNull("deleted_at")->get();

        return $rs;

    }
}
if (!function_exists('getYoutubeVideoId')) {
    function getYoutubeVideoId($url) {
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches);
        return $matches[1] ?? null;
    }

}

if (!function_exists('createSlug')) {
    /**
     * Génère un slug unique pour un mentor.
     *
     * @param string $nom
     * @param string $prenom
     * @param string|null $table
     * @param int|null $id
     * @return string
     */
    function createSlug(string $prenom, string $table = 'ment_clients', int $id = null): string
    {
        // Générer un slug de base
        $baseSlug = Str::slug($prenom);
        $slug = $baseSlug;
        $count = 1;

        // Vérifier si le slug existe déjà dans la table
        while (DB::table($table)
            ->where('slug', $slug)
            ->when($id, function ($query, $id) {
                return $query->where('id', '!=', $id); // Exclure l'ID actuel lors de la mise à jour
            })
            ->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

      /*  DB::table($table)->where('id', $id)->update([
            'slug' => $slug,
        ]);*/

        return $slug;
    }
}
if (!function_exists('createSlugMail')) {
    /**
     * Génère un email unique basé sur le prénom.
     *
     * @param string $prenom
     * @param string|null $table
     * @param int|null $id
     * @return string
     */
    if (!function_exists('createSlugMail')) {
        /**
         * Génère un email unique basé sur le prénom.
         *
         * @param string $prenom
         * @param string|null $table
         * @param int|null $id
         * @return string
         */
        function createSlugMail(string $email, string $table = 'ment_clients', int $id = null): string
        {
            // Générer un slug de base
            $baseSlug = Str::slug($email);

            // Vérification si le slug généré est vide
            if (empty($baseSlug)) {
                $baseSlug = 'utilisateur'; // Valeur par défaut si le prénom est invalide
            }

            $slug = $baseSlug;
            $count = 1;

            $emailSuffix = '@mentoralink.com';

            // Vérifier si l'email existe déjà dans la table
            while (DB::table($table)
                ->where('email', $slug . $emailSuffix) // Comparer avec l'email complet
                ->when($id, function ($query, $id) {
                    return $query->where('id', '!=', $id); // Exclure l'ID actuel lors de la mise à jour
                })
                ->exists()) {
                // Ajouter un log pour identifier les conflits
                logger("Conflit détecté pour : " . $slug . $emailSuffix);

                $slug = $baseSlug . '-' . $count;
                $count++;
            }

            // Générer l'email final
            $email = $slug . $emailSuffix;

            dd($slug, $email, "----"); // Débogage
            return $email;
        }

    }

}

if (!function_exists('createSlugPhone')) {
    /**
     * Génère un slug unique pour un mentor.
     *
     * @param string $nom
     * @param string $prenom
     * @param string|null $table
     * @param int|null $id
     * @return string
     */
    function createSlugPhone(string $prenom, string $table = 'ment_clients', int $id = null): string
    {
        // Générer un slug de base
        $baseSlug = Str::slug($prenom);
        $slug = $baseSlug;
        $count = 1;

        // Vérifier si le slug existe déjà dans la table
        while (DB::table($table)
            ->where('phone', $slug)
            ->when($id, function ($query, $id) {
                return $query->where('id', '!=', $id); // Exclure l'ID actuel lors de la mise à jour
            })
            ->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

      /*  DB::table($table)->where('id', $id)->update([
            'slug' => $slug,
        ]);*/

        return $slug;
    }
}
if (!function_exists('removeAccents')) {
    /**
     * Génère un slug unique pour un mentor.
     *
     * @param string $nom
     * @param string $prenom
     * @param string|null $table
     * @param int|null $id
     * @return string
     */
     function removeAccents($string)
    {
        if (!preg_match('/[\x80-\xff]/', $string)) {
            return $string;
        }

        $chars = [
            // Décompositions pour les caractères latins
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE',
            'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I',
            'Î' => 'I', 'Ï' => 'I', 'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
            'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'Ý' => 'Y', 'ß' => 's', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
            'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u',
            'ü' => 'u', 'ý' => 'y', 'ÿ' => 'y', 'Œ' => 'OE', 'œ' => 'oe'
        ];

        return strtr(strtolower($string), $chars);
    }
}
if (!function_exists('getConfigFile')) {
      function getConfigFile()
    {
        $jsonFilePath = storage_path('app/sconf_s.json');

        try {
            // Vérifier si le fichier existe
            if (!file_exists($jsonFilePath)) {
                return []; // Fichier inexistant, retourner tableau vide
            }

            // Lire le contenu du fichier
            $jsonContent = file_get_contents($jsonFilePath);

            // Décoder le JSON en tableau associatif
            $jsonData = json_decode($jsonContent, true);

            // Vérifier que le contenu est bien un tableau
            if (!is_array($jsonData)) {
                return []; // Contenu corrompu ou non JSON
            }

            return $jsonData;

        } catch (\Exception $e) {
            Log::error("Erreur lors de la lecture du fichier JSON : " . $e->getMessage());
            throw new \RuntimeException("Impossible de lire les données du fichier JSON.");
        }
    }

}
