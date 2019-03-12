var express = require('express');
var router = express.Router();
var oracledb = require.main.require('./oracledb');

router.post('/login' , function(req , res){
	
	var email = req.body.email;
	var password = req.body.password;
	console.log(email);

	var obj = {
		email: email,
		password: password
	}

	oracledb.execute(obj , function(result){
		if(result.length<1)
		{	
			console.log(result);
			console.log('failed');
		}else{
			console.log(result);
			console.log('success');
		}
	});
	
	res.send('here');


});


module.exports = router;