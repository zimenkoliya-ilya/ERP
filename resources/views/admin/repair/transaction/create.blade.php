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
            <h4 class="leading-none">Create Replacement Transaction</h4>
        </div>
        <div class="intro-y box">
            <div class="p-5">
                <form action="{{route('repair.transaction.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-12 gap-4 gap-y-5" id="new_form">
                        <div class="intro-y col-span-3">
                            <label>Company</label>
                            <div class="mt-2">
                                <select onchange="company_change(this)" name="company_id"  data-search="true" class="tail-select w-full" required="required">
                                    @foreach($company as $temp)
                                    <option value="{{$temp->id}}">{{$temp->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Journal</label>
                            <div class="mt-2">
                                <select name="journal_id"  data-search="true" class="tail-select w-full" required="required">
                                    @foreach($journal as $temp)
                                    <option value="{{$temp->id}}">{{$temp->date}}/{{$temp->customer->customer_name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>
                        <div class="intro-y col-span-3">
                            <label>Repair</label>
                            <div class="mt-2">
                                <select name="repair_id"  data-search="true" class="tail-select w-full" required="required">
                                    @foreach($repair as $temp)
                                        <option value="{{$temp->id}}">{{$temp->customer->customer_name}}/{{$temp->employee->first_name}}</option>
                                    @endforeach
                                </select>
                            </div> 
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
            url:'/repair/transaction/get_data',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "company_id" : e.value},
            success: function(data){
                $("#new_form").html("");
                $("#new_form").append(data);
            }
        });
    }
</script>
@endsection