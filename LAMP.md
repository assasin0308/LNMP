Linux命令

### 第三方库

```
yum -y install epel-release libxml2 libxml2-devel  openssl  openssl-devel  curl  curl-devel  libjpeg  libjpeg-devel  libpng  libpng-devel  freetype  freetype-devel  pcre  pcre-devel  libxslt  libxslt-devel  bzip2  bzip2-devel net-tools vim lrzsz tree screen lsof tcpdump nc mtr nmap
```

```json
# 编译失败解决方法集合  https://www.24kplus.com/linux/400.html
yum install -y libxml2 libxml2-dev libxslt-devel  gd-devel  GeoIP GeoIP-devel GeoIP-data g oniguruma oniguruma-develperftools libuuid-devel libblkid-devel libudev-devel fuse-devel libedit-devel libatomic_ops-devel gcc-c++ gcc+ gcc trousers-devel gettext gettext-devel gettext-common-devel openssl-devel libffi-devel bzip2  bzip2 bzip2-devel
curl-devel ImageMagick-devel libicu-devel sqlite-devel oniguruma oniguruma-devel

openssl openssl-devel ln -s /usr/lib64/libssl.so /usr/lib/


apt install  libtalloc-dev  libboost-all-dev git-core doxygen  build-essential libgl1-mesa-dev cmake libgoogle-glog-dev libatlas-base-dev   libeigen3-dev libsuitesparse-dev build-essential cmake pkg-config aptitude libcurl4-openssl-dev  protobuf-compiler libprotobuf-dev 

```

### 安装python虚拟环境
```
pip install virtualenv virtualenvwrapper  
vim ~/.bashrc
export WORKON_HOME=$HOME/.virtualenvs
export VIRTUALENVWRAPPER_PYTHON=/usr/local/python3/bin/python3
# 指定virtualenv的路径
export VIRTUALENVWRAPPER_VIRTUALENV=/usr/local/python3/bin/virtualenv
source /usr/local/python3/bin/virtualenvwrapper.sh

```



### 查看系统版本

```
命令1: cat /etc/redhat-release
命令2: lsb_release -a  
```

### yum 安装httpd

```
命令：yum install httpd
启动：systemctl restart httpd
```

###yum安装mysql(mariadb)

```
1、清除老版本
rpm -qa mariadb-libs
yum remove mariadb-libs
```

 ```
2、配置仓库
cat /etc/yum.repos.d/Mariadb.repo
内容：
# MariaDB 10.1 CentOS repository list - created 2017-02-23 08:53 UTC
# http://downloads.mariadb.org/mariadb/repositories/
[mariadb]
name = MariaDB
baseurl = http://yum.mariadb.org/10.2/centos7-amd64
gpgkey=https://yum.mariadb.org/RPM-GPG-KEY-MariaDB
gpgcheck=1
 ```

```json
3、使用yum安装
# yum install mariadb-server mariadb-devel 或者 yum -y install MariaDB-server MariaDB-client
# systemctl start mariadb #启动服务
# systemctl enable mariadb #设置开机启动
4 进行MariaDB的相关简单配置,使用mysql_secure_installation命令进行配置
首先是设置密码，会提示先输入密码
Enter current password for root (enter for none):<–初次运行直接回车
设置密码:
Set root password? [Y/n] <– 是否设置root用户密码，输入y并回车或直接回车
New password: <– 设置root用户的密码
Re-enter new password: <– 再输入一次你设置的密码
其他配置:
Remove anonymous users? [Y/n] <– 是否删除匿名用户，回车 y
Disallow root login remotely? [Y/n] <–是否禁止root远程登录,回车, n
Remove test database and access to it? [Y/n] <– 是否删除test数据库，回车 y 
Reload privilege tables now? [Y/n] <– 是否重新加载权限表，回车 y
5. 添加用户，设置权限
创建用户命令
mysql>create user username@localhost identified by 'password';
直接创建用户并授权的命令
mysql>grant all on *.* to username@localhost indentified by 'password';
授予外网登陆权限 
mysql>grant all privileges on *.* to username@'%' identified by 'password';
授予权限并且可以授权
mysql>grant all privileges on *.* to username@'hostname' identified by 'password' with grant option;
FLUSH PRIVILEGES;

```



### yum安装php7

```json
1、更新yum源
# rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
# rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
```

```json
2、卸载之前安装
# yum -y remove php*
```

```json
3、安装php72w和各种扩展
# yum -y install php72w
```

