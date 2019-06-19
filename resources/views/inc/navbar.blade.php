  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">{{config("app.name",'Attendo')}}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="/teachers">Teachers</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="/students">Students</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="/courses">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sessions">Sessions</a>
                </li> 
                
               
            </ul>

            <ul class="nav navbar-nav navbar-right"> 
                <li class="nav-item">
                    <a class="nav-link " href="/teachers/create">Add Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/students/create">Add Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="/courses/create">Add Course</a>
                </li>
                
            </ul> 
            
        </div>
    </nav>