# kafka安装及使用

### 安装

```json
# 安装Java1.8 

# 安装zookeeper
wget http://mirror.bit.edu.cn/apache/zookeeper/zookeeper-3.4.14/zookeeper-3.4.14.tar.gz



# wget http://mirror.bit.edu.cn/apache/kafka/2.3.0/kafka_2.11-2.3.0.tgz
# tar zxvf kafka_2.11-2.3.0.tgz
# cd kafka_2.11-2.3.0/
# 启动Zookeeper服务 bin/zookeeper-server-start.sh -daemon config/zookeeper.properties
# #查看进程  jps
# 创建topic进行测试
# bin/kafka-topics.sh --create --zookeeper localhost:2181 --replication-factor 1 --partitions 1 --topic test
# 查看topic列表
# bin/kafka-topics.sh --list --zookeeper localhost:2181  输出：test
# 生产者消息测试
# bin/kafka-console-producer.sh --broker-list localhost:9092 --topic test 
# 消费者消息测试
# bin/kafka-console-consumer.sh --zookeeper localhost:2181 --topic test --from-beginning
# 单机多broker集群配置
cp config/server.properties config/server-1.properties 
    vim server-1.properties
    #修改：
    broker.id=1
    port=9093
    log.dir=/tmp/kafka-logs-1
    #启动Kafka服务
    bin/kafka-server-start.sh config/server-1.properties &


# 启动Zookeeper服务
bin/zookeeper-server-start.sh -daemon config/zookeeper.properties
# 查看进程
jps
# 启动单机Kafka服务
bin/kafka-server-start.sh config/server.properties
# 查看进程
jps
# 创建topic进行测试
bin/kafka-topics.sh --create --zookeeper localhost:2181 --replication-factor 1 --partitions 1 --topic test
# 查看topic列表
 bin/kafka-topics.sh --list --zookeeper localhost:2181
输出：test
# 生产者消息测试
bin/kafka-console-producer.sh --broker-list localhost:9092 --topic test
# 消费者消息测试
bin/kafka-console-consumer.sh --zookeeper localhost:2181 --topic test --from-beginning
# 单机多broker集群配置
cp config/server.properties config/server-1.properties 
    vim server-1.properties
    #修改：
    broker.id=1
    port=9093
    log.dir=/tmp/kafka-logs-1
    #启动Kafka服务
    bin/kafka-server-start.sh config/server-1.properties &
```

### php 扩展

```json
# 安装librdkafka
git clone https://github.com/edenhill/librdkafka.git
cd librdkafka
./configure
make && make install

# yum install libtool

# rdkafka.so扩展
git clone https://github.com/arnaud-lb/php-rdkafka.git
cd php-rdkafka
/usr/local/php/bin/phpize
./configure --with-php-config=/usr/local/php7.4/bin/php-config 
make all -j 5
make install

vim /etc/php.ini
extension=rdkafka.so
```

### 使用

```json
# composer require  "nmred/kafka-php"
```

