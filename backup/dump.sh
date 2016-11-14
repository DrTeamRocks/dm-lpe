#!/bin/sh

mysqldump dm -u root -p > dm_`date +%Y-%m-%d`.dump
