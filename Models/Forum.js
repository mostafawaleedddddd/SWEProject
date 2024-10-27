const mongoose=require('mongoose');
const schema=mongoose.Schema;

const ForumSchema=new schema({
    Name: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Message: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Order: {type: Number, required: true}
},{timestamps: true});

const Forum=mongoose.model('Forum',ForumSchema);
module.exports=Forum;