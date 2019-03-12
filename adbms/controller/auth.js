var express = require('express');
var router = express.Router();

router.post('/login' , function(req , res){
	
	var email = req.body.email;
	var password = req.body.password;
	console.log(email);
	res.send('here');


});


module.exports = router;