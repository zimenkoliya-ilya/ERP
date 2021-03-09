 <!-- BEGIN: Mobile Menu -->
 <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6 profile_image_size" src="{{ asset('img/logo/logo.png')}}">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="{{route('home')}}" class="menu menu--active">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
                <!-- employees -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="edit"></i> </div>
                        <div class="menu__title">
                            Employees 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{route('home')}}" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Employee List </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-crud-form.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Quit working employee list </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-crud-form.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Recruitment List </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end employee -->

                <!-- time off -->
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Time Off </div>
                    </a>
                </li>
                <!-- end time off -->

                <!-- time sheet -->
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Time Sheet </div>
                    </a>
                </li>
                <!-- end time sheet -->
                
                <!-- camp -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="trello"></i> </div>
                        <div class="menu__title">
                            Camp management 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="menu-light-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Log list </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Camp list </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Room list </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Bed list </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end camp -->

                <!-- Equipments -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="layout"></i> </div>
                        <div class="menu__title">
                            Equipments 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title">
                                    Technic List 
                                    <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end Equipments -->

                <!-- repair -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="layout"></i> </div>
                        <div class="menu__title">
                            Repair 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title">
                                    Repair List 
                                    <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title">
                                    Replacement transactions 
                                    <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end repair -->
                
                <!-- Fuel -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="layout"></i> </div>
                        <div class="menu__title">
                            Fuel 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title">
                                    Fuel transaction list 
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end Fuel -->

                <!-- Warehouse -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="trello"></i> </div>
                        <div class="menu__title">
                            Warehouse 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="menu-light-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Warehouse transactions </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Item list </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Item type </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Item measurement </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Customers </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Storages </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Category </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Order </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end Warehouse -->

                <!-- Transportation -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="layout"></i> </div>
                        <div class="menu__title">
                            Transportation 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title">
                                    Job list
                                    <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title">
                                    Job types
                                    <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title">
                                    Locations
                                    <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end Transportation -->

                <!-- Manufacturing -->
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="trello"></i> </div>
                        <div class="menu__title">
                            Manufacturing 
                            <div class="menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="menu-light-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Product order </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Products </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Product category </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Order category </div>
                            </a>
                        </li>
                        <li>
                            <a href="menu-light-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="menu__title"> Material list </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end Manufacturing -->
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
           
            <nav class="side-nav">
                <a href="{{route('home')}}" class="intro-x flex items-center pt-2">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6 profile_image_size" src="{{ asset('img/logo/logo.png')}}">
                    <!-- <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span> -->
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{route('home')}}" class="side-menu {{ ($active=='dashboard')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> {{ trans('sidebartop.dashboard')}} </div>
                        </a>
                    </li>
                    <!-- employees -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($sidebar_active=='employee')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.employees')}} 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($sidebar_active=='employee')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{route('employee_list')}}" class="side-menu {{ ($active=='employee_list')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.employee_list')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('employee_quick_working')}}" class="side-menu {{ ($active=='employee_quick_working')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="user-x"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.quick_working')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('employee_recruitment_list')}}" class="side-menu {{ ($active=='employee_recruitment_list')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="user-plus"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.recruiment_list')}}  </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end employee -->

                    <!-- time off -->
                    <li>
                        <a href="{{ route('timeoff')}}" class="side-menu {{ ($active=='timeoff')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                            <div class="side-menu__title"> {{ trans('sidebartop.timeoff')}}  </div>
                        </a>
                    </li>
                    <!-- end time off -->

                    <!-- time sheet -->
                    <li>
                        <a href="{{ route('timesheet')}}" class="side-menu {{ ($active=='timesheet')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="clock"></i> </div>
                            <div class="side-menu__title"> {{ trans('sidebartop.timesheet')}}  </div>
                        </a>
                    </li>
                    <!-- end time sheet -->
                    
                    <!-- camp -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='camp')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="framer"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.camp_management')}} 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='camp')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{ route('camp_loglist')}}" class="side-menu {{ ($sidebar_active=='camp_loglist')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.camp_management_log_list')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('camp_camplist')}}" class="side-menu {{ ($sidebar_active=='camp_camplist')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.camp_management_camp_list')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('camp_roomlist')}}" class="side-menu {{ ($sidebar_active=='camp_roomlist')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.camp_management_room_list')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('camp_bedlist')}}" class="side-menu {{ ($sidebar_active=='camp_bedlist')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.camp_management_bed_list')}}  </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end camp -->

                    <!-- Equipments -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='equipment')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="codepen"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.equipment')}} 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='equipment')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{ route('equipment_technic_list')}}" class="side-menu {{ ($sidebar_active=='equipment_technic_list')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title">
                                        {{ trans('sidebartop.equipment_technic_list')}} 
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Equipments -->

                    <!-- repair -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='repair')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="tool"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.repair')}} 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='repair')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{ route('repair_list')}}" class="side-menu {{ ($sidebar_active=='repair_list')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title">
                                        {{ trans('sidebartop.repair_list')}} 
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('repair_replacement')}}" class="side-menu {{ ($sidebar_active=='repair_replacement')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title">
                                        {{ trans('sidebartop.repair_replacement_transactions')}} 
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end repair -->
                    
                    <!-- Fuel -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='fuel')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="droplet"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.fuel')}} 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='fuel')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{ route('fuel.transaction')}}" class="side-menu {{ ($sidebar_active=='fuel_transaction')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title">
                                        {{ trans('sidebartop.fuel_transaction_list')}} 
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Fuel -->
                    
                    <!-- file management -->
                    <li>
                        <a href="{{route('file_management.index')}}" class="side-menu {{ ($active=='file_management')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="folder"></i> </div>
                            <div class="side-menu__title">
                                File Management 
                            </div>
                        </a>
                    </li>
                    <!-- end file management -->
                    <!-- Health -->
                    <li>
                        <a href="{{route('health.index')}}" class="side-menu {{ ($active=='health')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="minimize"></i> </div>
                            <div class="side-menu__title">
                                HSE Daily Report
                            </div>
                        </a>
                    </li>
                    <!-- End Health -->
                    <!-- Warehouse -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='warehouse')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.warehouse')}} 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='warehouse')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{route('warehouse.transaction')}}" class="side-menu {{ ($sidebar_active=='warehouse_transaction')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_transactions')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('warehouse.item')}}" class="side-menu {{ ($sidebar_active=='warehouse_items')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_item_list')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('warehouse.item_type')}}" class="side-menu {{ ($sidebar_active=='warehouse_item_types')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_item_type')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('warehouse.measurement')}}" class="side-menu {{ ($sidebar_active=='warehouse_measurements')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_item_measurement')}}  </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('warehouse.customer')}}" class="side-menu {{ ($sidebar_active=='warehouse_customers')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_customers')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('warehouse.storage')}}" class="side-menu {{ ($sidebar_active=='warehouse_storages')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_storages')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('warehouse.category')}}" class="side-menu {{ ($sidebar_active=='warehouse_categorys')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_category')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('warehouse.order')}}" class="side-menu {{ ($sidebar_active=='warehouse_orders')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.warehouse_order')}} </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Warehouse -->

                    <!-- Transportation -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='transportation')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="truck"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.transportation')}} 
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='transportation')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{ route('transportation.list')}}" class="side-menu {{ ($sidebar_active=='transportation_list')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title">
                                        {{ trans('sidebartop.transportation_job_list')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('transportation.type')}}" class="side-menu {{ ($sidebar_active=='transportation_type')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title">
                                        {{ trans('sidebartop.transportation_job_type')}}
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('transportation.location')}}" class="side-menu {{ ($sidebar_active=='transportation_location')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title">
                                        {{ trans('sidebartop.transportation_locations')}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Transportation -->

                    <!-- Manufacturing -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='manufacturing')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="trello"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.manufacturing')}}
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='manufacturing')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{ route('manufacture.product_order.index')}}" class="side-menu {{ ($sidebar_active=='manufacturing_product_number')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.manufacturing_product_order')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('manufacture.product.index')}}" class="side-menu {{ ($sidebar_active=='manufacturing_products')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.manufacturing_products')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('manufacture.category.index')}}" class="side-menu {{ ($sidebar_active=='manufacturing_product_category')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.manufacturing_product_category')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('manufacture.order_category.index')}}" class="side-menu {{ ($sidebar_active=='manufacturing_order_category')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.manufacturing_order_category')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('manufacture.material.index')}}" class="side-menu {{ ($sidebar_active=='manufacturing_material_list')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Material List </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end Manufacturing -->
                    <!-- setting -->
                    <li>
                        <a href="javascript:;" class="side-menu {{ ($active=='setting')?'side-menu--active':''}}">
                            <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                            <div class="side-menu__title">
                                {{ trans('sidebartop.setting')}}
                                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul class="{{ ($active=='setting')?'side-menu__sub-open':''}}">
                            <li>
                                <a href="{{ route('setting.country')}}" class="side-menu {{ ($sidebar_active=='country')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_country')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.blood_type')}}" class="side-menu {{ ($sidebar_active=='blood_type')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_blood_type')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.education_type')}}" class="side-menu {{ ($sidebar_active=='education_type')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_education_type')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.department')}}" class="side-menu {{ ($sidebar_active=='department')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.department')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.family_type')}}" class="side-menu {{ ($sidebar_active=='family_type')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_family_type')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.position')}}" class="side-menu {{ ($sidebar_active=='position')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_position')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.make')}}" class="side-menu {{ ($sidebar_active=='make')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_make')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.model')}}" class="side-menu {{ ($sidebar_active=='model')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_model')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.owner_status')}}" class="side-menu {{ ($sidebar_active=='owner_status')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_owner_status')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.company')}}" class="side-menu {{ ($sidebar_active=='company')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_company')}} </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('setting.project')}}" class="side-menu {{ ($sidebar_active=='project')?'side-menu--active':''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> {{ trans('sidebartop.setting_project')}} </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- end setting -->
                </ul>
            </nav>
            <!-- END: Side Menu -->