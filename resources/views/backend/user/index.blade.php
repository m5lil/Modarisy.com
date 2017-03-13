@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}

{{-- $request->fullUrlWithQuery(['bar' => 'baz']) --}}
    <h2 class="ui horizontal divider">
        @if (Request::is('dashboard/users/members/students'))
            الطلاب
        @elseif (Request::is('dashboard/users/members/teachers'))
            المدرسين
        @else
            الأعضاء
        @endif
    </h2>




    <table class="ui compact celled definition table">
        <thead class="full-width">
            <tr>
                <th>
                    #
                </th>
                <th>الإسم</th>
                <th>البريد الإلكترونى</th>
                <th>الحالة</th>
                <th>الصلاحية</th>
                <th>عمليات</th>
            </tr>
        </thead>
        <tbody>
            @if (count($users))
                @foreach($users as $value)
                    <tr>
                      <td class="collapsing">{{$value->id}}</td>
                      <td>{{$value->first_name}} {{$value->last_name}}</td>
                      <td>{{$value->email}}</td>
                      <td>
                          <i class="circle icon
                          @if ($value->activated)
                              green
                          @endif
                          "></i>
                      </td>
                      <td>{{$value->roles()->pluck('name')}}</td>
                      <td class="two wide">
                          <a href = "{{'/dashboard/users/' . $value->id}}/edit" class="ui left blue mini attached edit_form button icon"><i class="edit icon"></i></a>
                          <a href = "{{'/dashboard/users/' . $value->id}}/delete"  class="ui right red mini attached delete_form button icon"><i class="trash icon"></i></a>
                      </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="ui center aligned"> لا يوجد بيانات </td>
                </tr>
            @endif
        </tbody>

    </table>

{{ $users->links() }}
    @push('scripts')
        {{-- <script type="text/javascript">
            $('.aeform.modal')
              .modal('attach events', '.form.button')
            ;
        </script> --}}
    @endpush

@endsection
