 <aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">PERSONAL</li>
                        <li> 
                            <a class="waves-effect waves-dark" href="{{URL::to('/agent1/')}}" aria-expanded="false">
                                <i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-trending-up"></i><span class="hide-menu">Leads</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('agent1.leads.add')}}">Add Leads</a></li>
                                <li><a href="{{route('agent1.leads.fresh')}}">New Leads</a></li>
                                <li><a href="{{route('agent1.leads.import')}}">Import Leads</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
    </div>
</aside>