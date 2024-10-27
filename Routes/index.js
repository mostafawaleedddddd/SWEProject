const express = require('express');
const router = express.Router();
const path = require('path');
const User = require(path.join(__dirname, '../Controllers/User'));
router.get('/', (req, res) => {
    res.render('index',{user: (req.session.user === undefined ? "" : req.session.user)});
});
router.get('/signup', (req, res) => {
    res.render('Signup',{user: (req.session.user === undefined ? "" : req.session.user)});
});
router.get('/login',(req, res)=>{
    res.render('login', { user: (req.session.user === undefined ? "" : req.session.user) });
});
router.get('/ContactUs', (req, res) => {
    res.render('ContactUs',{user: (req.session.user === undefined ? "" : req.session.user)});
});
router.get('/Chat', (req, res) => {
    res.render('Chat',{user: (req.session.user === undefined ? "" : req.session.user)});
});
router.post('/loging' , User.login);
// router.post('/addUser' , User.addLearner);
module.exports = router;