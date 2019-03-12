// declaration
var express = require('express');
var bodyParser = require('body-parser');
var auth = require.main.require('./controller/auth');
var app = express();
var port = 3000;

console.log('hellow');

// config
app.set('view engine' , 'ejs');


// middlewares
app.use(bodyParser.urlencoded({extended: true}));
app.use('/auth' , auth);



// routes
app.get('/' , (req,res)=>{


	res.render('login');


	

}
);


app.listen(port, ()=>console.log('server started at port '+port));
