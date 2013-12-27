
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Starter Template for Bootstrap</title>



    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}

    <!-- Custom styles for this template -->


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="row">
        <h1>Contacts</h1>
          <form id="addContact" action="">
<input type="text" placeholder="firstname" id="first_name"></input>
<input type="text" placeholder="lastname" id="last_name"></input>
<input type="text" placeholder="email" id="email_address"></input>
<input type="text" placeholder="description" id="description"></input>
            <input type="submit" value="ADD"></input>
          </form>
        <div class="tasks">

          <table id="allContacts" class="table table-striped">
            <thead>
                <tr>
                  <td>First Name </td>
                  <td>Last Name </td>
                  <td>Email Address </td>
                  <td>Description </td>
                  <td>config</td>
                </tr>
            </thead>

          </table>

<div id="editContact" class="module">

</div>

          <script id="allContactsTemplate" type="text/template">
              <td><%= first_name %></td>
              <td><%= last_name %></td>
              <td><%= email_address %></td>
              <td><%= description %></td>
              <td><a href="#contacts/<%= id %>" class="edit">Edit</a></td>
              <td><a href="#contacts/<%= id %>" class="delete">Delete</a></td>
          </script>


          <script id="editContactTemplate" type="text/template">
            <form id="editContact">
              <input type="text" placeholder="firstname" id="edit_first_name" value="<%= first_name %>"></input>
              <input type="text" placeholder="lastname" id="edit_last_name" value="<%= last_name %>"></input>
              <input type="text" placeholder="email" id="edit_email_address" value="<%= email_address %>"></input>
              <input type="text" placeholder="description" id="edit_description" value="<%= description %>"></input>
              <input type="submit" value="update"></input>
              <button type="button" class="cancel">Cancel</button>
            </form>

          </script>




        </div>

      </div>

    </div><!-- /.container -->


    {{ HTML::script('js/underscore.js') }}
    {{ HTML::script('js/jquery-latest.min.js') }}
    {{ HTML::script('js/backbone.js') }}
    {{ HTML::script('js/main.js') }}
    {{ HTML::script('js/models.js') }}
    {{ HTML::script('js/collections.js') }}
    {{ HTML::script('js/views.js') }}
    {{ HTML::script('js/router.js') }}

    <script type="text/javascript">

    new App.Router;

    Backbone.history.start();


    App.contacts = new App.Collections.Contacts;

    App.contacts.fetch().then(function(){
      new App.Views.App({ collection: App.contacts });
    });


    </script>






  </body>
</html>
