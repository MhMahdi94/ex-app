@extends('layout.company')
@section('title')
Chart of Account
@endsection
@section('page_name')
Chart of Account Page
@endsection
@section('active_link')
<a href="#">Chart of Account</a>
@endsection
@section('active_content')
Chart of Account Page
@endsection
@section('content')
<div class="page-content">
<h1>{{ $title }}</h1>
    <p>{{ $date }}</p> 
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Account No</th>
            <th>Balance</th>
           
          </tr>
        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->account_name }}</td>
                                <td>{{ $item->account_no}}</td>
                                <td>{{ $item->account_balance}}</td>
                                
                            </tr> 
                        @endforeach
    </table>
</div>
    @endsection