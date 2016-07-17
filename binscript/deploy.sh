#!/usr/bin/env/ bash

set -e

git clone -b master --quiet "${CIRCLE_REPOSITORY_URL}.git" workspace

cd ./workspace/library/scss
compass compile
cd ../../ # to workspace

MESSAGE=$(git log --format="%s" -n 1 $CIRCLE_SHA1)
git stash buf
git checkout -b dist "${CIRCLE_REPOSITORY_URL}.git"
git stash pop buf
git add -A
git commit -m "Update from CircleCI build No.${CIRCLE_BUILD_NUM} -- ${MESSAGE}"
git push --force-with-lease --quiet "https://${GH_TOKEN}@github.com/${CIRCLE_PROJECT_USERNAME}/${CIRCLE_PROJECT_REPONAME}.git" dist 2> /dev/null
