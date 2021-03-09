@extends('standard.layout')

@section('title', 'employee list')

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

<div class="layout-px-spacing">
    <div class="intro-y flex items-center mt-8">
        <h5 class="text-2xl font-medium leading-none">Transaction</h5>
    </div>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ">
        <a href="{{route('warehouse.transaction.create')}}" class="mr-2"><button type="button" class="button text-white bg-theme-1 shadow-md mr-2">Add New</button></a>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                <th class="text-xs border-b-2 dark:border-dark-5">Date</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Storage</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Storage Related</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">&nbsp&nbsp&nbspItem&nbsp&nbsp&nbsp</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Journal type</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Type</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Quantity</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Unit price</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Total price</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Category</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Customer</th>
                                <th class="text-xs border-b-2 dark:border-dark-5 whitespace-nowrap">Company</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $k = 0;
                        foreach($journal_list as $journal) :
                            $k = $k + 1;
                        ?>
                            <tr>
                                <td>{{ $k }}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-theme-6" href="{{ route('warehouse.transaction.destroy', $journal->id)}}" onclick="return confirm('Delete Journal Entry?');"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                       </a>
                                    </div>
                                </td>
                                <td>{{ $journal->date }}</td>
                                <td>{{ $journal->storage_title }}</td>
                                <td>{{ $journal->related_storage_title }}</td>
                                <td>{{ $journal->barcode.' '.$journal->item_title }}</td>
                                <td>{{ $journal->journal_type_title }}</td>
                                <td>{{ $journal->type_title }}</td>
                                <td>{{ number_format($journal->quantity,2) }}</td>
                                <td>{{ number_format($journal->unit_price,2) }}</td>
                                <td>{{ number_format($journal->total_price,2) }}</td>
                                <td>{{ $journal->category_title }}</td>
                                <td>{{ $journal->customer_code.' '.$journal->customer_name }}</td>
                                <td>{{ $journal->company_title }}</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
    <script>
        function delete_check(e){
            
            var delete_item = document.getElementsByClassName("delete_item");
            var i = 0;
            if(e.checked==true){
                for(i=0;i<delete_item.length;i++){
                    delete_item[i].checked =true;
                    console.log(delete_item[i].checked);
                }
            }else{
                for(i=0;i<delete_item.length;i++){
                    delete_item[i].checked =false;
                    console.log(delete_item[i].checked);
                }                
            }
           
        }
    </script>
@endsection