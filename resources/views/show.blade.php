<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div>
            <h3>Messages:</h3>
        </div>
        <div>
            <p id="mqttMessage"></p>
        </div>
    </div>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script type="module">
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({url: "demo_test.txt", success: function(result){
    //         $("#div1").html(result);
    //     }})

    //     $.ajax({
    //      type:'POST',
    //      url:'/ajax',
    //      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //      success:function(data){
    //         $("#msg").html(data.msg);
    //      }
    //   });
</script> --}}
  <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script> 

<script>
    // Initialize a mqtt variable globally

    //const mqtt = require('mqtt');
    //const client = mqtt.connect('mqtt://test.mosquitto.org');//not working
    //const client = mqtt.connect('mqtt://broker.hivemq.com:8000');//not working
    //const client = mqtt.connect('wss://test.mosquitto.org:8081')// working
     const client = mqtt.connect('ws://test.mosquitto.org:8081');//working
    // const options = {
    //     username: 'miralpatel',
    //     password: 'Test@123##'
    // };
    // const client = mqtt.connect('ws://127.0.0.1:1883',options);
    // console.log(client.connect);
    const topic = 'some/topic';

client.on('connect', () => {
    console.log(`Is client connected: ${client.connected}`);    
    if (client.connected === true) {
       // console.log(`message: ${message}, topic: ${topic}`);
        // publish message
       // client.publish(topic, message);
    }

    // subscribe to a topic
    client.subscribe(topic);
    //The hash (#) wildcard can match more than one topic level, but it must be used as the last level.
    //client.subscribe('vc/laravel/#');
    //client.subscribe('vc/bde/#');
    // client.subscribe('vc/qa/#');
    // client.subscribe('vc/#');
    // client.subscribe('vc/laravel/sahil/#');
    //The plus sign (+) wildcard is a single-level wildcard that matches any MQTT topic name within a specified topic level
    //client.subscribe('vc/laravel/+/miral');
   // client.subscribe('vc/laravel/shailesh/+');
});

// receive a message from the subscribed topic
client.on('message',(topic, message) => {
    console.log(`message: ${message}, topic: ${topic}`);
    //mqttMessage
    $("#mqttMessage").append(message+"<br/>");
});

// error handling- register event listeners for the “error” event
client.on('error',(error) => {
    console.error(error);
    process.exit(1); //terminates the application:
});
</script>
</html>
