@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}


    <h4 class="ui horizontal divider">
        <h2>القائمة الرئيسية</h2>
    </h4>
    <hr />

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
            @foreach($users as $value)
                <tr>
                  <td class="collapsing">{{$value->id}}</td>
                  <td>{{$value->first_name}} {{$value->last_name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->activated}}</td>
                  <td>{{$value->role}}</td>
                  <td class="two wide">
                      <a href = "{{'/dashboard/users/' . $value->id}}/edit" class="ui left blue mini attached edit_form button icon"><i class="edit icon"></i></a>
                      <a href = "{{'/dashboard/users/' . $value->id}}/delete"  class="ui right red mini attached delete_form button icon"><i class="trash icon"></i></a>
                  </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot class="full-width">
            <tr>
                <th>
                </th>
                <th colspan="5">
                    <a  href = "{{'/dashboard/users/create'}}" class="ui right floated small primary labeled icon form button">
                        <i class="user icon"></i> رابط جديد
                    </a>
                </th>
            </tr>
        </tfoot>
    </table>



    @push('scripts')
        {{-- <script type="text/javascript">
            $('.aeform.modal')
              .modal('attach events', '.form.button')
            ;
        </script> --}}
    @endpush

@endsection
