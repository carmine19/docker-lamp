#!/bin/bash
set -e

docker-compose up -d

# wait for containers to initialize
sleep 10

# test php 8.3 service
STATUS=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:8083 || true)

docker-compose down -v

if [ "$STATUS" != "200" ]; then
  echo "Health check failed with status $STATUS"
  exit 1
fi

echo "Health check passed"
