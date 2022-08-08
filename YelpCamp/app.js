const express    	=    require('express'),
	  app        	=    express(),
	  bodyParser 	=    require('body-parser'),
	  mongoose   	=    require('mongoose'),
	  Campground 	=    require('./models/campground'),
	  User       	=    require('./models/user'),
	  Comment    	=    require('./models/comment'),
	  seed_data  	=    require('./seed'),
	  flash         =    require('connect-flash'),
	  methodOverride= 	 require('method-override'),
	  passport   	=    require('passport'),
	  LocalStrategy =	 require('passport-local'),
	  passportLocalMongoose = require('passport-local-mongoose');
		

mongoose.connect('mongodb://localhost/yelp_camp',{useNewUrlParser: true , useUnifiedTopology: true});
app.use(bodyParser.urlencoded({extended:true}));
app.use(methodOverride('_method'));
app.use(express.static('public'));
app.use(flash());

// seed_data();

let new_camp;
let camp_id;
let new_user;

app.use(require('express-session')({
	secret:'My name is Harsh Khona',
	resave:false,
	saveUninitialized:false
}));

//Passport Configuation
app.use(passport.initialize());
app.use(passport.session());

passport.serializeUser(User.serializeUser())
passport.deserializeUser(User.deserializeUser())

passport.use(new LocalStrategy(User.authenticate()));


app.use(function(req,res,next){
	res.locals.current_user=req.user;
	res.locals.error=req.flash('error');
	res.locals.success=req.flash('success');
	next();
});

// ========================================================================================================== //

// Campground Routes //

app.get('/',function(req,res){
	res.render('campgrounds/landing.ejs');
});

app.get('/campgrounds',function(req,res){
	//Get all campgrounds from database
	Campground.find({},function(err,all_campgrounds){
		if(err){
			console.log(err);
		}
		else{
			res.render('campgrounds/campgrounds.ejs',{campground:all_campgrounds});
		}
	});
});

app.get('/campgrounds/new',isLoggedIn,function(req,res){
	res.render('campgrounds/new_campground.ejs');
});

app.post('/campgrounds',isLoggedIn,function(req,res){
	name=req.body.name
	image=req.body.image
	description=req.body.description
	price=req.body.price
	author_id=req.user.id
	author_name=req.user.username
	new_camp={name:name,image:image,description:description,price:price,author:{id:author_id,username:author_name}}
	//Below line was performed when there was no database
	// campgrounds.push(new_camp)
	Campground.create(new_camp,function(err,new_campground){
		if(err){
			req.flash('error','Something went wrong.Try again later');
			res.redirect('/campgrounds');
		}
		else{
			req.flash('success','Campground added successfully!');
			res.redirect('/campgrounds');	
		}
	});
});

//To get the login flash message 
app.get('/campgrounds/user',function(req,res){
	req.flash('success','Welcome '+req.user.username)
	res.redirect('/campgrounds');
})
//

app.get('/campgrounds/:id',function(req,res){
	camp_id=req.params.id
	Campground.findById(camp_id).populate('comment').exec(function(err,campground){
		if(err){
			req.flash('error','Something went wrong.Try again later');
		}
		else{
			res.render('campgrounds/show_campground.ejs',{campground:campground});
		}
	});
});


//Updating Campground
app.get('/campgrounds/:id/edit',isUser,function(req,res){
	Campground.findById(req.params.id,function(err,foundcampground){
		if(err){
			req.flash('error','Something went wrong.Try again later');
			res.redirect('/campgrounds/'+req.params.id);
		}
		else{
			res.render('campgrounds/edit_campground.ejs',{campground:foundcampground});	
		}
	})
});



app.put('/campgrounds/:id',isUser,function(req,res){
	Campground.findByIdAndUpdate(req.params.id,req.body.campground,function(err,campground){
		if(err){
			req.flash('error','Something went wrong.Try again later');
			res.redirect('/campgrounds');
		}
		else{
			req.flash('success','Campground updated successfully!');
			res.redirect('/campgrounds/'+req.params.id);
		}
	})
});


//Deleting Campground
app.delete('/campgrounds/:id',isUser,function(req,res){
	Campground.findByIdAndRemove(req.params.id,function(err){
		if(err){
			req.flash('error','Something went wrong.Try again later');
			res.redirect('/campgrounds/'+req.params.id);
		}
		else{
			req.flash('success','Campground deleted successfully!')
			res.redirect('/campgrounds');
		}
	})
});

// ========================================================================================================== //

// Add Comment Routes //

app.get('/campgrounds/:id/comment/new',isLoggedIn,function(req,res){
	Campground.findById(req.params.id,function(err,campground){
		if(err){
			req.flash('error','Something went wrong.Try again later');
			res.redirect('back');
		}
		else{
			res.render('comments/new_comment.ejs',{campground:campground});
		}
	});
});

