@echo off
set arg1=%1
git add .
git commit -m %arg1%
git push


rem this just automatically does the github stuff for me