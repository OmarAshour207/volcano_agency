<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\HotelOffer;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessengerController extends Controller
{
    public function index()
    {
        // here we can verify the webhook.
    	// i create a method for that.
    	$this->verifyAccess();

    	$input   = json_decode(file_get_contents('php://input'), true);

    	$id 	 = $input['entry'][0]['messaging'][0]['sender']['id'];
    	$message = '';

        if (isset($input['entry'][0]['messaging'][0]['postback']['payload'])) {
            $message = $input['entry'][0]['messaging'][0]['postback']['payload'];
        } else {
            $message = $input['entry'][0]['messaging'][0]['message']['text'];
        }
        $user    = json_decode($this->getUser($id));

        $lang = Cache::get('lang', 'ar');

        if($message == 'Main Menu' || $message == 'القائمه الرئيسيه') {
            $response = $this->main_menu($id, $user);
        } elseif ($message == 'ar' || $message == 'en') {
            $response = $this->switchLang($id, $message, $user);
        } elseif ($message == 'Trips' || $message == 'الرحلات'){
            $response = $this->showTrips($id);
        } elseif ($message == 'Flights' || $message == 'الطيران') {
            $response = $this->showFlights($id);
        } elseif ($message == 'Hotels' || $message == 'الفنادق') {
            $response = $this->showHotels($id);
        } elseif($message == 'visit-website' || $message == 'زياره الموقع') {
            $response = $this->visitWebsite($id);
        } else {
            $response = $this->main_menu($id, $user);
        }


    	$this->sendMessage($response);
    }

    public function test()
    {
        $lang = Cache::get('lang', 'ar');

        $trips = Trip::orderBy('id', 'desc')->limit(6)->get()->toArray();
        $temp = [];
        for ($i = 0; $i < count($trips);$i++) {
            array_push($temp,
                [
                    'title' => $trips[$i][$lang . '_title'],
                    'subtitle' => strip_tags($trips[$i][$lang . '_description']),
                    "image_url" => $trips[$i]['image'],
                    'default_action' => [
                        "type" => "web_url",
                        "url" => "https://91a105edf6b8.ngrok.io/",
                        "webview_height_ratio" => "tall"
                    ],
                    'buttons' => [
                        [
                            "type" => "postback",
                            "payload" => $trips[$i][$lang . '_start'] .' - ' . $trips[$i][$lang . '_destination'],
                            "title" => __('bot.' . $lang . '.destination'),
                        ], [
                            "type" => "web_url",
                            "url" => url("trips/{$trips[$i]['id']}/{$trips[$i][$lang . '_title']}"),
                            "title" => __('bot.' . $lang . '.show_trip'),
                        ], [
                            "type" => "postback",
                            "payload" => __('bot.'. $lang .'.main_menu'),
                            "title" => __('bot.' . $lang . '.main_menu'),
                        ]
                    ]
                ]);
        }
        dd($temp);
    }
    protected function getUser($id = null)
    {
        $url = "https://graph.facebook.com/v8.0/{$id}?fields=first_name,last_name,profile_pic&access_token=" . setting('facebook_token');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $user = curl_exec($ch);
        curl_close($ch);

        return $user;
    }

    public function main_menu($id, $user)
    {
        $lang = Cache::get('lang', 'ar');

        return [
            'recipient' => ['id' => $id ],
            'messaging_type' => 'RESPONSE',
            'message'  => [
                'text' => "Welcome",
                'quick_replies' => [
                    [
                        "content_type" => "text",
                        "title" => __('bot.'. $lang .'.hotels'),
                        "payload" => "http://monraytravel.com/appointments"
                    ], [
                        "content_type" => "text",
                        "title" => __('bot.'. $lang .'.flights'),
                        "payload" => "http://monraytravel.com/appointments"
                    ], [
                        "content_type" => "text",
                        "title" => __('bot.'. $lang .'.trips'),
                        "payload" => "http://monraytravel.com/appointments"
                    ], [
                        "content_type" => "text",
                        "title" => 'ar',
                        "payload" => "http://monraytravel.com/appointments"
                    ], [
                        "content_type" => "text",
                        "title" => 'en',
                        "payload" => "http://monraytravel.com/appointments"
                    ], [
                        "content_type" => "text",
                        "title" => __('bot.'. $lang .'.visit_website'),
                        "payload" => "http://monraytravel.com/appointments"
                    ], [
                        "content_type" => "text",
                        "title" => __('admin.contact_us'),
                        "payload" => "http://monraytravel.com/appointments"
                    ]
                ]
            ]
        ];

    }

    public function switchLang($id, $message, $user)
    {
        Cache::put('lang', $message, Carbon::tomorrow());

        return $this->main_menu($id, $user);
    }

    public function showFlights($id)
    {
        $lang = Cache::get('lang', 'ar');

        $flights = Flight::orderBy('id', 'desc')->limit(6)->get()->toArray();
        $temp = [];
        for ($i = 0; $i < count($flights);$i++) {
            array_push($temp,
                [
                    'title' => $flights[$i][$lang . '_start'],
                    'subtitle' => $flights[$i][$lang . '_start'] . ' - ' . $flights[$i][$lang . '_destination'],
                    "image_url" => $flights[$i]['image'],
                    'default_action' => [
                        "type" => "web_url",
                        "url" => "https://91a105edf6b8.ngrok.io/",
                        "webview_height_ratio" => "tall"
                    ],
                    'buttons' => [
                        [
                            "type" => "web_url",
                            "url" => url("flights/{$flights[$i]['id']}"),
                            "title" => __('bot.' . $lang . '.show_flight'),
                        ], [
                            "type" => "postback",
                            "payload" => __('bot.main_menu'),
                            "title" => __('bot.' . $lang . '.main_menu'),
                        ]
                    ]
                ]);
        }
        return [
            'recipient' => ['id' => $id ],
            'message'  => [
                'attachment' => [
                    'type'  => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements'  => $temp
                    ]
                ]
            ]
        ];
    }

    public function showTrips($id)
    {
        $lang = Cache::get('lang', 'ar');

        $trips = Trip::orderBy('id', 'desc')->limit(6)->get()->toArray();
        $temp = [];
        for ($i = 0; $i < count($trips);$i++) {
            array_push($temp,
                [
                    'title' => $trips[$i][$lang . '_title'],
                    'subtitle' => strip_tags($trips[$i][$lang . '_description']),
                    "image_url" => $trips[$i]['image'],
                    'default_action' => [
                        "type" => "web_url",
                        "url" => "https://91a105edf6b8.ngrok.io/",
                        "webview_height_ratio" => "tall"
                    ],
                    'buttons' => [
                        [
                            "type" => "postback",
                            "payload" => $trips[$i][$lang . '_start'] .' - ' . $trips[$i][$lang . '_destination'],
                            "title" => __('bot.' . $lang . '.destination'),
                        ], [
                            "type" => "web_url",
                            "url" => url("trips/{$trips[$i]['id']}/{$trips[$i][$lang . '_title']}"),
                            "title" => __('bot.' . $lang . '.show_trip'),
                        ], [
                            "type" => "postback",
                            "payload" => __('bot.'. $lang .'.main_menu'),
                            "title" => __('bot.' . $lang . '.main_menu'),
                        ]
                    ]
                ]);
        }
        return [
            'recipient' => ['id' => $id ],
            'message'  => [
                'attachment' => [
                    'type'  => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements'  => $temp
                    ]
                ]
            ]
        ];
    }

    public function showHotels($id)
    {
        $lang = Cache::get('lang', 'ar');
        $offers = HotelOffer::with('hotel')->orderBy('id', 'desc')->limit(6)->get()->toArray();
        $temp = [];
        for ($i = 0; $i < count($offers);$i++) {
            array_push($temp,
                [
                    'title' => $offers[$i]['hotel'][$lang . '_name'],
                    'subtitle' => $offers[$i]['hotel'][$lang . '_description'] .' - '. $offers[$i]['price'],
                    "image_url" => $offers[$i]['hotel']['image'],
                    'default_action' => [
                        "type" => "web_url",
                        "url" => "https://91a105edf6b8.ngrok.io/",
                        "webview_height_ratio" => "tall"
                    ],
                    'buttons' => [
                        [
                            "type" => "web_url",
                            "url" => url("offer/{$offers[$i]['id']}"),
                            "title" => __('bot.' . $lang . '.show_offer'),
                        ], [
                            "type" => "postback",
                            "payload" => __('bot.main_menu'),
                            "title" => __('bot.' . $lang . '.main_menu'),
                        ]
                    ]
                ]);
        }
        return [
            'recipient' => ['id' => $id ],
            'message'  => [
                'attachment' => [
                    'type'  => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements'  => $temp
                    ]
                ]
            ]
        ];
    }

    public function visitWebsite($id)
    {
        return [
            'recipient' => ['id' => $id ],
            'message'  => [
                'attachment' => [
                    'type'  => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'elements'  => [
                            [
                                'title'     => 'Welcome',
                                'image_url' => 'https://petersfancybrownhats.com/company_image.png',
                                'subtitle'  => 'Hello for everyone',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url'   => 'http://monraytravel.com',
                                    'webview_height_ratio'  => 'tall'
                                ], 'buttons'    => [
                                    [
                                    'type'  => 'web_url',
                                    'url'   => 'http://monraytravel.com',
                                    'title' => 'visit-website'
                                    ],
                                    [
                                    'type'  => 'postback',
                                    'payload'   => 'main_menu',
                                    'title' => 'Main Menu'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }

    protected function sendMessage($response)
    {
    	// set our post
    	$ch = curl_init('https://graph.facebook.com/v8.0/me/messages?access_token=' . setting('facebook_token'));
    	curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
    	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    	curl_exec($ch);
    	curl_close($ch);
    }

    protected function verifyAccess()
    {
    	// FACEBOOK_MESSENGER_WEBHOOK_TOKEN is not exist yet.
    	// we can set that up in our .env file
        $localToken = env('FACEBOOK_MESSENGER_WEBHOOK_TOKEN');
        $hubVerifyToken = request('hub_verify_token');

    	// condition if our local token is equal to hub_verify_token
    	if ($hubVerifyToken === $localToken) {
    		// echo the hub_challenge in able to verify.
    		echo request('hub_challenge');
    		exit;
    	}
    }

}
