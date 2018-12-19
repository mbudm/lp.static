require('dotenv').config()
var fs = require( 'vinyl-fs' );
var ftp = require( 'vinyl-ftp' );

var logPuts = function(log, msg){

    if(log.startsWith('PUT') || log.startsWith('UP')){
        console.log(log, msg);
    }
}
 
var conn = new ftp({
    host: process.env.FTP_HOST,
    user: process.env.FTP_USER,
    password: process.env.FTP_PWD,
    parallel: 10,
    log: logPuts
} );

var destPath = process.env.FTP_DEST_PATH || '/'
fs.src( [ './public/**' ], { buffer: false } )
    .pipe( conn.newer( '/' ) ) 
    .pipe( conn.dest( destPath ) );