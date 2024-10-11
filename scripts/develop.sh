#!/bin/bash

ROOT=$(dirname $(dirname $(readlink -f "$0")))

# run docker container
cd $ROOT
if [ ! -f $ROOT/.env ]
then
  cp $ROOT/.env.sample $ROOT/.env
fi
docker-compose up -d --build --force-recreate