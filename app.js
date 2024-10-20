//Importing Modules
const express=require('express');
const mongoose=require('mongoose');
const path=require('path');
const session=require('express-session');
const fileUpload=require('express-fileupload');

//Starting app using express
const backend=express();

//Connecting with the database
mongoose.connect("mongodb+srv://akram2206148:tZQVGe4raqYzUDzq@cluster0.sps6z.mongodb.net/Medira?retryWrites=true&w=majority&appName=Cluster0")
  .then(() => {
    console.log('Mongo Connected!');
    backend.listen(8080);
  })
  .catch((error) => {
    console.log('Mongo connection failed',error);
  });

backend.use(express.urlencoded({ extended: true }));

//Setting up the some important backend defaults
backend.use(fileUpload());
backend.use(express.static(path.join(__dirname,'Media')));
backend.use(session({
    secret: 'your_secret_key', 
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false } 
}));
//Setting up the view engine
backend.set('view engine', 'ejs');

//Setting up the routes
const indexRoutes = require('./Routes/index.js');
const userRoutes= require('./Routes/user.js');
const { error } = require('console');
// const adminRoutes = require('./routes/admin.js');
//Linking each request with the suitable router for it
backend.use('/', indexRoutes);
backend.use('/user',userRoutes)
// backend.use('/admin', adminRoutes);
// 404 page
// backend.use((req, res) => {
//     res.status(404).render('404', { user: (req.session.user === undefined ? "" : req.session.user) });
// });