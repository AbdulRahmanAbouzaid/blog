<div class="blog-masthead">

    <div class="container">

        <nav class="nav blog-nav">
            
            <a class="nav-link active" href="#">Home</a>
          
            <a class="nav-link" href="#">New features</a>
          
            <a class="nav-link" href="#">Press</a>
          
            <a class="nav-link" href="#">New hires</a>

            @if(auth()->check())
           	
           	    <a class="nav-link ml-auto" href="#" > {{auth()->user()->name}} </a>

            @else

                <a class="nav-link ml-auto" href="/login"> Sign In </a> 

           @endif

        </nav>

    </div>

</div>