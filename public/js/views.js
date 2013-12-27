//new App.Views.App({ collection: App.contacts });


/**
*######################################################################
*#  global App view
*######################################################################
*/

App.Views.App = Backbone.View.extend({
	initialize:function(){
	//	console.log( this.collection.toJSON() );

			vent.on('contact:edit',this.editContact,this);

		var addContactView = new App.Views.AddContact({ collection: App.contacts }); 
	
 
		var allContactsView = new App.Views.Contacts({ collection: App.contacts }).render();

		$('#allContacts').append(allContactsView.el);
	},
	editContact: function(contact){
		var editContactView = new App.Views.EditContact({model: contact });
		$('#editContact').html(editContactView.el);
	}

});




/**
*######################################################################
*#  add contact view
*######################################################################
*/


App.Views.AddContact = Backbone.View.extend({
	el:'#addContact',
	initialize:function(){
		this.first_name = $('#first_name');
		this.last_name = $('#last_name');
		this.email_address = $('#email_address');
		this.description = $('#description');
	},
	events:{
		'submit':'addContact'
	},
	addContact: function(e){
		e.preventDefault();
 
		this.collection.create({
			first_name: this.first_name.val(),
			last_name: this.last_name.val(),
			email_address: this.email_address.val(),
			description: this.description.val()
		},{ wait:true });



		this.clearForm();

	},
	clearForm: function(){


		this.first_name.val('');
		this.last_name.val('');
		this.email_address.val('');
		this.description.val('');

	}
});




/**
*######################################################################
*#  Edit contact view
*######################################################################
*/

App.Views.EditContact = Backbone.View.extend({
	template: template('editContactTemplate'),
    
    initialize: function() {
		this.render();

		this.form = this.$('form');
		this.first_name = this.form.find('#edit_first_name');
		this.last_name = this.form.find('#edit_last_name');
		this.description = this.form.find('#edit_description');
		this.email_address = this.form.find('#edit_email_address');
	},

	events: {
		'submit form': 'submit',
		'click button.cancel': 'cancel'
	},

	submit: function(e) {
		e.preventDefault();

		this.model.save({
			first_name: this.first_name.val(),
			last_name: this.last_name.val(),
			description: this.description.val(),
			email_address: this.email_address.val()
		});

		this.remove();
	},

	cancel: function() {
		this.remove();
	},

	render: function() {
		var html = this.template( this.model.toJSON() );

		this.$el.html(html);
		return this;
	}

});





/**
*######################################################################
*#  All contacts view
*######################################################################
*/



App.Views.Contacts = Backbone.View.extend({
	tagName : 'tbody',

	initialize:function(){
		//this.render();
		this.collection.on('sync',this.addOne,this);
	},

	render: function(){
		this.collection.each(this.addOne,this);
		return this;
	},
	addOne: function(contact){
		var contactView = new App.Views.Contact({ model:contact });
	//	console.log(contactView.render().el);
		this.$el.append(contactView.render().el);
	}
});





App.Views.Contact = Backbone.View.extend({
	tagName:'tr',
	initialize: function(){
		this.model.on('destroy',this.unrender,this);
		this.model.on('change', this.render, this);
	},
	template: template('allContactsTemplate'),
	events: {
		'click a.delete':'deleteContact',
		'click a.edit':'editContact'
	},
	editContact:function(){
		vent.trigger('contact:edit', this.model);
	},
	deleteContact: function(){
		this.model.destroy();
	},
	render:function(){
		this.$el.html(this.template(this.model.toJSON() ) );
		return this;
	},
	unrender:function(){
		this.remove();
	}


});