#!/usr/bin/env/ bash

set -e

git clone -b master --quiet "${CIRCLE_REPOSITORY_URL}.git" workspace

cd ./workspace/library/scss
compass compile
cd ../../ # to workspace

COMMIT_MESSAGE=$(git log --format="%s" -n 1 $CIRCLE_SHA1)
git add -A
git commit -m "Update from CircleCI build No.${CIRCLE_BUILD_NUM} -- ${COMMIT_MESSAGE}"
git push --quiet "https://${GH_TOKEN}@github.com/${CIRCLE_PROJECT_USERNAME}/${CIRCLE_PROJECT_REPONAME}.git" master:dist 2> /dev/null
