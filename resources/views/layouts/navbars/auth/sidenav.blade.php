<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-1 fixed-start ms-1 {{ $side_template->sidebar_type == 'bg-default' ? 'bg-default' : ($side_template->sidebar_type == 'bg-white' ? 'bg-white' : ($side_template->mode == 'dark' ? '' : 'bg-white')) }}"
    id="sidenav-main" <?= $side_template != null ? $side_template->sidebar_color : '' ?>>
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 title-nav" href="{{ route('home') }}" target="_blank">
            <img src="{{ App\Models\Company::where('id', 1)->first()->image_company != null ? asset('storage/' . App\Models\Company::where('id', 1)->first()->image_company) : asset('img/favicon.png') }}"
                class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold nav-link-text">WFreight</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a href="{{ route('home') }}"
                    class="sidebar-menu-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <i class="fa fa-d text-primary text-sm opacity-10"></i>
                    <div>
                        <span class="nav-link-text"> Dashboard
                            <b class="caret"></b></span>
                    </div>
                </a>
            </li>
            {{-- RECENT VIEWS --}}
            <li class="nav-item ">
                <div class="sidebar-menu-item nav-link">
                    <span class="nav-link-text text-uppercase text-xs font-weight-bolder ">Recent
                        views</span>
                </div>
            <li class="nav-item ">
                @foreach (App\Models\History::where('user_id', auth()->user()->id)->get()->unique('menu')->sortByDesc('id') as $item)
                    <a href="{{ $item->url_menu }}" class="sidebar-menu-item nav-link">
                        <div>
                            <i class="fa fa-{{ Str::lower(Str::substr($item->menu, 0, 1)) }} text-primary text-sm opacity-10"
                                style="margin-right: 10px;"></i>
                            <span class="nav-link-text"> {{ $item->menu }}
                                <b class="caret"></b></span>
                        </div>
                    </a>
                @endforeach
            </li>

            {{-- MENU PAGES --}}
            <li class="nav-item ">
                <a aria-expanded="{{ str_contains(request()->url(), 'tables') == true ? 'true' : 'false' }}"
                    data-toggle="collapse" data-target="#collapseShow2" class="sidebar-menu-item nav-link ">
                    <div><span class="nav-link-text text-uppercase text-xs font-weight-bolder">Pages <b
                                class="caret"></b></span></div>
                </a>
                <div class="collapse {{ str_contains(request()->url(), 'tables') == true ? 'show' : '' }}"
                    id="collapseShow2">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <!---->
                            <div class="collapse ">
                                <ul class="nav nav-sm flex-column"></ul>
                            </div>
                            <a href="{{ route('page', ['page' => 'tables']) }}"
                                class="sidebar-menu-item nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}">
                                <i class="fa fa-t text-primary text-sm opacity-10"></i>
                                <div>
                                    <span class="nav-link-text">Tables</span>
                                </div>
                            </a>
                            <ul class="navbar-nav"></ul>
                        </li>
                        {{-- EXAMPLE SUBMENU --}}
                        {{-- <li class="nav-item ">
                            <a aria-expanded="" data-toggle="collapse" data-target="#collapseShowSubmenu"
                                class="sidebar-menu-item nav-link ">
                                <i class="fa fa-s text-primary text-sm opacity-10"></i>
                                <div>
                                    <span class="nav-link-text">Submenu
                                        <b class="caret"></b>
                                    </span>

                                </div>
                            </a>
                            <div class="collapse " id="collapseShowSubmenu">
                                <ul class="nav nav-sm flex-column" style="margin-left: 1.78rem;">
                                    <li class="nav-item">
                                        <!---->
                                        <div class="collapse ">
                                            <ul class="nav nav-sm flex-column"></ul>
                                        </div> <a href="javascipt:;" class="nav-link ">
                                            <i class="fa fa-t text-primary text-sm opacity-10"></i>
                                            <div>
                                                <span class="nav-link-text">Testing
                                                </span>
                                            </div>
                                        </a>
                                        <ul class="navbar-nav"></ul>
                                    </li>


                                </ul>
                            </div>
                        </li> --}}

                    </ul>
                </div>
            </li>

            {{-- MENU MASTER --}}
            <li class="nav-item ">
                <a aria-expanded="{{ Request::is('country*') || Request::is('cost_table*') || Request::is('charge_table*') || Request::is('city*') || Request::is('port*') || Request::is('commodity*') || Request::is('container*') || Request::is('job_type*') || Request::is('currency*') || Request::is('vat_code*') || Request::is('uom*') || Request::is('charge_code*') || Request::is('wt_code*') || Request::is('party_type*') || Request::is('pay_term*') || Request::is('salesman*') || Request::is('bisnis_party*') || Request::is('airport*') || Request::is('airline*') || Request::is('shipline*') || Request::is('vessel*') || Request::is('incoterms*') ? 'true' : 'false' }}"
                    data-toggle="collapse" data-target="#collapseShow3" class="sidebar-menu-item nav-link ">
                    <div><span class="nav-link-text text-uppercase text-xs font-weight-bolder">Master <b
                                class="caret"></b></span></div>
                </a>
                <div class="collapse {{ Request::is('country*') || Request::is('cost_table*') || Request::is('charge_table*') || Request::is('city*') || Request::is('port*') || Request::is('commodity*') || Request::is('container*') || Request::is('job_type*') || Request::is('currency*') || Request::is('vat_code*') || Request::is('uom*') || Request::is('charge_code*') || Request::is('wt_code*') || Request::is('party_type*') || Request::is('pay_term*') || Request::is('salesman*') || Request::is('bisnis_party*') || Request::is('airport*') || Request::is('airline*') || Request::is('shipline*') || Request::is('vessel*') || Request::is('incoterms*') ? 'show' : '' }}"
                    id="collapseShow3">
                    <ul class="nav nav-sm flex-column">
                        @permission('manage-airline')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('airline.index') }}"
                                    class="nav-link {{ Request::is('airline*') ? 'active' : '' }}">
                                    <i class="fa fa-a text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Airline</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-airport')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('airport.index') }}"
                                    class="nav-link {{ Request::is('airport*') ? 'active' : '' }}">
                                    <i class="fa fa-a text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Airport</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-bisnis_party')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('bisnis_party.index') }}"
                                    class="nav-link {{ Request::is('bisnis_party*') ? 'active' : '' }}">
                                    <i class="fa fa-b text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Business Party</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-country')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div>
                                <a href="{{ route('country.index') }}"
                                    class="nav-link {{ Request::is('country*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Country</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-city')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('city.index') }}"
                                    class="nav-link {{ Request::is('city*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">City</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-commodity')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('commodity.index') }}"
                                    class="nav-link {{ Request::is('commodity*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Commodity</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-container')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('container.index') }}"
                                    class="nav-link {{ Request::is('container*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Container</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-currency')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('currency.index') }}"
                                    class="nav-link {{ Request::is('currency*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Currency Code</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-charge_code')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('charge_code.index') }}"
                                    class="nav-link {{ Request::is('charge_code*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Charge Code</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-charge_table')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('charge_table.index') }}"
                                    class="nav-link {{ Request::is('charge_table*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Charge Table</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-cost_table')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('cost_table.index') }}"
                                    class="nav-link {{ Request::is('cost_table*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Cost Table</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-incoterms')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('incoterms.index') }}"
                                    class="nav-link {{ Request::is('incoterms*') ? 'active' : '' }}">
                                    <i class="fa fa-i text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Incoterms</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-jobtype')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('job_type.index') }}"
                                    class="nav-link {{ Request::is('job_type*') ? 'active' : '' }}">
                                    <i class="fa fa-j text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Job Type</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-party_type')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('party_type.index') }}"
                                    class="nav-link {{ Request::is('party_type*') ? 'active' : '' }}">
                                    <i class="fa fa-p text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Party Type</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-pay_term')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('pay_term.index') }}"
                                    class="nav-link {{ Request::is('pay_term*') ? 'active' : '' }}">
                                    <i class="fa fa-p text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Payment Term</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-salesman')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('salesman.index') }}"
                                    class="nav-link {{ Request::is('salesman*') ? 'active' : '' }}">
                                    <i class="fa fa-s text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Salesman</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-port')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('port.index') }}"
                                    class="nav-link {{ Request::is('port*') ? 'active' : '' }}">
                                    <i class="fa fa-s text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Sea Port</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-shipline')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('shipline.index') }}"
                                    class="nav-link {{ Request::is('shipline*') ? 'active' : '' }}">
                                    <i class="fa fa-s text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Shipping Line</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-uom')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('uom.index') }}"
                                    class="nav-link {{ Request::is('uom*') ? 'active' : '' }}">
                                    <i class="fa fa-u text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Unit Of Measurement</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-vat')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('vat_code.index') }}"
                                    class="nav-link {{ Request::is('vat_code*') ? 'active' : '' }}">
                                    <i class="fa fa-v text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">VAT Code</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-vessel')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('vessel.index') }}"
                                    class="nav-link {{ Request::is('vessel*') ? 'active' : '' }}">
                                    <i class="fa fa-v text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Vessel</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-wt_code')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('wt_code.index') }}"
                                    class="nav-link {{ Request::is('wt_code*') ? 'active' : '' }}">
                                    <i class="fa fa-w text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Withholding Tax</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission

                    </ul>
                </div>
            </li>

            {{-- MENU SETTINGS --}}
            <li class="nav-item ">
                <a aria-expanded="{{ Request::is('profile*') || Request::is('users*') || Request::is('modules*') || Request::is('permissions*') || Request::is('roles*') || Request::is('company*') || Request::is('sys_numbering*') ? 'true' : 'false' }}"
                    data-toggle="collapse" data-target="#collapseShow4" class="sidebar-menu-item nav-link ">
                    <div><span class="nav-link-text text-uppercase text-xs font-weight-bolder">Settings <b
                                class="caret"></b></span></div>
                </a>
                <div class="collapse {{ Request::is('profile*') || Request::is('users*') || Request::is('modules*') || Request::is('permissions*') || Request::is('roles*') || Request::is('company*') || Request::is('sys_numbering*') ? 'show' : '' }}"
                    id="collapseShow4">
                    <ul class="nav nav-sm flex-column">
                        @permission('manage-company')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('company') }}"
                                    class="nav-link {{ Request::is('company*') ? 'active' : '' }}">
                                    <i class="fa fa-c text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Company Profile</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-module')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('modules.index') }}"
                                    class="nav-link {{ Request::is('modules*') ? 'active' : '' }}">
                                    <i class="fa fa-m text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Module</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-profile')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('profile') }}"
                                    class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                                    <i class="fa fa-p text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Profile</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-permission')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('permissions.index') }}"
                                    class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                                    <i class="fa fa-p text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Permissions</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-role')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('roles.index') }}"
                                    class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                                    <i class="fa fa-r text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">Roles</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-sys_numbering')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('sys_numbering.index') }}"
                                    class="nav-link {{ Request::is('sys_numbering*') ? 'active' : '' }}">
                                    <i class="fa fa-s text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">System Numbering</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                        @permission('manage-user')
                            <li class="nav-item">
                                <!---->
                                <div class="collapse ">
                                    <ul class="nav nav-sm flex-column"></ul>
                                </div> <a href="{{ route('users.index') }}"
                                    class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                                    <i class="fa fa-u text-primary text-sm opacity-10"></i>
                                    <div>
                                        <span class="nav-link-text">User Management</span>
                                    </div>
                                </a>
                                <ul class="navbar-nav"></ul>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>

        </ul>
    </div>

</aside>
