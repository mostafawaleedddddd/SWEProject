const mongoose=require('mongoose');
const schema=mongoose.Schema;

const ContactSchema=new schema({
    Name: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Message: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Username: {type: String, match:/[a-zA-Z0-9]*[@]+[a-z]+[.]+[a-z]{3}/, unique:true, required: true}
},{timestamps: true});

const Contact=mongoose.model('Contact',ContactSchema);
module.exports=Contact;     