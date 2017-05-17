@extends('backend.master')



@section('content')

    {{-- <div id="app">
        <example></example>
    </div> --}}


    <h4 class="ui horizontal divider">
        @if (Request::is('dashboard/enquiries/statue/suspend'))
            معلقة
        @elseif (Request::is('dashboard/enquiries/statue/active'))
            مفعلة
        @elseif (Request::is('dashboard/enquiries/statue/in-progress'))
            جارى العمل
        @elseif (Request::is('dashboard/enquiries/statue/done'))
            منتهية
        @else
            الطلبات
        @endif
    </h4>

    <table class="ui compact basic table">
        <thead class="full-width">
        <tr>
            <th>
                #
            </th>
            <th>عنوان الطلب</th>
            <th>الحالة</th>
            <th>عدد المتقدمين</th>
            <th>صاحب الطلب</th>
            <th>إسم المعلم المختار</th>
            <th>منذ</th>
            <th>عمليات</th>
        </tr>
        </thead>

        <tbody>
        @if(Null != $enquiries)
        @foreach($enquiries as $value)
            <tr>
                <td class="collapsing">
                    {{$value->id}}
                </td>
                <td><strong>{{$value->subject}}</strong></td>
                <td>{{$value->Statue($value->statue)}}</td>
                <td>{{count($value->applicants)}}</td>
                <td>{{@$value->user->first_name}}</td>
                <td>{{@$value->applicants->find($value->applicant_id)->user->first_name}}</td>
                <td>{{ \Date::parse($value->created_at)->diffForHumans() }}</td>
                <td class="two wide">
                    <a href="{{url('/dashboard/enquiries/') . '/' . $value->id . '/delete'}}"
                       class="ui left red mini attached  button icon"><i class="trash icon"></i></a>
                    <a href="{{url('/dashboard/enquiries/activate/') . '/' . $value->id}}"
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
            @endif
        </tbody>
    </table>


    @push('scripts')
    <script type="text/javascript">
    </script>
    @endpush


@endsection
