const mqtt = require('mqtt');
//const client = mqtt.connect('mqtt://test.mosquitto.org',{clean:true});
//const client = mqtt.connect('localhost');
const options = {
    //clientId: 'myclient',
    username: 'miralpatel',
    password: 'Test@123##'
  };
const client = mqtt.connect('mqtt://localhost:1883',options);
//const client = mqtt.connect('http://broker.hivemq.com:1883');
// const topic = 'some/topic';
// const topic = 'some/topic1';
const topic = 'some/topic2';
const topicName = 'test/connection' ;
//const topic = 'some/topic';
//const message = 'test message hiii';

client.on('connect', () => {
    console.log(`Is client connected: ${client.connected}`);
    if (client.connected === true) {
       // console.log(`message: ${message}, topic: ${topic}`);
        // publish message
        //client.publish(topic, message);
       // const payload = {1: "Hello miss", 2: "Welcome to the world"} 
        //client.publish(topic, JSON.stringify(payload), {qos: 1, retain: true}) 
      
        //assuming messages comes in every 3 seconds to our server and we need to publish or process these messages 
        // setInterval(() = &gt; 
        // console.log("Message published"), 3000);
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
});

// error handling- register event listeners for the “error” event
client.on('error',(error) => {
    console.error(error);
    process.exit(1); //terminates the application:
});
//----------------------------------

client.on("error", function(err) {
    console.log("Error: " + err)
    if(err.code == "ENOTFOUND") {
        console.log("Network error, make sure you have an active internet connection")
    }
})

client.on("close", function() {
    console.log("Connection closed by client")
})

client.on("reconnect", function() {
    console.log("Client trying a reconnection")
})

client.on("offline", function() {
    console.log("Client is currently offline")
})

//----------------The MQTT CONNECT request consists of the three must-have values: clientID, cleanSession, and keepAlive;
// clientID 		“client-1”
// cleanSession		true
// keepAlive		120
// //or you can use bellow options - this is optional ,if you set addition configuration then use these
// // const options = {
// //    clientId: 'myclient',
// //    Username: 'cedalo',
// //    Password: '0dfTYEF90nAd9kNK8IEr'
         //lastWillTopic		“/tom/will”
         //lastWillQos		2
         //lastWillMessage		“connection disabled”
        // lastWillRetain		false
// // };
// // const client = mqtt.connect('mqtt://test.mosquitto.org', options);



//-----------------------------------------------------------------------------------
// const mqtt = require('mqtt')
// //mqtt://192.168.1.157
// //const client = mqtt.connect('mqtt://192.168.1.146')
// const client = mqtt.connect('mqtt://test.mosquitto.org')
// console.log("start subscriber js");
// //console.log(client);
// client.on('connect', () => {
//    console.log("Connection established successfully!");
//      client.subscribe('some/topic',{qos:1})
//      client.subscribe('some/other/topic',{qos:0})
//      //case sebsitive test
//      client.subscribe('jack/Topic',{qos:0})
//      console.log('subscribed');
// })
//----------------------------------------------------------------------------------
// client.on('connected',function(){
//    client.subscribe('some/topic');
//    console.log('subscribed');
//    console.log('Client publishing.. ');
//    //client.publish('presence', 'Client 1 is alive.. Test Ping! ' + Date());
//  });


