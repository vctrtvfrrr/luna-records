const http = require('http')
require('dotenv').config()

const options = {
  host: process.env.HOST,
  port: process.env.PORT,
  path: '/ping',
  timeout: 10000,
}

const request = http.request(options, (res) => {
  if (res.statusCode !== 204) process.exit(1)
  process.exit(0)
})

request.on('error', function (err) {
  console.error(err)
  process.exit(1)
})

request.end()
