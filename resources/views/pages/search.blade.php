@extends('layouts.app')

@section('title', 'Search results')

@section('content')

<div class="container" id="searchContainer">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action active d-flex justify-content-between align-items-center">
                    Events
                    <span class="badge badge-light badge-pill">{{ sizeof($events) }}</span>
                </button>
                <button type="button" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Users
                    <span class="badge badge-light badge-pill">{{ sizeof($members) }}</span>
                </button>
            </div>
        </div>
        <div class="col-md-9">
            <div>
                <div class="justify-content-between d-flex pb-2">
                    <h5 class="align-self-center"> @if($type == "event") {{ sizeof($events) }} @elseif($type == "member") {{ sizeof($members) }} @endif result(s) found for "{{ $query }}"</h5>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-outline-primary active">
                            <i class="fas fa-sort-amount-down"></i>
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fas fa-sort-amount-up"></i>
                        </button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by&nbsp;</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#">People Going</a>
                                <a class="dropdown-item" href="#">Date</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group">
                    @foreach($events as $event)
                    <a href="/event/{{ $event->id }}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $event->title }}</h5>
                            <small class="text-muted">{{ $event->date }}</small>
                        </div>
                        <p class="mb-1">{{ $event->description }}</p>
                        <small>{{ $event->visibility }}.</small>
                        <small class="text-muted">28 people going.</small>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection