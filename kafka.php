<?php
/**
 * @Notes:
 * @Author: assasin<assasin0308@sina.com>
 * @Date: 2020/4/3 10:57
 */


class Kafka
{
    public $broker_list = '0.0.0.0:9092';
    public $topic = 'test';
    public $partition = 0;
    protected $producer = null;
    protected $consumer = null;

    public function __construct()
    {
        if($this->broker_list){

        }

        $rk = new \RdKafka\Producer();
        if(empty($rk)){
            throw new \Exception('producer error');
        }
        $rk->setLogLevel(LOG_DEBUG);
        if(!$rk->addBrokers($this->broker_list)){
            throw new \Exception('addBrokers error');
        }
        $this->producer = $rk;
    }

    public function sendMessage($array_message = [])
    {
        $topic = $this->producer->newTopic($this->topic);
        return $topic->produce(RD_KAFKA_PARTITION_UA, $this->partition, json_encode($array_message));
    }

}

//在controller中调用该方法
//public function testKafkaProducer(){
//    $kafuka = new Kafka();
//    $kafuka->sendMessage(['cei shi  aaa']);
//}