app.post('/campgrounds/:id/comment',isLoggedIn,function(req,res){
	Campground.findById(req.params.id,function(err,campground){
		if(err){
			req.flash('error','Something went wrong.Try again later');
			res.redirect('/campgrounds/'+req.params.id);
		}
		else{
			Comment.create(req.body.comment,function(err,comment){
				if(err){
					console.log(err);
				}
				else{
					comment.author={id:req.user._id,username:req.user.username};
					comment.save();
					campground.comment.push(comment);
					campground.save(function(err,campground){
						req.flash('success','Comment added successfully!');
						res.redirect('/campgrounds/'+campground._id)
					})
				}
			});
		}
	});
});


//Updating Comments

app.get('/campgrounds/:id/comment/:comment_id/edit',isCommentUser,function(req,res){
	Campground.findById(req.params.id,function(er,campground){
		Comment.findById(req.params.comment_id,function(err,comment){
			if(err){
				req.flash('error','Something went wrong.Try again later');
				res.redirect('back');
			}
			else{
				res.render('comments/edit_comment.ejs',{comment:comment,campground:campground});			
			}
		})

	})
})

app.put('/campgrounds/:id/comment/:comment_id',isCommentUser,function(req,res){
	Comment.findByIdAndUpdate(req.params.comment_id,req.body.comment,function(err,updated_comment){
		if(err){
			req.flash('error','Something went wrong.Try again');
			res.redirect('/campgrounds/:id/comment/:comment_id/edit');
		}
		else{
			req.flash('success','Comment updated successfully!');
			res.redirect('/campgrounds/'+req.params.id)
		}
	})
});


//Deleting Comment

app.delete('/campgrounds/:id/comment/:comment_id',isCommentUser,function(req,res){
	Comment.findByIdAndRemove(req.params.comment_id,function(err){
		if(err){
			req.flash('error','Something went wrong.Try again later');
			res.redirect('/campgrounds/'+req.params.id)
		}
		else{
			req.flash('success','Comment deleted successfully');
			res.redirect('/campgrounds/'+req.params.id);
		}
	})
});




// ========================================================================================================== //

//Register
app.get('/register',function(req,res){
	res.render('campgrounds/register.ejs');
})

app.post('/register',function(req,res){
	new_user= new User({email:req.body.email,fullname:req.body.fullname,username:req.body.username});
	User.register(new_user,req.body.password,function(err,user){
		if(err){
			req.flash('error',err.message);
			return res.redirect('/register');
		}
		passport.authenticate('local')(req,res,function(){
			req.flash('success','User Registered..!');
			res.redirect('/login');
		})
	})
})

//Log In
app.get('/login',function(req,res){
	res.render('campgrounds/login.ejs');
})

app.post('/login',passport.authenticate('local',{
	successRedirect:'/campgrounds/user',
	failureRedirect:'/login',
	failureFlash:'Invalid Username or Password'
}),function(){});

//Logout
app.get('/logout',function(req,res){
	req.logout();
	req.flash('success','Logged you out!');
	res.redirect('/campgrounds');
})

//Creating isLoggedIn Middleware

function isLoggedIn(req,res,next){
	if(req.isAuthenticated()){
		return next();
	}
	req.flash('error','Please Login first');
	res.redirect('/login');
}


//Creating CheckUser Middleware

function isUser(req,res,next){
	if(req.isAuthenticated()){
		
		Campground.findById(req.params.id,function(err,campground){
			if(err){
				req.flash('error','Something went wrong.Try again later');
				res.redirect('back');
			}
			else{
				if(campground.author.id.equals(req.user._id)){
				   next();   
				}
				else{
					req.flash('error','You don\'t have the permission to edit ');
					res.redirect('back');	   
				}
			}
		})
	}
	else{
		req.flash('error','Please LogIn first');
		res.redirect('/login');
	}
}


//Creating CheckComment Middleware

function isCommentUser(req,res,next){
	if(req.isAuthenticated()){
		
		Comment.findById(req.params.comment_id,function(err,comment){
			if(err){
				req.flash('error','Something went wrong.Try again later');
				res.redirect('back');
			}
			else{
				if(comment.author.id.equals(req.user._id)){
				   next();   
				}
				else{
					req.flash('error','You don\'t have the permission to edit ');
					res.redirect('back');	   
				}
			}
		})
	}
	else{
		req.flash('error','Please LogIn first');
		res.redirect('/login');
	}
}


//Server lISTENER
app.listen(3000,function(req,res){
	console.log('Server running on port 3000');
});

