//Importing Modules
const express=require('express');
var bodyParser=require('body-parser');
const UserSchema=require('../models/User');
//Setting up router
const router=express.Router();
router.use(bodyParser.json());
//Importing Users' controller
// const User=require('../controller/User')
// check if User is logged in
router.use((req, res, next) => {
    if (req.session.user === undefined && req.session.user == null) {
        next();
    }
    else {
        res.render('Error', { message: 'You don\'t have an authority to access this page',user: (req.session.user === undefined ? "" : req.session.user) })
    }
});
//Get Methods of User
router.get('/login',(req, res)=>{
    res.render('login', { user: (req.session.user === undefined ? "" : req.session.user) });
});
router.get('/signup',(req, res)=>{
    res.render('signup', { user: (req.session.user === undefined ? "" : req.session.user) });
});
router.get('/dashboard',(req, res)=>{
    res.render('dashboard',{ user: (req.session.user === undefined ? "" : req.session.user) });
});
module.exports = router;