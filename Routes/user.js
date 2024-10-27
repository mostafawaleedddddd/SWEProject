//Importing Modules
const express=require('express');
var bodyParser=require('body-parser');
//Setting up router
const router=express.Router();
router.use(bodyParser.json());
//Importing Users' controller
const path = require('path');
const User = require(path.join(__dirname, '../Controllers/User'));
// check if User is logged in
router.post('/addUser' , User.addUser);
router.post('/checkUser' , User.checkCredentials);
router.use((req, res, next) => {
    if (req.session.user === undefined && req.session.user == null) {
        next();
    }
    else {
        res.render('Error', { message: 'You don\'t have an authority to access this page',user: (req.session.user === undefined ? "" : req.session.user) })
    }
});
//Get Methods of User
router.get('/signup',(req, res)=>{
    res.render('signup', { user: (req.session.user === undefined ? "" : req.session.user) });
});
router.get('/dashboard',(req, res)=>{
    res.render('dashboard',{ user: (req.session.user === undefined ? "" : req.session.user) });
});
router.get('/signed',(req, res)=>{
    res.render('Signedup', { user: (req.session.user === undefined ? "" : req.session.user) });
});

router.get('/',(req, res)=>{
    res.render('index', { user: (req.session.user === undefined ? "" : req.session.user) });
});
module.exports = router;