```json
默认扩展
#yum install -y php72w-common  php72w-opcache php72w-gd  php72w-mbstring php72w-pecl-redis php72w-pecl-memcached php72w-devel php72w-cli  php72w-dba  php72w-embedded php72w-enchant  php72w-fpm  php72w-imap  php72w-interbase php72w-intl php72w-ldap  php72w-mcrypt  php72w-odbc php72w-mysql php72w-mysql php72w-pdo php72w-pdo_dblib php72w-pear  php72w-pecl-apcu php72w-pecl-imagick php72w-pecl-mongodb php72w-pecl-xdebug php72w-pgsql php72w-phpdbg  php72w-process  php72w-pspell php72w-recode php72w-snmp php72w-soap  php72w-tidy  php72w-xml  php72w-xmlrpc


# yum install php72w-common php72w-fpm php72w-opcache php72w-gd php72w-mysqlnd php72w-mbstring php72w-pecl-redis php72w-pecl-memcached php72w-devel php72w-cli php72w-common php72w-dba php72w-devel php72w-embedded php72w-enchant  php72w-fpm php72w-gd php72w-imap  php72w-interbase php72w-intl php72w-ldap php72w-mbstring php72w-mcrypt  php72w-odbc php72w-mysql php72w-mysqlnd php72w-opcache php72w-pdo php72w-pdo_dblib php72w-pear  php72w-pecl-apcu php72w-pecl-imagick php72w-pecl-memcached php72w-pecl-mongodb php72w-pecl-redis php72w-pecl-xdebug php72w-pgsql php72w-phpdbg  php72w-process  php72w-pspell php72w-recode php72w-snmp php72w-soap  php72w-tidy  php72w-xml  php72w-xmlrpc
```

```
安装包         提供的拓展
php70w          mod_php , php70w-zts
php70w-bcmath       
php70w-cli      php-cgi, php-pcntl, php-readline
php70w-common   php-api, php-bz2, php-calendar, php-ctype, php-curl, php-date, php-exif, php-fileinfo, php-filter, php-ftp, php-gettext, php-gmp, php-hash, php-iconv, php-json, php-libxml, php-openssl, php-pcre, php-pecl-Fileinfo, php-pecl-phar, php-pecl-zip, php-reflection, php-session, php-shmop, php-simplexml   , php-sockets, php-spl, php-tokenizer, php-zend-abi, php-zip, php-zlib 
php70w-dba      
php70w-devel        
php70w-embedded     php-embedded-devel
php70w-enchant      
php70w-fpm      
php70w-gd       
php70w-imap     
php70w-interbase        php_database, php-firebird
php70w-intl     
php70w-ldap     
php70w-mbstring     
php70w-mcrypt       
php70w-mysql        php-mysqli, php_database
php70w-mysqlnd      php-mysqli, php_database
php70w-odbc     php-pdo_odbc, php_database
php70w-opcache      php70w-pecl-zendopcache
php70w-pdo      php70w-pdo_sqlite, php70w-sqlite3
php70w-pdo_dblib        php70w-mssql
php70w-pear     
php70w-pecl-apcu    
php70w-pecl-imagick 
php70w-pecl-memcached   
php70w-pecl-mongodb 
php70w-pecl-redis   
php70w-pecl-xdebug  
php70w-pgsql        php-pdo_pgsql, php_database
php70w-phpdbg       
php70w-process      php-posix, php-sysvmsg, php-sysvsem, php-sysvshm
php70w-pspell       
php70w-recode       
php70w-snmp     
php70w-soap     
php70w-tidy     
php70w-xml      php-dom, php-domxml, php-wddx, php-xsl
php70w-xmlrpc
```

命令：

```
1、php 扩展文件
php --ini
2、PHP 查看扩展
php -m
```



### Redis

```

```

### 源码编译PHP7.4 

```json
# 1.安装依赖包
yum -y install php-mcrypt libmcrypt libmcrypt-devel  autoconf  freetype gd libmcrypt libpng libpng-devel libjpeg libxml2 libxml2-devel zlib curl curl-devel re2c net-snmp-devel libjpeg-devel php-ldap openldap-devel openldap-servers openldap-clients freetype-devel gmp-devel

# 2. 下载PHP 
wget https://www.php.net/distributions/php-7.4.4.tar.gz

# 3.解压并进入目录
tar -xzvf php-7.4.4.tar.gz 
cd php-7.4.4

# 4. configure
 ./configure --prefix=/usr/local/php7.4 --with-config-file-path=/usr/local/php7.4/etc --with-mysqli --with-pdo-mysql --with-mysql-sock=/usr/local/mysql/mysql.sock --with-iconv-dir --with-freetype-dir --with-jpeg-dir --with-png-dir --with-curl --with-gd --with-gmp --with-zlib --with-xmlrpc --with-openssl --without-pear --with-snmp --with-gettext --with-mhash --with-libxml-dir=/usr --with-ldap --with-ldap-sasl --with-fpm-user=nginx --with-fpm-group=nginx --enable-xml --enable-fpm  --enable-ftp --enable-bcmath --enable-soap --enable-shmop --enable-sysvsem --enable-sockets --enable-inline-optimization --enable-maintainer-zts --enable-mbregex --enable-mbstring --disable-mbregex --enable-pcntl --enable-zip --disable-fileinfo --disable-rpath --enable-libxml --enable-opcache --enable-mysqlnd 
# 若出现 onfigure: error: Cannot find ldap libraries in /usr/lib.
# 执行 cp -frp /usr/lib64/libldap* /usr/lib/  后重新configure

# 5. 编译
make 
# 若出错   
`/usr/bin/ld: ext/ldap/.libs/ldap.o: undefined reference to symbol 'ber_strdup'

