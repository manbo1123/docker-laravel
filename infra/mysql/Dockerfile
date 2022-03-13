FROM mysql:8.0

ENV MYSQL_DATABASE=${DB_NAME} \
    MYSQL_USER=${DB_USER} \
    MYSQL_PASSWORD=${DB_PASSWORD} \
    MYSQL_ROOT_PASSWORD=${DB_PASSWORD} \
    TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf