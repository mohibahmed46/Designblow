   <aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">PERSONAL</li>
                        <li> 
                            <a class="waves-effect waves-dark" href="{{URL::to('/')}}" aria-expanded="false">
                                <i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-trending-up"></i><span class="hide-menu">Leads</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin.leads.add')}}">Add Leads</a></li>
                                <li><a href="{{route('admin.leads.fresh')}}">New Leads</a></li>
                                <li><a href="{{route('admin.leads.pending')}}">Assigned Leads</a></li>
                                <li><a href="{{route('admin.leads.marked')}}">Locked Leads</a></li>
                        <li> 
                                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span>Follow-Up</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{route('admin.leads.followup.upcoming')}}">Upcoming</a></li>
                                    <li><a href="{{route('admin.leads.followup.missed')}}">Missed</a></li>
                                </ul>
                        </li>
                                <li><a href="{{route('admin.leads.filter')}}">Filter Leads</a></li>
                                <li><a href="{{route('admin.leads.analytics')}}">Analytics</a></li>
                                <li><a href="{{route('admin.leads.import')}}">Imports</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-small-cap">Settings</li>
                        <li> <a class="waves-effect waves-dark"  href="{{route('admin.setting.categories')}}" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="hide-menu">Categories</span></a> </li>

                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Users</span></a>
                             <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin.users.addnew')}}">Add New</a></li>
                                <li><a href="{{route('admin.users.alluser')}}">All User</a></li>
                            </ul>
                         </li>
                    </ul>
                </nav>
    </div>
</aside>