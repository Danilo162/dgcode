@extends('consoles::layouts.main')
@section('content')

    <div class="row ">
        <div class="col-lg-4">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <p class="mb-0">Bienvenue</p>
                            <div class="row">
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-9">

{{--                                    <h6 class="">{{auth()->user()->name}}</h6>
                                    <p class="text-success mb-0 font-13">{{$isWorkToDay->role??''}}</p>
                                    <p class="mb-0 ">Agence : <span class="text-primary font-14"> @if($isWorkToDay) <strong> {{$isWorkToDay->agence}}</strong> @endif</span> </p>--}}

                                </div>
                            </div>



                        </div>
                        {{--  <div class="widgets-icons bg-gradient-cosmic text-white"><i class="bx bx-refresh"></i>
                          </div>--}}
                    </div>
                </div>
            </div>

        </div>



    </div>


@endsection
