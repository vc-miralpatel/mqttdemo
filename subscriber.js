const mqtt = require('mqtt');
const client = mqtt.connect('mqtt://test.mosquitto.org'); 
const topic = 'some/topic';
//const topic = 'some/topic';
//const message = 'test message hiii'; 

client.on('connect', () => {
    console.log(`Is client connected: ${client.connected}`);    
    if (client.connected === true) {
       // console.log(`message: ${message}, topic: ${topic}`); 
        // publish message
        //client.publish(topic, message);
    }

    // subscribe to a topic
    client.subscribe(topic);
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


