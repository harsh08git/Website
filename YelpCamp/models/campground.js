const mongoose= require('mongoose'); 

const CampgroundSchema=new mongoose.Schema({
	name:String,
	image:String,
	description:String,
	author: {
		id:{
			type:mongoose.Schema.Types.ObjectId,
			ref:'User'
		},
		username:String
	},
	price:Number,
	comment:[{
		type:mongoose.Schema.Types.ObjectId,
		ref:'comment'
	}]
});

module.exports = mongoose.model('campground',CampgroundSchema);