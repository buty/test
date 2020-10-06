#!/bin/sh

ln -snf /usr/local/bin/php /usr/bin/php

crontab -u www-data /data/www/spl_trade/script/crontab-script-docker.ini
crontab /data/www/spl_trade/script/crontab-root-docker.ini
touch /var/log/cron
/etc/init.d/cron start

exec gosu www-data circusd /data/www/spl_trade/script/circus.ini
