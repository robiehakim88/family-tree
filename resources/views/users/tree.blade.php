@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))

@section('user-content')

<?php
$childsTotal = 0;
$grandChildsTotal = 0;
$ggTotal = 0;
$ggcTotal = 0;
$ggccTotal = 0;
$udhegTotal = 0;
?>

<div id="wrapper">
    <span class="label">
        {{ link_to_route('users.tree', $user->name, [$user->id], ['title' => $user->name.' ('.$user->gender.')']) }} <br>
        @if($user->gender_id == 1)
            @foreach($user->wifes as $wife)
                {{ link_to_route('users.show', $wife->name, [$wife->id], ['title' => 'Istri']) }}
                @if(!$loop->last), @endif
            @endforeach
        @else
            @foreach($user->husbands as $husband)
                {{ link_to_route('users.show', $husband->name, [$husband->id], ['title' => 'Suami']) }}
                @if(!$loop->last), @endif
            @endforeach
        @endif
    </span>
    @if ($childsCount = $user->childs->count())
    <?php $childsTotal += $childsCount ?>
    <div class="branch lv1">
        @foreach($user->childs as $child)
        <div class="entry {{ $childsCount == 1 ? 'sole' : '' }}">
            <span class="label">
                {{ link_to_route('users.tree', $child->name, [$child->id], ['title' => $child->name.' ('.$child->gender.')']) }} <br>
                @if($child->gender_id == 1)
                    @foreach($child->wifes as $wife)
                        {{ link_to_route('users.show', $wife->name, [$wife->id], ['title' => 'Istri']) }}
                        @if(!$loop->last), @endif
                    @endforeach
                @else
                    @foreach($child->husbands as $husband)
                        {{ link_to_route('users.show', $husband->name, [$husband->id], ['title' => 'Suami']) }}
                        @if(!$loop->last), @endif
                    @endforeach
                @endif
            </span>
            @if ($grandsCount = $child->childs->count())
            <?php $grandChildsTotal += $grandsCount ?>
            <div class="branch lv2">
                @foreach($child->childs as $grand)
                <div class="entry {{ $grandsCount == 1 ? 'sole' : '' }}">
                    <span class="label">
                        {{ link_to_route('users.tree', $grand->name, [$grand->id], ['title' => $grand->name.' ('.$grand->gender.')']) }} <br>
                        @if($grand->gender_id == 1)
                            @foreach($grand->wifes as $wife)
                                {{ link_to_route('users.show', $wife->name, [$wife->id], ['title' => 'Istri']) }}
                                @if(!$loop->last), @endif
                            @endforeach
                        @else
                            @foreach($grand->husbands as $husband)
                                {{ link_to_route('users.show', $husband->name, [$husband->id], ['title' => 'Suami']) }}
                                @if(!$loop->last), @endif
                            @endforeach
                        @endif
                    </span>
                    @if ($ggCount = $grand->childs->count())
                    <?php $ggTotal += $ggCount ?>
                    <div class="branch lv3">
                        @foreach($grand->childs as $gg)
                        <div class="entry {{ $ggCount == 1 ? 'sole' : '' }}">
                            <span class="label">
                                {{ link_to_route('users.tree', $gg->name, [$gg->id], ['title' => $gg->name.' ('.$gg->gender.')']) }} <br>
                                @if($gg->gender_id == 1)
                                    @foreach($gg->wifes as $wife)
                                        {{ link_to_route('users.show', $wife->name, [$wife->id], ['title' => 'Istri']) }}
                                        @if(!$loop->last), @endif
                                    @endforeach
                                @else
                                    @foreach($gg->husbands as $husband)
                                        {{ link_to_route('users.show', $husband->name, [$husband->id], ['title' => 'Suami']) }}
                                        @if(!$loop->last), @endif
                                    @endforeach
                                @endif
                            </span>
                            @if ($ggcCount = $gg->childs->count())
                            <?php $ggcTotal += $ggcCount ?>
                            <div class="branch lv4">
                                @foreach($gg->childs as $ggc)
                                <div class="entry {{ $ggcCount == 1 ? 'sole' : '' }}">
                                    <span class="label">
                                        {{ link_to_route('users.tree', $ggc->name, [$ggc->id], ['title' => $ggc->name.' ('.$ggc->gender.')']) }} <br>
                                        @if($ggc->gender_id == 1)
                                            @foreach($ggc->wifes as $wife)
                                                {{ link_to_route('users.show', $wife->name, [$wife->id], ['title' => 'Istri']) }}
                                                @if(!$loop->last), @endif
                                            @endforeach
                                        @else
                                            @foreach($ggc->husbands as $husband)
                                                {{ link_to_route('users.show', $husband->name, [$husband->id], ['title' => 'Suami']) }}
                                                @if(!$loop->last), @endif
                                            @endforeach
                                        @endif
                                    </span>
                                    @if ($ggccCount = $ggc->childs->count())
                                    <?php $ggccTotal += $ggccCount ?>
                                    <div class="branch lv5">
                                        @foreach($ggc->childs as $ggcc)
                                        <div class="entry {{ $ggccCount == 1 ? 'sole' : '' }}">
                                            <span class="label">
                                                {{ link_to_route('users.tree', $ggcc->name, [$ggcc->id], ['title' => $ggcc->name.' ('.$ggcc->gender.')']) }} <br>
                                                @if($ggcc->gender_id == 1)
                                                    @foreach($ggcc->wifes as $wife)
                                                        {{ link_to_route('users.show', $wife->name, [$wife->id], ['title' => 'Istri']) }}
                                                        @if(!$loop->last), @endif
                                                    @endforeach
                                                @else
                                                    @foreach($ggcc->husbands as $husband)
                                                        {{ link_to_route('users.show', $husband->name, [$husband->id], ['title' => 'Suami']) }}
                                                        @if(!$loop->last), @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                            @if ($udhegCount = $ggcc->childs->count())
                                            <?php $udhegTotal += $udhegCount ?>
                                            <div class="branch lv6">
                                                @foreach($ggcc->childs as $udheg)
                                                <div class="entry {{ $udhegCount == 1 ? 'sole' : '' }}">
                                                    <span class="label">
                                                        {{ link_to_route('users.tree', $udheg->name, [$udheg->id], ['title' => $udheg->name.' ('.$udheg->gender.')']) }} <br>
                                                        @if($udheg->gender_id == 1)
                                                            @foreach($udheg->wifes as $wife)
                                                                {{ link_to_route('users.show', $wife->name, [$wife->id], ['title' => 'Istri']) }}
                                                                @if(!$loop->last), @endif
                                                            @endforeach
                                                        @else
                                                            @foreach($udheg->husbands as $husband)
                                                                {{ link_to_route('users.show', $husband->name, [$husband->id], ['title' => 'Suami']) }}
                                                                @if(!$loop->last), @endif
                                                            @endforeach
                                                        @endif
                                                    </span>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</div>

<div class="container">
    <hr>
    <div class="row">
        @if ($childsTotal)
        <div class="col-md-1 text-right">{{ trans('app.child_count') }}</div>
        <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $childsTotal }}</strong></div>
        @endif
        @if ($grandChildsTotal)
        <div class="col-md-1 text-right">{{ trans('app.grand_child_count') }}</div>
        <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $grandChildsTotal }}</strong></div>
        @endif
        @if ($ggTotal)
        <div class="col-md-1 text-right">Jumlah Cicit</div>
        <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggTotal }}</strong></div>
        @endif
        @if ($ggcTotal)
        <div class="col-md-1 text-right">Jumlah Canggah</div>
        <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggcTotal }}</strong></div>
        @endif
        @if ($ggccTotal)
        <div class="col-md-1 text-right">Jumlah Wareng</div>
        <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $ggccTotal }}</strong></div>
        @endif
        @if ($udhegTotal)
        <div class="col-md-1 text-right">Jumlah Udheg2</div>
        <div class="col-md-1 text-left"><strong style="font-size:30px">{{ $udhegTotal }}</strong></div>
        @endif
    </div>
</div>
@endsection

@section ('ext_css')
<link rel="stylesheet" href="{{ asset('css/tree.css') }}">
@endsection
