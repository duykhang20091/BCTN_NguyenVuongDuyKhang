@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../phly/keep-a-changelog/bin/keep-a-changelog
php "%BIN_TARGET%" %*
