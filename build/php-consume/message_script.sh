#!/usr/bin/env bash
sleep 4;
/var/www/project/bin/console messenger:consume-messages >&1;
