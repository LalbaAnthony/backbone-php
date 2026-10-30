#!/usr/bin/env bash
set -euo pipefail

RESET=false
for arg in "$@"; do
    [[ "$arg" == "--reset" || "$arg" == "-Reset" ]] && RESET=true
done

[ -f ".env" ] && rm -f ".env"
cp ".env.example" ".env"

if [ "$RESET" = true ]; then
    docker compose --profile dev down
fi

docker compose --profile dev build
docker compose --profile dev pull --ignore-buildable

docker compose --profile dev up --watch
