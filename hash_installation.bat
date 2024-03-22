@echo off
python -m pip show beautifulsoup4 >nul 2>&1
if %ERRORLEVEL% == 0 (
    py ./composer_hash.py %*
) else (
    pip install requests beautifulsoup4
)
pause