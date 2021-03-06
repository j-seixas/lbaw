@extends('layouts.app') 

@section('title', $member->name) 

@section('content')

<div class="container pr-null pb-null pl-null pt-3">
        <div class="row">
            <div class="col-md-7 mb-3 pl-0 pr-0">
                <div class="card position-relative m-auto " id="profile">
                    <div class="card-body">
                        @if($isOwner)
                        <button type="button" id="memberEditButton" class="btn btn-outline-primary float-right">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        @else
                        @if(Auth::check())
                        @unless(in_array($auth,$friends))
                        <button type="button" id="addFriendButton" class="btn btn-outline-primary float-right">
                            <i class="fas fa-user-plus"></i>
                        </button>
                        @endunless
                        @endif
                        @endif
                        <input hidden name="memberId" value="{{ $member->id }}">
                        <h4 class="card-title" id="memberName">{{ $member->name }}</h4>
                        <h6 class="card-subtitle text-muted">{{ $member->age }} years old</h6>
                    </div>
                    <img style="width: 100%; display: block;" src="@if($member->image) {{ Storage::url($member->image) }} @else {{ asset('img/person_placeholder.png') }} @endif" alt="Profile picture">
                    <div class="card-body ">
                        @if($member->description)
                        <p class="card-text" id="memberDescription">{{ $member->description }}</p>
                        @else
                        <p class="font-italic text-muted mb-0 empty" id="memberDescription">No description provided yet...</p>
                        @endif
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if($country)
                            <p class="card-text" id="memberCountry">{{ $country->name }}</p>
                            @else
                            <p class="font-italic text-muted mb-0 empty" id="memberCountry">This individual resides nowhere...</p>
                            @endif
                        </li>
                        <li class="list-group-item">
                            @unless(sizeof($tags))
                            <p class="text-muted font-italic mb-0 empty" id="memberTags">Tags are missing. You should call the tag police!</p>
                            @endunless
                            @foreach($tags as $tag)
                            <span style="font-size: 1rem;"> </span>
                            <span class="badge badge-pill badge-primary">{{ $tag->name_tag }}</span>
                            @endforeach
                        </li>
                    </ul>
                    <div class="card-footer">
                        <a href="tel:{{ $member->contact }}" class="card-link">Contact</a>
                        <a href="mailto:{{ $member->email }}" class="card-link">Email</a>
                    </div>
                </div>
                @if($isOwner)
                <div hidden id="deleteMemberCard" class="card border-danger mt-3 position-relative" style="margin: auto;
    max-width: 30em;">
                    <div class="text-danger card-body w-100">
                        <h4 class="card-title">Danger Zone</h4>
                        <div class="alert alert-danger" role="alert">Be careful, deleting your account will permanently erase all of your information, events and friends,
                            have this in mind when you walk out the plank :'(</div>
                        <button id="deleteMemberButton" type="button" class="btn btn-outline-danger">Delete account</button>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-5 ">
                <div class="card">
                    <h5 class="card-header ">Friends</h5>
                    <ul class="list-group list-group-flush">
                        @if (sizeof($friends) == 0)
                        <li class="list-group-item p-0 pt-0 pb-0">
                            <div class="media m-2">
                                <div class="media-body mb-0">
                                    <p class="pl-2 mb-0 mt-1 text-muted font-italic">
                                        No one is here...
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endif
                        @foreach ($friends as $friend)
                        <li class="list-group-item p-0 pt-0 pb-0">
                            <div class="media m-2">
                                <img class="d-flex m-auto rounded-circle" src="@if($friend->image) {{ Storage::url($friend->image) }} @else {{ asset('img/person_placeholder.png') }} @endif" alt="Pic" style="width: 32px; height: 32px;">
                                <div class="media-body mb-0">
                                    <p class="pl-2 mb-0 mt-1">
                                        @if ($isOwner)
                                        <button type="button" class="btn btn-outline-danger float-right d-inline-block btn-sm deleteFriendButton">
                                            <i class="fas fa-user-times"></i>
                                        </button>
                                        @endif
                                        <a href="/profile/{{ $friend->id }}">{{ $friend->name }}</a>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection