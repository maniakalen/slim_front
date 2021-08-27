# Setup instructions

In order to connect this to the backend API implemented in slim-task repository you need to verify that the variable inside ```js/scripts.js``` named ```backend``` is configured with proper hostname. Default is ```http://localhost:8080```

Index file is php so it can easily be deployed using ```php -S 0.0.0.0:8000``` for example. You can also use simple apache/nginx configuration for that purpose
