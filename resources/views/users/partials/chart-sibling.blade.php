<div class="panel panel-default table-responsive">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th style="width: 35%">{{ trans('user.siblings') }}</th>
                <th class="text-center" colspan="{{ $sibling->childs->count() }}">
                    @if($sibling->photo_path)
                <!--        <img src="{{ asset('storage/' . $sibling->photo_path) }}" class="person-photo" alt="Photo"><br>
                -->    @endif
                    {{ $sibling->profileLink('chart') }} ({{ $sibling->gender }})
                    @if($sibling->couples->isNotEmpty())
                        <br>
                        <small>{{ trans('user.spouse') }}:
                        @foreach($sibling->couples as $spouse)
                            @if($spouse->photo_path)
                <!--                <img src="{{ asset('storage/' . $spouse->photo_path) }}" class="person-photo" alt="Photo"><br>
                -->            @endif
                            {{ $spouse->profileLink('chart') }}
                            @if($spouse->pivot->marriage_date)
                                ({{ Carbon\Carbon::parse($spouse->pivot->marriage_date)->format('Y') }})
                            @endif
                            @if(!$loop->last), @endif
                        @endforeach
                        </small>
                    @endif
                </th>
            </tr>
            <tr>
                <th>{{ trans('user.nieces') }} & {{ trans('user.grand_childs') }}</th>
                <td>
                    <ol style="padding-left: 15px">
                        @foreach($sibling->childs as $child)
                        <li style="margin-top: 10px;">
                            @if($child->photo_path)
                    <!--            <img src="{{ asset('storage/' . $child->photo_path) }}" class="person-photo" alt="Photo"><br>
                     -->       @endif
                            {{ $child->profileLink('chart') }} ({{ $child->gender }})
                            @if($child->couples->isNotEmpty())
                                <br>
                                <small>{{ trans('user.spouse') }}:
                                @foreach($child->couples as $spouse)
                                    @if($spouse->photo_path)
                        <!--                <img src="{{ asset('storage/' . $spouse->photo_path) }}" class="person-photo" alt="Photo"><br>
                        -->            @endif
                                    {{ $spouse->profileLink('chart') }}
                                    @if($spouse->pivot->marriage_date)
                                        ({{ Carbon\Carbon::parse($spouse->pivot->marriage_date)->format('Y') }})
                                    @endif
                                    @if(!$loop->last), @endif
                                @endforeach
                                </small>
                            @endif
                            <ul style="padding-left: 18px">
                                @foreach($child->childs as $grand)
                                <li>
                                    @if($grand->photo_path)
                        <!--                <img src="{{ asset('storage/' . $grand->photo_path) }}" class="person-photo" alt="Photo"><br>
                        -->            @endif
                                    {{ $grand->profileLink('chart') }} ({{ $grand->gender }})
                                    @if($grand->couples->isNotEmpty())
                                        <br>
                                        <small>{{ trans('user.spouse') }}:
                                        @foreach($grand->couples as $spouse)
                                            @if($spouse->photo_path)
                         <!--                       <img src="{{ asset('storage/' . $spouse->photo_path) }}" class="person-photo" alt="Photo"><br>
                         -->                   @endif
                                            {{ $spouse->profileLink('chart') }}
                                            @if($spouse->pivot->marriage_date)
                                                ({{ Carbon\Carbon::parse($spouse->pivot->marriage_date)->format('Y') }})
                                            @endif
                                            @if(!$loop->last), @endif
                                        @endforeach
                                        </small>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>
</div>
