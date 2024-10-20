const express = require('express');
const router = express.Router();
// const User=require('../controllers/User')
router.get('/', (req, res) => {
    res.render('Admin',{Admin: (req.session.Admin === undefined ? "" : req.session.Admin)});
});

module.exports = router;