const mongoose   =   require('mongoose'),
	  Campground =   require('./models/campground.js'),
	  Comment    =   require('./models/comment.js')

const data=[
	{
 	name:'Hampta Pass',
 	image:'https://images.unsplash.com/photo-1523341139367-9de570b874ed?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60',
	description:'Hampta Pass is the most famous Himalayan Trek . It is cherished by rivers, deep ghats and steep mountains covered with snow always . Best place to visit on earth',
 	price:18500
 	},
	{
 	name:'Kullu',
 	image:'https://images.unsplash.com/photo-1499803270242-467f7311582d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60',
	description:'This place is located in the foothills of the Himalayas . The weather here is cold and it is always a pleasure coming here for trek . Would Highly recommend',
 	price:29000
 	},
	{
 	name:'Shimla',
 	image:'https://images.unsplash.com/photo-1536028943632-1b302c2761b3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60',
	description:'Shimla covers everything from Snow glaciers to shopping . Tourist attract here because of its culture, religious spots and trekking spots .Do visit with family',
 	price:22000
 	}
]



function seedDB(){
	Campground.remove({},function(err){
		// if(err){
		// 	console.log(err)
		// }
		// data.forEach(function(campground){
		// 	Campground.create(campground,function(err,campground){
		// 		if(err){
		// 			console.log(err);
		// 		}
		// 		Comment.create({author:'Harsh',text:'Poor Internet Connection'},function(err,comment){
		// 			if(err){
		// 				console.log(err);
		// 			}
		// 			campground.comment.push(comment);
		// 			campground.save(function(err,comp_campground){
		// 				if(err){
		// 					console.log(err);
		// 				}
		// 				else{
		// 					console.log(comp_campground);
		// 				}
		// 			})
		// 		})
		// 	})
		// })
	})	
}

module.exports=seedDB

