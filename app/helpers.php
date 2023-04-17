<?php

use App\Currency;
use App\User;
use App\Model\General;
use App\Model\Package;
use App\Model\Related;
use App\Model\Setting;
use App\Model\Destination;
use App\Model\RelatedWiki;
use App\Model\GeneralPackage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

function nameUser($var)
{
    $user = User::find($var);
    if ($user) {
        return $user->name;
    }else{
        return '';
    }
}

function meta()
{
    $settings = Setting::find(1);
    return $settings;
}


function itemRelatedblog($blog_id,$Package_id)
{
    $itemRelatedblog = Related::where('blog_id',$blog_id)->where('Package_id',$Package_id)->count();
    if ($itemRelatedblog) {
        return true;
    } else {
        return false;
    }

}

function itemRelatedwiki($wiki_id,$Package_id)
{
    $itemRelatedwiki = RelatedWiki::where('wiki_id',$wiki_id)->where('Package_id',$Package_id)->count();
    if ($itemRelatedwiki) {
        return true;
    } else {
        return false;
    }

}



function getGeneralPackage($Package_id,$general_id)
{
    $getGeneralPackage = GeneralPackage::where('general_id',$general_id)->where('Package_id',$Package_id)->count();
    if ($getGeneralPackage) {
        return false;
    } else {
        return true;
    }
}


function getNameGeneral($id)
{
    $getGeneralPackage = General::where('id',$id)->first();

    if ($getGeneralPackage) {
        return $getGeneralPackage;
    } else {
        return null;
    }
}

function getPackage_id($id)
{
    $getPackage_id = Package::where('id',$id)->first();

    if (!empty($getPackage_id)) {
        return 'true';
    } else {
        return 'false';
    }
}


function tdestinations($id)
{
    $package = Package::where('id',$id)->first();
    if ($package) {
        $tdestinations = Destination::where('id', $package->destination_id)->firstOrFail();

        if ($tdestinations) {
            return $tdestinations->slug;
        } else {
            $tdestinations = Destination::firstOrFail();
            return $tdestinations->slug;
        }
    }else {
        $tdestinations = Destination::firstOrFail();
        return $tdestinations->slug;
    }

}
  class Helper {
     public static function currency_load() {
          if(session()->has('system_default_currency_info')==false) {
             session()->put('system_default_currency_info', Currency::find(1));
          }
     }

     //currency converter
     public static function currency_converter($amount) {
         return format_price(convert_price($amount));
     }
 }

 //convert price
 if (!function_exists('convert_price')) {
     function convert_price($price) {
         Helper::currency_load();
         $system_default_currency_info=session('system_default_currency_info');
         $price=floatval($price)/floatval($system_default_currency_info->ex_rate);

         if (Session::has('ex_rate')) {
             $exchange=session('ex_rate');
         } else {
             $exchange=$system_default_currency_info->ex_rate;
         }
         $price=floatval($price)* floatval($exchange);
         return $price;
     }
 }

 //currency symbol
 if (!function_exists('currency_symbol')) {
     function currency_symbol(){
         Helper::currency_load();
         if (session()->has('currency_symbol')) {
             $symbol=session('currency_symbol');
         } else {
             $system_default_currency_info=session('system_default_currency_info');
             $symbol=$system_default_currency_info->symbol;
         }
         return $symbol;
     }
 }

 //format price
 if(!function_exists('format_price')) {
     function format_price($price) {
         return currency_symbol() . ' ' . number_format($price, 0);
     }
 }
function exchangeRates(){
    $from_Currency = "USD";
    $to_Currency = "USD";
    $url = "https://memphistours.info/currency_exchange_rates/currency_data/USD";
    $curl = curl_init($url);

    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);

    $rawdata = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
    }else{
        $rates = json_decode($rawdata, true);
        $exRate = $rates['converTo'][$to_Currency];
        return $exRate;
    }
    return false;

}
