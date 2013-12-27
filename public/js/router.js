App.Router = Backbone.Router.extend({
	routes:{
		'':'index'
	},

	index:function(){
		console.log('this is index page');
	}
});