<div class="navbar navbar-inverse navbar-static-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<a href= "#" class="navbar-brand">Laravel Blog</a>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav pull-right">
        <li class="active "><a href="{{URL::to('/')}}">Home</a></li>
        

        @if(Auth::check())

            <li>{{HTML::link('posts', 'Posts')}}</li>

              <li>{{HTML::link('roles', 'Roles')}}</li>
            <li>{{HTML::link('users', 'Usuarios')}}</li>

            
          <li>{{HTML::link('account/signout', 'Signout')}}</li>
           

        @else
           
          
            <li>{{HTML::link('account/signin', 'Signin')}}</li>
        @endif
    
    </ul>   
</div>
</div>
