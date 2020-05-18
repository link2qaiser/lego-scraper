:loop
node.exe D:\xampp\htdocs\alltools\cron\node\makerequest.js http://localhost:8080/alltools/twitterassistant/crons/feedtweets GET
timeout /t 40 /nobreak
goto :loop