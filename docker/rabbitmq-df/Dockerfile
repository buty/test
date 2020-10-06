FROM rabbitmq:3.7-management

COPY ./aliyun.sources.list /etc/apt/sources.list 
COPY ./deploy_image_rabbitmq-df_rabbitmq_delayed_message_exchange-20171201-3.7.x.ez /plugins
RUN rabbitmq-plugins enable --offline rabbitmq_delayed_message_exchange
