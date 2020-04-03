<?php
/**
 * @Notes:
 * @Author: assasin<assasin0308@sina.com>
 * @Date: 2020/4/3 10:39
 */
require 'vendor/autoload.php';
//获取需要处理的partitionId
$partitionId  =  isset($argv[1])  ?  intval($argv[1])  :  0;
$consumer  =  \Kafka\Consumer::getInstance('localhost:2181');
$consumer->setGroup('test-consumer-group');
$consumer->setPartition('testtopic',  $partitionId);
$consumer->setFromOffset(true);
$consumer->setMaxBytes(102400);
while(true){
    $topic  =  $consumer->fetch();
    foreach  ($topic  as  $topicName  =>  $partition)  {
        foreach  ($partition  as  $partId  =>  $messageSet)  {
            foreach  ($messageSet  as  $message)  {
                var_dump($message);
            }
        }
    }
    echo  "consumer sleeping\n";
    sleep(1);
}