 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        
        


        <li class="treeview ">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
          <li>
          <a href="{{ url('') }}">
            <i class="fa fa-dashboard"></i> <span>Add Products</span>
            
          </a>
          
        </li>
          </ul>
        </li>
         
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Recipe</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
             <li>
          <a href="{{ url('/recipe') }}">
            <i class="fa fa-dashboard"></i> <span>Add Recipe</span>
            
          </a>
          
        </li>
            <li>
          <a href="{{ url('/recipe-pagination') }}">
            <i class="fa fa-dashboard"></i> <span>Lists of Recipe</span>
            
          </a>
          
        </li>
          </ul>
        </li>
        <li class=" ">
          <a href="{{ url('/report') }}">
            <i class="fa fa-pie-chart"></i>
            <span>Report</span>
           
          </a>
          
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>