#!/bin/bash

ROOT=$(dirname $(dirname $(readlink -f "$0")))

# stop docker container
cd $ROOT
docker-compose down