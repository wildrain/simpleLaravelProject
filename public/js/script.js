(function($){
   // write code here
  window.App = {
  	Models : {},
  	Collections:{},
  	Views:{}
  }; 



  window.template = function(id){
  	return _.template( $('#'+id).html() );
  }








 

  App.Models.Task = Backbone.Model.extend({
    validate:function(attrs){
      if( ! $.trim(attrs.title) )
         return 'require title';
    }
  });


  App.Collections.Tasks = Backbone.Collection.extend({
  	model:App.Models.Task,
    comparator:'priority'
  }); 





   // collection tasks view 

  App.Views.Tasks = Backbone.View.extend({

  	tagName:'ul',
    
    initialize: function(){
      this.collection.on('add',this.addOne,this);
    },
  	
    render:function(){
  		this.collection.each(this.addOne,this);

  		return this;
  	},
  	addOne: function(task){
  		var taskView = new App.Views.Task({
        model:task
      });
  		this.$el.append(taskView.render().el);
  	}
  });




// single task view 

  App.Views.Task = Backbone.View.extend({
  	tagName : 'li',
    template:template('taskTemplate'), 


    initialize: function(){
      this.model.on('change',this.render, this);
      this.model.on('destroy ',this.remove, this);
    },

    events:{
      'click .edit': 'editTask',
      'click .delete': 'destroy'
    },

    editTask : function(){
      var newTaskTitle = prompt('what ?',this.model.get('title'));

      if( !newTaskTitle ) return;
      this.model.set('title',newTaskTitle );
    },

    destroy : function(){
      this.model.destroy();
    },

    remove : function(){
      this.$el.remove();
    },


  	render : function(){
      var template = this.template(this.model.toJSON() );
  		this.$el.html(template);
 
  		return this;
  	}
  });




  App.Views.AddTask = Backbone.View.extend({
    el:'#addTask',
    events:{
      'submit':'submit'
    },
    submit:function(e){
      e.preventDefault();
      //console.log('submitted');

       var newTaskTitle = $(e.currentTarget).find('input[type=text]').val();

       var task = new App.Models.Task({ title : newTaskTitle });
       this.collection.add(task);
    },
    initialize: function(){

    }
  });


  // collection decleare 

 window.tasksCollection = new App.Collections.Tasks([
 		{
 			title:'got to the store',
 			priority: 4
 		},
 		{
 			title:'got to the mall',
 			priority: 3
 		},
 		{
 			title:'got to the school',
 			priority: 1
 		}
 	]);


 var addTaskView = new App.Views.AddTask({ collection : tasksCollection });

 // call collection view 
 var taskView = new App.Views.Tasks({ collection:tasksCollection });

 //console.log(taskView.render().el);

  $('.tasks').html(taskView.render().el);
  



 
})(jQuery);