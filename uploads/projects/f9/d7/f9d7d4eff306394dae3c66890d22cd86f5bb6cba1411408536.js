var http = require('http').createServer(onRequest);
http.listen(9900);

function onRequest(request, response) {
    response.writeHead(200, {"Content-Type": "text/plain"});
    response.write("Hello World");
    response.end();
}
