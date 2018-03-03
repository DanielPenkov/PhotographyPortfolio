#!/bin/bash
set -x
if [ $TRAVIS_BRANCH == 'master' ] ; then
    # Initialize a new git repo in _site, and push it to our server.
    git init
    git fetch --unshallow
    git remote add deploy "deploy@46.101.87.77:/var/www/gerganastories.com"
    git config user.name "Travis CI"
    git config user.email "penkov.daniel+travisCI@gmail.com"

    git add .
    git commit -m "Deploy"
    git push --force deploy master
else
    echo "Not deploying, since this branch isn't master."
fi

ssh deploy@46.101.87.77 -t "cd /var/www/gerganastories.com/html ; composer install --no-interaction"