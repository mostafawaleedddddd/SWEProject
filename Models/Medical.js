const mongoose=require('mongoose');
const schema=mongoose.Schema;

const MedicalSchema=new schema({
    Organ: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Urgency: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Specialist: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Advice: {type: String, match:/([A-ZÀ-ÿ-a-z. ']+[ ]*)+/, required: true},
    Symptoms: {type: Array,default:[]}
},{timestamps: true});

const Medical=mongoose.model('Medical',MedicalSchema);
module.exports=Medical;