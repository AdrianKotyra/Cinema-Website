<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../public/index.php">Home</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="admin_msg">
                   
                    <?php show_admin_messages_num_nav();?>
                  
                  
                    <a href="admin_messages.php" class="dropdown-toggle"><i class="fa fa-envelope"></i> </a>
                    
                </li>
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa-solid fa-book"></i></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="posts.php">See all posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_posts">Add posts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa-solid fa-video"></i>Movie genres <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="genres.php">See all movie genres</a>
                            </li>
                            <li>
                                <a href="genres.php?source=add_genres">Add movie genres</a>
                            </li>
                        </ul>
                    </li>
                
                 

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-film"></i> Movies <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="movies.php">See all movies</a>
                            </li>
                            <li>
                                <a href="movies.php?source=add_movies">Add movies</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li>
                                <a href="users.php">See all users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_users">Add users</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo6"><i class="fa-solid fa-question"></i> FAQ <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo6" class="collapse">
                            <li>
                                <a href="faq.php">See all FAQ</a>
                            </li>
                            <li>
                                <a href="faq.php?source=add_faq">Add faq</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo7"><i class="fa-solid fa-magnifying-glass"></i>Reviews <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo7" class="collapse">
                            <li>
                                <a href="reviews.php">See all Reviews</a>
                            </li>
                            <li>
                                <a href="reviews.php?source=add_reviews">Add review</a>
                            </li>
                          
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo8"><i class="fa-solid fa-comment-dots"></i> Forum <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo8" class="collapse">
                            <li>
                                <a href="forum.php">see all Posts</a>
                            </li>
                            <li>
                                <a href="forum.php?source=add_posts">Add Posts</a>
                            </li>
                          
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo9"><i class="fa-solid fa-person"></i></i> Staff members <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo9" class="collapse">
                            <li>
                                <a href="staff.php">Staff members</a>
                            </li>
                            <li>
                                <a href="staff.php?source=add_staff">Add staff</a>
                            </li>
                          
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo10"><i class="fa-solid fa-book"></i></i> Movies Tickets <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo10" class="collapse">
                            <li>
                                <a href="tickets.php">View Tickets</a>
                            </li>
                           
                          
                        </ul>
                    </li>
                   
                    <li class="">
                        <a href="comments.php"><i class="fa-solid fa-comments"></i> Comments</a>
                    </li>
                 
                </ul>
            </div>     
</nav>