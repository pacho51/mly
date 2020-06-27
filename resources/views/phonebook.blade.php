@extends('layouts.main')


@section('content')

<div class="container text-right content">




<div class="row d-flex justify-content-center my-2">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">רשימה</h4>
            </div>
            <div class="comment-widgets">
                @foreach ($clients as $client)
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2"><img src={{secure_asset('images/user-male.png')}} alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                    <h6 class="font-medium">{{$client->name}}</h6> <span class="m-b-15 d-block">{{$client->email}} </span>
                    <span class="m-b-15 d-block">{{$client->address->street}} {{$client->address->suite}}, {{$client->address->city}}</span>
                        <div class="comment-footer">
                            <button type="button" class="btn btn-cyan btn-sm">עריכה</button>

                            <button type="button" class="btn btn-danger btn-sm">מחק</button>
                        </div>
                    </div>
                </div>
                @endforeach
{{ $clients->links() }}
            </div>
        </div>
    </div>
</div>

</div>


@endsection
