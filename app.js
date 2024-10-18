//Importing Modules
const express=require('express');
const mongoose=require('mongoose');
const path=require('path');
const session=require('express-session');
const fileUpload=require('express-fileupload');

//Importing Custom Files
const credentials=require('./credentials.js');

//Starting app using express
const backend=express();

//Connecting with the database
mongoose.connect(credentials.DataBaseURI)

.then(()=>{
    console.log("Database connected sucessfully");
    backend.listen(8080);
})
.catch((err)=>{console.log(err)});

backend.use(express.urlencoded({ extended: true }));

//Setting up the some important backend defaults
backend.use(fileUpload());
backend.use(express.static(path.join(__dirname,'public')));
backend.use(session({
    secret: credentials.Secret,
    resave: true,
    saveUninitialized: true
}));
//Setting up the view engine
backend.set('view engine', 'ejs');

//Setting up the routes
const indexRoutes = require('./routes/index.js');
const userRoutes= require('./routes/user.js');
const adminRoutes = require('./routes/admin.js');
//Linking each request with the suitable router for it
backend.use('/', indexRoutes);
backend.use('/user',userRoutes)
backend.use('/admin', adminRoutes);
// 404 page
backend.use((req, res) => {
    res.status(404).render('404', { user: (req.session.user === undefined ? "" : req.session.user) });
});