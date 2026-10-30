#!/bin/bash
set -e

# Mail: PHP mail() uses the sendmail binary provided by postfix, which relays
# everything to MAIL_RELAY_HOST (mailpit in dev, a real SMTP relay in prod).
postconf -e "relayhost = [${MAIL_RELAY_HOST:-mailpit}]:${MAIL_RELAY_PORT:-1025}" \
    "inet_interfaces = loopback-only" \
    "mydestination =" \
    "maillog_file = /dev/stdout"
service postfix start

service cron start

exec "$@"
