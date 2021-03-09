@extends('standard.layout')

@section('title', 'new employee')

@section('content')  
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{$message}}</strong> 
    </div>
@endif

@if ($message = Session::get('destroy'))
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{$message}}</strong> 
    </div>
@endif
@if (count($errors) > 0)
    <div class = "alert alert-danger fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="intro-y flex items-center mt-8">
            <h4 class="leading-none">Create Fuel Transaction</h4>
        </div>
        <div class="intro-y box">
            <div class="p-5">
                <form action="{{route('fuel.transaction.update', $fuel->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4 gap-y-5">
                        <div class="intro-y col-span-3">
                            <label>Company</label>
                            <div class="mt-2">
                                <select onchange="company_change(this)" name="company_id"  data-search="true" class="tail-select w-full" required="required">
                                    @foreach($company as $temp)
                                        @if($fuel->company_id == $temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Item</label>
                            <div class="mt-2">
                                <select data-search="true" name="item_id" data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($item as $temp)
                                        @if($fuel->item_id == $temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Storage</label>
                            <div class="mt-2" id="storage">
                                <select name="storage_id"  data-search="true" class="tail-select w-full" required="required">
                                    <option>Select</option>
                                    @foreach($storage as $temp)
                                        @if($fuel->storage_id == $temp->id)
                                        <option value="{{$temp->id}}" selected>{{$temp->title}}</option>
                                        @else
                                        <option value="{{$temp->id}}">{{$temp->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Remaining Fuel</label>
                            <input type="text" name="remaining" value="{{$fuel->remaining}}" class="input w-full border mt-2" placeholder="title">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Capacity</label>
                            <input type="text" name="capacity" value="{{ $fuel->capacity}}" class="input w-full border mt-2" placeholder="title">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>MIN</label>
                            <input type="text" name="min" value="{{ $fuel->min}}" class="input w-full border mt-2" placeholder="title">
                        </div>
                        <div class="intro-y col-span-3">
                            <label>MAX</label>
                            <input type="text" name="max" value="{{ $fuel->max}}" class="input w-full border mt-2" placeholder="title">
                        </div>
                        <div class="col-span-12 sm:col-span-12 xl:col-span-12">
                            <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-9 text-white" style="float:right;">{{ trans('employee.submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Content -->
</div>
@endsection
@section('script')
<link rel="stylesheet" href="{{ asset('dist/css/template.css')}}">
<link rel="stylesheet" href="{{ asset('dist/css/select2.min.css')}}" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
    $(function() {
        $( "#DateInput" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

    function applySelect2() {
        var lll = $(".js-example-basic-single");
        console.log(lll.length);
        $(".js-example-basic-single").select2();
    }
    $(function() {
        $( "#DateInput" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    function company_change(e){
        $.ajax({
            type:'POST',
            url:'/fuel/get_storage',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "company_id" : e.value},
            success: function(data){
                $("#storage").html("");
                $("#storage").append(data);
            }
        });
        
    }
</script>
@endsection