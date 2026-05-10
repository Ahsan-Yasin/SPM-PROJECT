@echo off
echo Setting up testing environment for QuickPOS...

REM Add PHP to PATH for this session
set PATH=%PATH%;C:\xampp\php

echo Installing Composer dependencies...
C:\xampp\php\php.exe composer.phar install --dev --ignore-platform-reqs

echo Running tests...
C:\xampp\php\php.exe vendor\bin\phpunit --testdox tests/

echo.
echo If tests fail, enable zip extension in C:\xampp\php\php.ini by uncommenting:
echo ;extension=zip
echo to:
echo extension=zip
pause
