#!/usr/bin/env/ bash

set -e

git clone -b dist --quiet "${CIRCLE_REPOSITORY_URL}.git" workspace

cd ./workspace/library/scss
compass compile
cd ../../ # to workspace

git add -A
git commit -m "Update from CircleCI build no.${CIRCLE_BUILD_NUM}"
git push --quiet "https://${GH_TOKEN}@github.com/${CIRCLE_PROJECT_USERNAME}/${CIRCLE_PROJECT_REPONAME}.git" dist 2> /dev/null
