#!/bin/sh
set -e

vendor/bin/phpunit

(git push) || true

git checkout production
git merge develop

git push origin production

git checkout develop