/usr/lib64/liblber-2.4.so.2: error adding symbols: DSO missing from command line

collect2: error: ld returned 1 exit status

make: *** [sapi/cli/php] Error 1`
# vim Makefile      #在以EXTRA_LIBS开头的一行结尾添加‘-llber’

make install 

# 6. 配置php配置文件
#移动php配置文件的位置，并修改名称 
cp /usr/local/php7.4/etc/php-fpm.d/www.conf.default /usr/local/php7.4/etc/php-fpm.conf
# 复制php.ini文件
cp /usr/local/php-7.4.4/php.ini-production /usr/local/etc/php.ini

# 7. 复制php启动脚本到/etc/init.d/
cp /usr/local/php-7.4.4/sapi/fpm/init.d.php-fpm /etc/init.d/php-fpm
# 添加执行权限，添加到启动项并设置卡机启动
chmod +x /etc/init.d/php-fpm
chkconfig --add php-fpm
chkconfig php-fpm on
# 启动php-fpm
# 创建nginx运行用户   useradd -M -s /sbin/nologin nginx
/etc/init.d/php-fpm start
```

### 源码编译mysql5.7

```json
# 卸载系统自带的mariadb*
yum -y remove mariadb* boost-*
# 安装依赖包
 yum install -y cmake make gcc gcc-c++ bison ncurses ncurses-devel   
# wget https://cdn.mysql.com/archives/mysql-5.7/mysql-boost-5.7.20.tar.gz
# tar -xzvf mysql-boost-5.7.20.tar.gz
# cd mysql-5.7.20/
cmake -DCMAKE_INSTALL_PREFIX=/usr/local/mysql -DMYSQL_DATADIR=/usr/local/mysql/data -DDOWNLOAD_BOOST=1 -DWITH_BOOST=/usr/local/mysql-5.7.20/boost/boost_1_59_0 -DSYSCONFDIR=/etc -DWITH_MYISAM_STORAGE_ENGINE=1 -DWITH_INNOBASE_STORAGE_ENGINE=1 -DWITH_MEMORY_STORAGE_ENGINE=1 -DWITH_ARCHIVE_STORAGE_ENGINE=1 -DWITH_FEDERATED_STORAGE_ENGINE=1 -DWITH_BLACKHOLE_STORAGE_ENGINE=1 -DWITH_PARTITION_STORAGE_ENGINE=1 -DWITH_READLINE=1 -DMYSQL_UNIX_ADDR=/usr/local/mysql/mysql.sock -DMYSQL_TCP_PORT=3306 -DENABLED_LOCAL_INFILE=1 -DENABLE_DTRACE=0 -DEXTRA_CHARSETS=all -DDEFAULT_CHARSET=utf8 -DDEFAULT_COLLATION=utf8_general_ci -DMYSQL_USER=mysql 

make && make install

# 创建数据库用户和数据目录
useradd -M -s /sbin/nologin -r mysql  
mkdir -p /usr/local/mysql/data　　　　　　　　　　#创建数据存储目录
chown -R mysql.mysql /usr/local/mysql/　　　　 #更改属主数组为MySQL

# vim /etc/my.cnf
[mysqld]

basedir=/usr/local/mysql

datadir=/usr/local/mysql/data

port=3306

socket=/usr/local/mysql/mysql.sock

symbolic-links=0

character-set-server=utf8

pid-file=/usr/local/mysql/mysqld.pid     

log-error=/var/log/mysqld.log

user = root

tmpdir = /tmp

# 配置MySQL启动脚本
cp /usr/local/mysql/support-files/mysql.server /etc/init.d/mysqld  #复制启动脚
chkconfig --add mysqld   #添加到开机启动项
chkconfig mysqld on      #添加开机自启动

vim /etc/init.d/mysqld   #修改路径
basedir=/usr/local/mysql
datadir=/usr/local/mysql/data

vim /etc/profile          #配置环境变量
export PATH=$PATH:/usr/local/mysql/bin
source /etc/profile      #加载变量立即生效

# vim mysqld.service
[Unit]

Description=MySQL DBMS

 

[Service]

LimitNOFILE=10000

Type=simple

User=mysql

Group=mysql

PIDFile=/usr/local/mysql/mysqld.pid

ExecStart=/usr/local/mysql/bin/mysqld_safe --datadir=/usr/local/mysql/data

ExecStop=/bin/kill -9 $MAINPID

 

[Install]

WantedBy=multi-user.target

chmod +x mysqld.service          #添加执行权限
systemctl enable mysqld.service       #设置开机启动

# 安全初始化数据库
/usr/local/mysql/bin/mysqld --initialize-insecure --user=mysql --basedir=/usr/local/mysql --datadir=/usr/local/mysql/data  
# 如出错  mkdir /etc/my.cnf.d/

# 启动mysql
/etc/init.d/mysqld start
# 登录 /usr/local/mysql/bin/mysql -uroot
# alter user 'root'@'localhost' identified by '123456'; 修改root密码
# flush privileges;
```

