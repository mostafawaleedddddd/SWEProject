const mongoose=require('mongoose');
const schema=mongoose.Schema;

const UserSchema=new schema({
    Name: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    phoneNum: {type: String, match:/[0]{1}[1]{1}[0,1,2,5]{1}[0-9]{8}/},
    gender: {type: String, match: /[Male,Female,Other]{1}/, required: true},
    DateOfBirth: {type: Date, min: '1907-05-04', max:'2006-06-21'},
    Username: {type: String, match:/[a-zA-Z0-9]*[@]+[a-z]+[.]+[a-z]{3}/, unique:true, required: true},
    Password: {type:String, match:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d!@#$%^&*()-_=+{};:,<.>]{8,}/,required: true}
},{timestamps: true});

const User=mongoose.model('User',UserSchema);
module.exports=User;