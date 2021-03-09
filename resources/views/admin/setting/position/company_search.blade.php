    @foreach($position as $temp)
    <div class="intro-y col-span-12 md:col-span-6">
        <div class="box">
            <div class="flex flex-col lg:flex-row items-center p-1 border-b border-gray-200 dark:border-dark-5">
                <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1 pt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mx-auto"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <div class="lg:ml-2 lg:mr-auto lg:text-left mt-3 lg:mt-0">
                    <a href="" class="font-medium">{{$temp->title}}</a> 
                    <div class="text-gray-600 text-xs mt-0.5">Department: {{$temp->department->title}}</div>
                    <div class="text-gray-600 text-xs mt-0.5">Company:  {{$temp->company->title}}</div>
                </div>
                <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-2 lg:mt-0 mr-5">
                    <div class="font-medium">Vacancy</div> 
                    <button type="button" style="border-color:gray !important" class="pl-3 pr-3 button button--sm text-gray-700 border border-gray-300 gray:border-gray-5 gray:text-gray-300">
                        {{$temp->employee_number($temp->id)}}/{{$temp->timeoff_employee($temp->id)}}
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-1">
                <div class="w-full lg:w-1/2 mb-4 lg:mb-0 mr-auto mt-2">
                    <div class="flex text-gray-600 text-xs">
                        <div class="mr-auto">Vacancy Completion</div>
                        <div> {{$temp->percent($temp->id)}}%</div>
                    </div>
                    <div class="w-full h-1 mt-2 bg-gray-400 dark:bg-dark-1 rounded-full">
                        <div style="width:{{$temp->percent($temp->id)}}%" class="w-1/2 h-full {{($temp->timeoff_employee($temp->id)==0)?'':'bg-theme-1'}} dark:bg-theme-10 rounded-full"></div>
                    </div>
                </div>
                <button class="button button--sm text-white bg-theme-1 mr-2">View Workers</button>
                <a href="{{ route('setting.position.edit',$temp->id)}}"><button class="button button--sm text-white bg-theme-1 mr-2">Edit</button></a>
                <a href="{{ route('setting.position.destroy', $temp->id)}}" onclick="return confirm('Really?');"><button class="button button--sm text-white bg-theme-6 ">Delete</button></a>
            </div>
        </div>
    </div>
    @endforeach
