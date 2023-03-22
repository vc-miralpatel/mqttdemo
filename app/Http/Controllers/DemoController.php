<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;
use Exception;

class DemoController extends Controller
{
    public function test() {
        //dd("kkl;l;l;");
       // $mqtt = MQTT::connection();
       //$mqtt->publish('some/topic', 'Hello World!');
       // MQTT::publish('some/topic', 'Hello World!', true, 'default');

       MQTT::publish('some/topic', 'hellooo',false, 'public');

       //MQTT::publish('topicname', 'message','qos-0/1/2', 'retain-true/false' , 'connection-public/private');


       //MQTT::publish('some/topic', 'Hello World!', true, 'public');
       // dd($k);
     //  MQTT::disconnect();
      // MQTT::publish('some/topic', 'Hello kem cho!');
      // $mqtt = MQTT::connection();
      // $mqtt->publish('some/topic', 'foo', 1);
     //  $mqtt->publish('some/other/topic', 'bar', 2, true); // Retain the message
   // $mqtt->loop(true,true);

        // pcntl_signal(SIGINT, function () use ($mqtt) {
        //     $mqtt->interrupt();
        // });

        // $mqtt = MQTT::connection();
        // $mqtt->subscribe('some/topic', function (string $topic, string $message) {
        //     echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
        // }, 1);
   // $mqtt->loop(true,true);

            //case sensitive test
           // MQTT::publish('jack/topic', 'Hello jack , how are you');
    }

    public function create() 
    {
        return view('create');
    }

    public function store(Request $request)
    {
        //dd($request->message);
        try {
            $message = $request->message;
            MQTT::publish('some/topic', trim($request->message), 'default');
           // MQTT::publish('some/topic', trim($request->message), false , 'public');
            MQTT::publish('vc', 'viitorcloud', false , 'public');
            MQTT::publish('vc/laravel', 'vc-laravel', false , 'public');
            MQTT::publish('vc/bde', 'vc-bde', false , 'public');
            MQTT::publish('vc/qa', 'vc-qa', false , 'public');
           
            MQTT::publish('vc/laravel/sahil/miral', 'vc-11', false , 'public');
            MQTT::publish('vc/laravel/dhaval/dolly', 'vc-12', false , 'public');
            MQTT::publish('vc/laravel/shailesh/miral', 'vc-13', false , 'public');
            MQTT::publish('vc/laravel/haresh/dolly', 'vc-14', false , 'public');
            MQTT::publish('vc/laravel/sahil/dolly', 'vc-11', false , 'public');
            MQTT::publish('vc/laravel/shailesh/vikas', 'vc-131', false , 'public');
            MQTT::publish('vc/laravel/shailesh/mahipal', 'vc-132', false , 'public');
            MQTT::publish('vc/laravel/shailesh/mukund', 'vc-133', false , 'public');

            MQTT::publish('vc/laravel/sahil', 'vc-1122', false , 'public');
            MQTT::publish('vc/laravel/shailesh', 'vc-1322', false , 'public');


            MQTT::publish('vc/bde/maulik', 'vc-AAAA', false , 'public');

            return redirect('create');
        } catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }

    public function show()
    {
        return view('show');
    }

    public function subscribe(){
        $mqtt = MQTT::connection();
        $msg = "";
        //$topic = "some/topic";
      //  $message="hiiiiiiiiiiiiiiii";
        $result=[];
        //dd("helloooooooooo");
        $mqtt->subscribe('some/topic', function (string $topic, string $message) {
            $result['topic'] = $topic;
            $result['message'] = $message;
           //$msg = $message;
        }, 0);
       // dd($result);
        // $mqtt->loop(true,true);
        //     pcntl_signal(SIGINT, function () use ($mqtt) {
        //         $mqtt->interrupt();
        //     });
    }
}
