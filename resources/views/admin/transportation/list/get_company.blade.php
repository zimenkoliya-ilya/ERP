
                        <div class="intro-y col-span-3">
                            <label>Date*</label>
                            <input type="date" name="date" value="{{ old('date')}}" id="DateInput" class="input w-full border mt-2 block" placeholder="Transaction Date" autocomplete="off" required="required">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Company</label>
                            <div class="mt-2">
                            <select onchange="company_change(this)" name="company_id"  data-search="true" class="js-example-basic-single w-full" required="required">
                                @foreach($company as $temp)
                                    @if($temp->id==$company_id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                    @else    
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Job Type</label>
                            <div class="mt-2">
                            <select data-search="true" name="job_type_id" data-search="true" class="js-example-basic-single w-full" required="required">
                                <option>Select</option>
                                @foreach($job_type as $temp)
                                <option value="{{$temp->id}}">{{$temp->title}}</option>
                                @endforeach
                            </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Technic</label>
                            <div class="mt-2">
                            <select name="technic_id" data-search="true" class="js-example-basic-single w-full" required="required">
                                <option>Select</option>
                                @foreach($technic as $temp)
                                <option value="{{$temp->id}}" {{($temp->status_id !== 1)?"disabled":''}}>
                                    {{$temp->make($temp->model_id)}}{{$temp->model->model}}/{{$temp->type->title}}{{($temp->plate_num!==null)?$temp->plate_num:''}}
                                </option>
                                @endforeach
                            </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Driver</label>
                            <div class="mt-2">
                            <select name="driver_id" data-search="true" class="js-example-basic-single w-full" required="required">
                                <option>Select</option>
                                @foreach($employee as $temp)
                                <option value="{{$temp->id}}">{{$temp->last_name}}{{$temp->first_name}}/{{$temp->interested_position->title}}</option>
                                @endforeach
                            </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Origin location</label>
                            <div class="mt-2">
                                <select name="origin_location_id" data-search="true" class="js-example-basic-single w-full" required="required">
                                    <option>Select</option>
                                    @foreach($location as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Transport Start Datetime</label>
                            <input type="datetime-local" name="start_date" value="{{ old('start_date')}}" class="mt-2 input w-56 border block mx-auto" data-single-mode="true">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Destination location</label>
                            <div class="mt-2">
                                <select name="destinc_location_id" data-search="true" class="js-example-basic-single w-full" required="required">
                                    <option>Select</option>
                                    @foreach($location as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3 mt-1">
                            <label>Scheduled Destination Datetime</label>
                            <input type="datetime-local" name="date" value="{{ old('destinc_date')}}" class="input w-56 border block mx-auto" data-single-mode="true">
                        </div>
                        <div class="intro-y col-span-3">
                            <label class = "mt-3">Status</label>
                            <div class="mt-2">
                                <select name="status_id" data-search="true" class="js-example-basic-single w-full" required="required">
                                    <option>Select</option>
                                    <option value="1">Scheduled</option>
                                    <option value="2">Active On Job</option>
                                </select>
                            </div> 
                        </div>
                        <div class="col-span-6 sm:col-span-6 xl:col-span-6 flex flex-col justify-end items-center">
                            <label>Description</label>
                            <input type="text" name="description" value="{{ old('description')}}" class="input w-full border mt-2" placeholder="title">
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-12">
                            <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
                        </div>
                        <script>
                        applySelect2();
                        </script>