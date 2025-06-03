#!/bin/bash

echo "Running Pint..."
./vendor/bin/pint

echo "Running Rector..."
vendor/bin/rector process

echo "Running Prettier..."
npx prettier --write .
