const express = require('express');
const router = express.Router();
// const User=require('../controllers/User')
router.get('/', (req, res) => {
    res.render('index',{user: (req.session.user === undefined ? "" : req.session.user)});
});
router.get('/signup', (req, res) => {
    res.render('Signup',{user: (req.session.user === undefined ? "" : req.session.user)});
});
// router.post('/addUser' , User.addLearner);
module.exports = router;