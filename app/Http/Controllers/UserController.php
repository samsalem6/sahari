<?php

namespace App\Http\Controllers;

use App\User;
use DateTime;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Mail\SendMailable;
use Jenssegers\Agent\Agent;
use Spatie\Referer\Referer;
use Illuminate\Http\Request;
use App\Mail\PackagesMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('mail','packages','Contact','tailor','AuthRouteAPI');
    }

    public function AuthRouteAPI(Request $request){
        return $request->user();
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    public function mail(Request $request)
    {
        $this->validate(request(),[
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $name = $request->name;
        $email = $request->email;
        $ip = request()->getClientIp();

        $date = Carbon::createFromFormat('d/m/Y', $request->Arrival);
        $daysToAdd = $request->duration;
        $Departure = $date->addDays($daysToAdd);
        $Departure = $Departure->isoFormat('d/m/Y');

        $client = new \GuzzleHttp\Client();
        $genderByName = $client->request('GET', 'https://gender-api.com/get?name='.$name.'&key=FskGXXSvThCBzkMTdd');
        $genderByName = $genderByName->getBody()->getContents();
        $objByName = json_decode($genderByName, true);

        $genderByEmail = $client->request('GET', 'https://gender-api.com/get?email='.$email.'&key=FskGXXSvThCBzkMTdd');
        $genderByEmail = $genderByEmail->getBody()->getContents();
        $objByEmail = json_decode($genderByEmail, true);

        $genderByName = $objByName['gender'];
        $accuracyByName = $objByName['accuracy'];

        $genderByEmail = $objByEmail['gender'];
        $accuracyByEmail = $objByEmail['accuracy'];

        if ($request->children_age) {
            # code...
            $List = implode(', ', $request->children_age);
        }else{
            $List = '0';
        }

        $gender = [
            $genderByName ,
            $accuracyByName ,
            $genderByEmail ,
            $accuracyByEmail,
            ];

        $mailTo = meta()->mailTo;
        $mailBcc = meta()->mailBcc;
        $mailBcc2 = explode(',', $mailBcc);

        $agent = new Agent();

        if ($agent->isDesktop()) {
            $RequestSource = 'Desktop' ;
        }elseif ($agent->isMobile()) {
            $RequestSource = 'Mobile' ;
        }elseif ($agent->isTablet()) {
            $RequestSource = 'Tablet' ;
        } else {
            $RequestSource = 'Desktop' ;
        }

        $geoip = geoip()->getLocation($ip);
        $request->request->add([
            'genderByName' => $genderByName,
            'accuracyByName' => $accuracyByName,
            'genderByEmail' => $genderByEmail,
            'accuracyByEmail' => $accuracyByEmail,
            'ip' => $ip,
            'RequestSource' => $RequestSource,
            'iso_code' => $geoip->iso_code,
            'country' => $geoip->country,
            'city' => $geoip->city,
            'state_name' => $geoip->state_name,
            'DateTime' => Carbon::now(),
            ]);


            $current = date("Y-m-d");
            $urll = \Request::server('HTTP_REFERER');

            $referer = app(Referer::class)->get();

            $data1 = [
                'title'=> "$request->name",
                'name'=> "$request->name",
                'UserEmail' => "$request->email",
                'days' => "",
                'nationality'=> "$request->nationality",
                'UserPhone'=> "$request->countryCode"." - "."$request->whats",
                'arrival'=> "$request->Arrival" ,
                'departure'=> "$Departure",
                'adults'=>"$request->adults",
                'children'=>"$request->children",
                'infants'=>"",
                'children_age'=>"$List",
                'infants_age'=>"",
                'departure_airport'=>"",
                'comment'=>"$request->comment",
                'terms'=>"on",
                'sys_token'=>"",
                'sys_package_id'=>"",
                'url_goal'=>"$request->url_goal",
                'program_id'=>"",
                'initial_price'=>"",
                'url'=> "$urll",
                'ip_address'=> "$ip",
                'date_&_time'=> "$current",
                'source'=> "$request->source",
                'utm_campaign'=>"$request->utm_campaign",
                'utm_term'=> "$request->utm_term",
                'Http Referer'=> "$referer",
                'Request Source'=> "$RequestSource",
                'mail_to'=> "$mailTo",
                'tour_type'=>"$request->tour_type"
            ];

            $client = new Client();
            $url = "https://system.tangramerp.com/mail/ws_create_request_v1";
            $response = $client->post($url,[
                'headers' => [
                    'Content-type' => 'text/plain',
                    'Accept' => 'application/json'
                ],
                
                'json' => [
                    'title'             => "$request->name",
                    'name'              => "$request->name",
                    'UserEmail'         => "$request->email",
                    'days'              => "$request->duration",
                    'nationality'       => "$request->nationality",
                    'UserPhone'         => "$request->countryCode"." - "."$request->whats",
                    'arrival'           => "$request->Arrival",
                    'departure'         => "$Departure ",
                    'adults'            => "$request->adults",
                    'children'          => "$request->children",
                    'infants'           => "",
                    'children_age'      => "$List",
                    'infants_age'       => "",
                    'departure_airport' => "",
                    'comment'           => "$request->comment",
                    'terms'             => "on",
                    'sys_token'         => "",
                    'sys_package_id'    => "",
                    'url_goal'          => "$request->url_goal",
                    'program_id'        => "",
                    'initial_price'     => "",
                    'url'               => "$urll",
                    'ip_address'        => "$ip",
                    'date_&_time'       => "$current",
                    'source'            => "$request->source",
                    'utm_campaign'      => "$request->utm_campaign",
                    'utm_term'          => "$request->utm_term",
                    'Http Referer'      => "$referer",
                    'Request Source'    => "$RequestSource",
                    'mail_to'           => "$mailTo",
                    'tour_type'         => "$request->tour_type"
                ],
            ]);
            
            try {
                Mail::to($mailTo)
                ->bcc($mailBcc2)
                ->send(new PackagesMailable($request));
            } catch (\Throwable $th) {
            }

        return redirect('gracias')->with('name' , $request->name)->with('email' , $request->email);

    }

    public function packages(Request $request)
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $name = $request->name;
        $package = 'packages ';
        $email = $request->email;
        $ip = request()->getClientIp();
        //  $Departure = date('d/m/Y', strtotime($request->Arrival. " + 5 days"));


        $date = Carbon::createFromFormat('d/m/Y', $request->Arrival);
        $daysToAdd = $request->duration;
        $Departure = (isset($request->Departure) ? $request->Departure : $date->addDays($daysToAdd));

        $client = new \GuzzleHttp\Client();
        $genderByName = $client->request('GET', 'https://gender-api.com/get?name='.$name.'&key=FskGXXSvThCBzkMTdd');
        $genderByName = $genderByName->getBody()->getContents();
        $objByName = json_decode($genderByName, true);

        $genderByEmail = $client->request('GET', 'https://gender-api.com/get?email='.$email.'&key=FskGXXSvThCBzkMTdd');
        $genderByEmail = $genderByEmail->getBody()->getContents();
        $objByEmail = json_decode($genderByEmail, true);

        $genderByName = $objByName['gender'];
        $accuracyByName = $objByName['accuracy'];

        $genderByEmail = $objByEmail['gender'];
        $accuracyByEmail = $objByEmail['accuracy'];

        $gender = [
            $genderByName ,
            $accuracyByName ,
            $genderByEmail ,
            $accuracyByEmail,
            ] ;

        $mailTo = meta()->mailTo;
        $mailBcc = meta()->mailBcc;
        $mailBcc2 = explode(',', $mailBcc);

        if ($request->children_age) {
            # code...
            $List = implode(', ', $request->children_age);
        }else{
            $List = '0';
        }

        $agent = new Agent();

        if ($agent->isDesktop()) {
            $RequestSource = 'Desktop' ;
        }elseif ($agent->isMobile()) {
            $RequestSource = 'Mobile' ;
        }elseif ($agent->isTablet()) {
            $RequestSource = 'Tablet' ;
        } else {
            $RequestSource = 'Desktop' ;
        }

        // dd($request);

        $geoip = geoip()->getLocation($ip);
        $request->request->add([
            'name' => $name,
            'package' => $package,
            'genderByName' => $genderByName,
            'accuracyByName' => $accuracyByName,
            'genderByEmail' => $genderByEmail,
            'accuracyByEmail' => $accuracyByEmail,
            'ip' => $ip,
            'RequestSource' => $RequestSource,
            'iso_code' => $geoip->iso_code,
            'country' => $geoip->country,
            'city' => $geoip->city,
            'state_name' => $geoip->state_name,
            'DateTime' => Carbon::now(),
            ]);


            $current = date("Y-m-d h:i:sa");
            $urll = \Request::server('HTTP_REFERER');

            $referer = app(Referer::class)->get();
            

            $data1 = [
                'title'             => "$request->name",
                'name'              => "$request->name",
                'UserEmail'         => "$request->email",
                'days'              => "",
                'nationality'       => "$request->nationality",
                'UserPhone'         => "$request->countryCode"." - "."$request->whats",
                'arrival'           => "$request->Arrival",
                'departure'         => "$Departure",
                'adults'            => "$request->adults",
                'children'          => "$request->children",
                'infants'           => "",
                'children_age'      => "$List",
                'infants_age'       => "",
                'InternationalFlight'=> "$request->InternationalFlight",
                'departure_airport' => "$request->departure_airport",
                'comment'           => "$request->comment",
                'terms'             => "on",
                'sys_token'         => "",
                'sys_package_id'    => "",
                'url_goal'          => "$request->url_goal",
                'program_id'        => "",
                'initial_price'     => "",
                'url'               => "$urll",
                'ip_address'        => "$ip",
                'date_&_time'       => "$current",
                'source'            => "$request->source",
                'utm_campaign'      => "$request->utm_campaign",
                'utm_term'          => "$request->utm_term",
                'Http Referer'      => "$referer",
                'Request Source'    => "$RequestSource",
                'mail_to'           => "$mailTo",
                'tour_type'         => "$request->tour_type"
            ];
            
            $client = new Client();
            $url = "https://system.tangramerp.com/mail/ws_create_request_v1";
            $response = $client->post($url,[
                'headers' => [
                    'Content-type' => 'text/plain',
                    'Accept' => 'application/json'
                ],
                
                'json' => [
                    'title'             => "$request->name",
                    'name'              => "$request->name",
                    'UserEmail'         => "$request->email",
                    'days'              => "",
                    'nationality'       => "$request->nationality",
                    'UserPhone'         => "$request->countryCode"." - "."$request->whats",
                    'arrival'           => "$request->Arrival",
                    'departure'         => "$Departure ",
                    'adults'            => "$request->adults",
                    'children'          => "$request->children",
                    'infants'           => "",
                    'children_age'      => "$List",
                    'infants_age'       => "",
                    'InternationalFlight'=> "$request->InternationalFlight",
                    'departure_airport' => "$request->departure_airport",
                    'comment'           => "$request->comment",
                    'terms'             => "on",
                    'sys_token'         => "",
                    'sys_package_id'    => "",
                    'url_goal'          => "$request->url_goal",
                    'program_id'        => "",
                    'initial_price'     => "",
                    'url'               => "$urll",
                    'ip_address'        => "$ip",
                    'date_&_time'       => "$current",
                    'source'            => "$request->source",
                    'utm_campaign'      => "$request->utm_campaign",
                    'utm_term'          => "$request->utm_term",
                    'Http Referer'      => "$referer",
                    'Request Source'    => "$RequestSource",
                    'mail_to'           => "$mailTo",
                    'tour_type'         => "$request->tour_type"
                ],
            ]);
            
            try {
                Mail::to($mailTo)
                ->bcc($mailBcc2)
                // ->from($request->email)
                ->send(new PackagesMailable($request));
            } catch (\Throwable $th) {
            }


            return redirect('gracias')->with('name' , $request->name)->with('email' , $request->email);
 
    }

    public function Contact(Request $request)
    {
        $this->validate(request(),[
            'name_contact'=>'required',
            'lastname_contact'=>'required',
            'comment'=>'required',
            'email'=>'required|email',
            'whats'=>'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $name = $request->name_contact . ' ' .$request->lastname_contact;
        $package = 'Contact us';
        $email = $request->email;
        $ip = request()->getClientIp();

        if ($request->children_age) {
            # code...
            $List = implode(', ', $request->children_age);
        }else{
            $List = '0';
        }

        $client = new \GuzzleHttp\Client();
        $genderByName = $client->request('GET', 'https://gender-api.com/get?name='.$name.'&key=FskGXXSvThCBzkMTdd');
        $genderByName = $genderByName->getBody()->getContents();
        $objByName = json_decode($genderByName, true);

        $genderByEmail = $client->request('GET', 'https://gender-api.com/get?email='.$email.'&key=FskGXXSvThCBzkMTdd');
        $genderByEmail = $genderByEmail->getBody()->getContents();
        $objByEmail = json_decode($genderByEmail, true);

        $genderByName = $objByName['gender'];
        $accuracyByName = $objByName['accuracy'];

        $genderByEmail = $objByEmail['gender'];
        $accuracyByEmail = $objByEmail['accuracy'];

        $gender = [
            $genderByName ,
            $accuracyByName ,
            $genderByEmail ,
            $accuracyByEmail,
            ] ;

        $mailTo = meta()->mailTo;
        $mailBcc = meta()->mailBcc;
        $mailBcc2 = explode(',', $mailBcc);

        $agent = new Agent();

        if ($agent->isDesktop()) {
            $RequestSource = 'Desktop' ;
        }elseif ($agent->isMobile()) {
            $RequestSource = 'Mobile' ;
        }elseif ($agent->isTablet()) {
            $RequestSource = 'Tablet' ;
        } else {
            $RequestSource = 'Desktop' ;
        }

        $geoip = geoip()->getLocation($ip);
        $request->request->add([
            'name'            => $name,
            'package'         => $package,
            'genderByName'    => $genderByName,
            'accuracyByName'  => $accuracyByName,
            'genderByEmail'   => $genderByEmail,
            'accuracyByEmail' => $accuracyByEmail,
            'ip'              => $ip,
            'RequestSource'   => $RequestSource,
            'iso_code'        => $geoip->iso_code,
            'country'         => $geoip->country,
            'city'            => $geoip->city,
            'state_name'      => $geoip->state_name,
            'DateTime'        => Carbon::now(),
            ]);

            $current = date("Y-m-d h:i:sa");
            $urll = \Request::server('HTTP_REFERER');
            $referer = app(Referer::class)->get();

            $data1 = [
                'title'             => "$request->name",
                'name'              => "$request->name",
                'UserEmail'         => "$request->email",
                'days'              => "",
                'nationality'       => "$request->nationality",
                'UserPhone'         => "$request->countryCode"." - "."$request->whats",
                'arrival'           => "$request->Arrival",
                'departure'         => "$request->Departure ",
                'adults'            => "$request->adults",
                'children'          => "$request->children",
                'infants'           => "",
                'children_age'      => "$List",
                'infants_age'       => "",
                'departure_airport' => "",
                'comment'           => "$request->comment",
                'terms'             => "on",
                'sys_token'         => "",
                'sys_package_id'    => "",
                'url_goal'          => "$request->url_goal",
                'program_id'        => "",
                'initial_price'     => "",
                'url'               => "$urll",
                'ip_address'        => "$ip",
                'date_&_time'       => "$current",
                'source'            => "$request->source",
                'utm_campaign'      => "$request->utm_campaign",
                'utm_term'          => "$request->utm_term",
                'Http Referer'      => "$referer",
                'Request Source'    => "$RequestSource",
                'mail_to'           => "$mailTo",
                'tour_type'         => "$request->tour_type"
            ];

            $client = new Client();
            $url = "https://system.tangramerp.com/mail/ws_create_request_v1";
            $response = $client->post($url,[
                'headers' => [
                    'Content-type' => 'text/plain',
                    'Accept' => 'application/json'
                ],
                
                'json' => [
                    'title'             => "$request->name",
                    'name'              => "$request->name",
                    'UserEmail'         => "$request->email",
                    'days'              => "",
                    'nationality'       => "$request->nationality",
                    'UserPhone'         => "$request->countryCode"." - "."$request->whats",
                    'arrival'           => "$request->Arrival",
                    'departure'         => "$request->Departure ",
                    'adults'            => "$request->adults",
                    'children'          => "$request->children",
                    'infants'           => "",
                    'children_age'      => "$List",
                    'infants_age'       => "",
                    'departure_airport' => "",
                    'comment'           => "$request->comment",
                    'terms'             => "on",
                    'sys_token'         => "",
                    'sys_package_id'    => "",
                    'url_goal'          => "$request->url_goal",
                    'program_id'        => "",
                    'initial_price'     => "",
                    'url'               => "$urll",
                    'ip_address'        => "$ip",
                    'date_&_time'       => "$current",
                    'source'            => "$request->source",
                    'utm_campaign'      => "$request->utm_campaing",
                    'utm_term'          => "$request->utm_term",
                    'Http Referer'      => "$referer",
                    'Request Source'    => "$RequestSource",
                    'mail_to'           => "$mailTo",
                    'tour_type'         => "$request->tour_type"
                ],
            ]);
          

        try {
            Mail::to($mailTo)
            ->bcc($mailBcc2)
                ->send(new PackagesMailable($request));
            } catch (\Throwable $th) {
            }

            return redirect('gracias')->with('name' , $request->name)->with('email' , $request->email);

    }


    public function tailor(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required',
            'comment'=>'required',
            'countryCode'=>'required',
            'whats'=>'required',
            // 'Arrival'=>'required',
            // 'Departure'=>'required',
            'adults'=>'required',
            'children'=>'required',
            // 'budget'=>'required',
            // 'TourType'=>'required',
            'email'=>'required|email',
            'whats'=>'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $name = $request->name;
        $package = 'Tailor Make';
        $email = $request->email;
        $ip = request()->getClientIp();

        if ($request->children_age) {
            # code...
            $List = implode(', ', $request->children_age);
        }else{
            $List = '0';
        }

        $client = new \GuzzleHttp\Client();
        $genderByName = $client->request('GET', 'https://gender-api.com/get?name='.$name.'&key=FskGXXSvThCBzkMTdd');
        $genderByName = $genderByName->getBody()->getContents();
        $objByName = json_decode($genderByName, true);

        $genderByEmail = $client->request('GET', 'https://gender-api.com/get?email='.$email.'&key=FskGXXSvThCBzkMTdd');
        $genderByEmail = $genderByEmail->getBody()->getContents();
        $objByEmail = json_decode($genderByEmail, true);

        $genderByName = $objByName['gender'];
        $accuracyByName = $objByName['accuracy'];

        $genderByEmail = $objByEmail['gender'];
        $accuracyByEmail = $objByEmail['accuracy'];

        $gender = [
            $genderByName ,
            $accuracyByName ,
            $genderByEmail ,
            $accuracyByEmail,
            ] ;

        $mailTo = meta()->mailTo;
        $mailBcc = meta()->mailBcc;
        $mailBcc2 = explode(',', $mailBcc);

        $agent = new Agent();

        if ($agent->isDesktop()) {
            $RequestSource = 'Desktop' ;
        }elseif ($agent->isMobile()) {
            $RequestSource = 'Mobile' ;
        }elseif ($agent->isTablet()) {
            $RequestSource = 'Tablet' ;
        } else {
            $RequestSource = 'Desktop' ;
        }

        $geoip = geoip()->getLocation($ip);
        $urll = \Request::server('HTTP_REFERER');

        $referer = app(Referer::class)->get();

        

        $request->request->add([
            'name' => $name,
            'package' => $package,
            'genderByName' => $genderByName,
            'accuracyByName' => $accuracyByName,
            'genderByEmail' => $genderByEmail,
            'accuracyByEmail' => $accuracyByEmail,
            'ip' => $ip,
            'RequestSource' => $RequestSource,
            'iso_code' => $geoip->iso_code,
            'country' => $geoip->country,
            'city' => $geoip->city,
            'state_name' => $geoip->state_name,
            'DateTime' => Carbon::now(),
            ]);

            $current = date("Y-m-d h:i:sa");

            $data1 = [
                'title'             => "$request->name",
                'name'              => "$request->name",
                'UserEmail'         => "$request->email",
                'days'              => "",
                'nationality'       => "$request->nationality",
                'destination'       => "$request->destination",
                'UserPhone'         => "$request->countryCode"." - "."$request->whats",
                'arrival'           => "$request->Arrival",
                'departure'         => "$request->Departure ",
                'adults'            => "$request->adults",
                'children'          => "$request->children",
                'infants'           => "",
                'children_age'      => "$List",
                'infants_age'       => "",
                'InternationalFlight'=> "$request->InternationalFlight",
                'departure_airport' => "$request->departure_airport",
                'comment'           => "$request->comment",
                'terms'             => "on",
                'sys_token'         => "",
                'sys_package_id'    => "",
                'url_goal'          => "$request->url_goal",
                'program_id'        => "",
                'initial_price'     => "",
                'url'               => "$urll",
                'ip_address'        => "$ip",
                'date_&_time'       => "$current",
                'source'            => "$request->source",
                'utm_campaign'      => "$request->utm_campaign",
                'utm_term'          => "$request->utm_term",
                'Http Referer'      => "$referer",
                'Request Source'    => "$RequestSource",
                'mail_to'           => "$mailTo",
                'tour_type'         => "$request->tour_type"
            ];

            $client = new Client();
            $url = "https://system.tangramerp.com/mail/ws_create_request_v1";
            $response = $client->post($url,[
                'headers' => [
                    'Content-type' => 'text/plain',
                    'Accept' => 'application/json'
                ],
                
                'json' => [
                    'title'             => "$request->name",
                    'name'              => "$request->name",
                    'UserEmail'         => "$request->email",
                    'days'              => "",
                    'nationality'       => "$request->nationality",
                    'destination'       => "$request->destination",
                    'UserPhone'         => "$request->countryCode"." - "."$request->whats",
                    'arrival'           => "$request->Arrival",
                    'departure'         => "$request->Departure ",
                    'adults'            => "$request->adults",
                    'children'          => "$request->children",
                    'infants'           => "",
                    'children_age'      => "$List",
                    'infants_age'       => "",
                    'InternationalFlight'=> "$request->InternationalFlight",
                    'departure_airport' => "$request->departure_airport",
                    'comment'           => "$request->comment",
                    'terms'             => "on",
                    'sys_token'         => "",
                    'sys_package_id'    => "",
                    'url_goal'          => "$request->url_goal",
                    'program_id'        => "",
                    'initial_price'     => "",
                    'url'               => "$urll",
                    'ip_address'        => "$ip",
                    'date_&_time'       => "$current",
                    'source'            => "$request->source",
                    'utm_campaign'      => "$request->utm_campaign",
                    'utm_term'          => "$request->utm_term",
                    'Http Referer'      => "$referer",
                    'Request Source'    => "$RequestSource",
                    'mail_to'           => "$mailTo",
                    'tour_type'         => "$request->tour_type"
                ],
            ]);

        try {
            Mail::to($mailTo)
            ->bcc($mailBcc2)
                ->send(new PackagesMailable($request));
            } catch (\Throwable $th) {
            }

            return redirect('gracias')->with('name' , $request->name)->with('email' , $request->email);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
