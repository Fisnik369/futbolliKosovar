let express = require("express");
let app = express();
let server = require("http").Server(app);
let io = require("socket.io")(server);
let stream = require("./ws/stream");
let path = require("path");
let favicon = require("serve-favicon");

app.use(favicon(path.join(__dirname, "favicon.ico")));
app.use("/assets", express.static(path.join(__dirname, "assets")));

// app.use(
//   "/css",
//   express.static(path.join(_dirname, "node_modules/bootstrap/dist/css"))
// )
// app.use(
//   "/js",
//   express.static(path.join(_dirname, "node_modules/bootstrap/dist/js"))
// )
// app.use("/js", express.static(path.join(_dirname, "node_modules/jquery/dist")))

app.get("/", (req, res) => {
  res.sendFile(__dirname + "/index.html");
});

io.of("/stream").on("connection", stream);

server.listen(3000);
