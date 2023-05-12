FROM nginx:alpine

COPY ./docker/nginx/conf.d/test.conf /etc/nginx/conf.d/default.conf
