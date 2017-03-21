@extends('backend.master')



@section('content')

    {{-- <div id="app">
        <example></example>
    </div> --}}


    <h4 class="ui horizontal divider">
        @if (Request::is('dashboard/applicants/statue/suspend'))
            معلقة
        @elseif (Request::is('dashboard/applicants/statue/active'))
            مفعلة
        @elseif (Request::is('dashboard/applicants/statue/in-progress'))
            جارى العمل
        @elseif (Request::is('dashboard/applicants/statue/done'))
            منتهية
        @else
            الطلبات
        @endif
    </h4>

    <div class="ui modal eshow">
        <div class="header">محتوى الرساله</div>
        <div class="content">
            <div class="ui header" id="subject"></div>
            <p id="name"></p>
            <p id="body"></p>
            <hr/>
            <p id="phone"></p>
            <p id="email"></p>
        </div>
    </div>
    <div class="ui modal ereply">
        <div class="header">محتوى الرساله</div>
        <div class="content">
            <div class="ui header" id="subject"></div>
            <p id="name"></p>
            <p id="body"></p>
            <hr/>
            <p id="phone"></p>
            <p id="email"></p>
        </div>
    </div>
    <table class="ui compact basic table">
        <thead class="full-width">
        <tr>
            <th>
                #
            </th>
            <th>عنوان الطلب</th>
            <th>الحالة</th>
            <th>عدد الساعات</th>
            <th>صاحب الطلب</th>
            <th> المعلم المتقدم</th>
            <th>منذ</th>
            <th>عمليات</th>
        </tr>
        </thead>

        <tbody>
        @foreach($applicants as $value)
            <tr
                    @if (!$value->read)
                    class="positive"
                    @endif
            >
                <td class="collapsing">
                    {{$value->id}}
                </td>
                <td><strong>{{$value->lecture->subject}}</strong></td>
                <td>{{$value->Statue($value->statue)}}</td>
                <td>{{$value->hour_price}}</td>
                <td>{{$value->lecture->user->first_name}}</td>
                <td>{{$value->user->first_name}}</td>
                <td>{{ \Date::parse($value->created_at)->diffForHumans() }}</td>
                <td class="two wide">
                    <a href="{{url('/dashboard/applicant/') . '/' . $value->id . '/delete'}}"
                       class="ui left red mini attached delete_msg button icon"><i class="trash icon"></i></a>
                    <a href="{{url('/dashboard/applicant/activate/') . '/' . $value->id}}"
                       class="ui right mini attached button icon"><i class="
                    @if($value->statue == 0)
                        checkmark blue
                    @else()
                        ban
                    @endif
                        icon"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    @push('scripts')
    <script type="text/javascript">

    </script>
    @endpush


@endsection
