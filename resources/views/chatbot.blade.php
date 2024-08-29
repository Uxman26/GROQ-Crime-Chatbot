@extends('layout')
@section('content')
    <style>
        .btn-custom {
            background-color: #337ab7;
            border-color: #2e6da4;
        }

        .btn-custom:hover {
            background-color: #23527c;
            border-color: #1d4e7a;
        }
    </style>
    <div class="container my-5">
        <h1 class="text-center text-white">Case Analysis Chatbot</h1>
        <form id="chat-form" action="{{ route('chatbot.analyze') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="case-details" class="col-form-label text-white">Enter Case Details:</label>
                <textarea class="form-control bg-light" id="case-details" name="case_details" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg mt-3 btn-custom">Analyze Case</button>
        </form>
        <div id="output" class="mt-5">
            @if (isset($summary))
                <div class="card">
                    <div class="card-body bg-light rounded">
                        <h3 class="card-title text-black text-center"><b>Case Summary & Relevant Articles/Sections</b></h3>
                        <p class="card-text"> {!! nl2br(e($summary)) !!}</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
