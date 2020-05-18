:loop
node.exe D:\xampp\htdocs\alltools\cron\node\makerequest.js http://localhost:8080/alltools/twitterassistant/crons/posttweet GET
timeout /t 3600 /nobreak
goto :loop