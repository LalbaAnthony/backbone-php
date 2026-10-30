#!/usr/bin/env bash

if ! command -v php >/dev/null 2>&1; then
    echo "php not found"
    exit 1
fi

total=0
failed=0

while IFS= read -r -d '' file; do
    total=$((total + 1))

    if ! output=$(php -l "$file" 2>&1); then
        echo "$output"
        failed=$((failed + 1))
    fi
done < <(
    find . \
        -type d \( -name vendor -o -name node_modules -o -name .git \) -prune \
        -o -type f -name '*.php' -print0
)

if [ "$failed" -gt 0 ]; then
    echo "$failed of $total PHP files have syntax errors"
    exit 1
fi

echo "$total PHP files linted, no syntax errors"
exit 0
