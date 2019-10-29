<!--main header-->
<?php 
    $userdata = get_record('users',"where email='$loginUserEmail'")[0];
    extract($userdata);
?>
<div class="header">
   <div class="">
      <nav class="navbar navbar-default custom_nav">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
            </button>
         </div>
         <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left hidden-xs">
               <li><a href="#" class="btnLeftBarToggle"><i class="fa fa-bars"></i></a></li>
               <li class='hidden-md hidden-lg'><a href="#" class="btnLeftBarToggle"><i class="fa fa-navicon"></i></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
                  <a class="dropdown-toggle btnAlert" data-toggle="dropdown" href="#"><i class="fa fa-user-o"></i><?php echo $username;?>
                  </a>
               </li>
               <li>
                  <a href='signout.php' class='active'><i class="fa fa-sign-in"></i> LogOut</a>			
               </li>
               </li>
               <li class="dropdown hidden">
                  <a class="dropdown-toggle btnAlert " data-toggle="dropdown" href="#">
                     <i class="fa fa-user-o">
                     </i>
                     <ul class="dropdown-menu">
                        <li>
                           <span class="title">Software development</span> <span class='date'>09/12/2018</span>
                           <p>Hi, Babar your order is in process kindly wait a while</p>
                        </li>
                        <li>
                           <span class="title">Software development</span> <span class='date'>09/12/2018</span>
                           <p>Hi, Babar your order is in process kindly wait a while</p>
                        </li>
                        <li>
                           <span class="title">Software development</span> <span class='date'>09/12/2018</span>
                           <p>Hi, Babar your order is in process kindly wait a while</p>
                        </li>
                     </ul>
               </li>
               <li class='hidden-md hidden-lg'><a href="#" class="btnLeftBarToggle "><i class="fa fa-navicon"></i></a></li>
            </ul>
         </div>
      </nav>
   </div>
</div>