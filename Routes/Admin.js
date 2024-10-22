// const express = require('express');
// const router = express.Router();
// // const User=require('../controllers/User')
// router.get('/', (req, res) => {
//     res.render('Admin',{Admin: (req.session.Admin === undefined ? "" : req.session.Admin)});
// });

// module.exports = router;
const express = require('express');
const router = express.Router();
// const User = require('../controllers/User'); // Uncomment if needed

// Route to render the Admin main page
router.get('/', (req, res) => {
    res.render('Admin', { Admin: (req.session.Admin === undefined ? "" : req.session.Admin) });
});

// Route to render the User Management page
router.get('/users', (req, res) => {
    res.render('UserManagement', { Admin: (req.session.Admin === undefined ? "" : req.session.Admin) });
});

// Route to render the Questions page
router.get('/questions', (req, res) => {
    res.render('Questions', { Admin: (req.session.Admin === undefined ? "" : req.session.Admin) });
});

// Route to render the Settings page
router.get('/settings', (req, res) => {
    res.render('Settings', { Admin: (req.session.Admin === undefined ? "" : req.session.Admin) });
});

// Route to render the Analytics page
router.get('/analytics', (req, res) => {
    res.render('Analytics', { Admin: (req.session.Admin === undefined ? "" : req.session.Admin) });
});

module.exports = router;
