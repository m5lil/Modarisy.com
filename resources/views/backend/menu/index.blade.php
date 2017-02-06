@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}


    <h4 class="ui horizontal divider">
        <h2>القائمة الرئيسية</h2>
    </h4>
    <hr />
    {{ Html::ul($errors->all(),['class' => 'ui error message']) }}

    <table class="ui compact celled definition table">
        <thead class="full-width">
            <tr>
                <th>
                    #
                </th>
                <th>العنوان</th>
                <th>الترتيب</th>
                <th>الرابط الرئيسي</th>
                <th>عمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($menus as $value)
              @if ($value->parent_id == 0)
                <tr>
                  <td class="collapsing">{{$value->id}}</td>
                  <td><strong>{{$value->title}}</strong><br />{{$value->url}}</td>
                  <td class="one wide">{{$value->order}}</td>
                  <td>{{ $title[$value->parent_id] }}</td>
                  <td class="two wide">
                      <a href = "{{'/dashboard/menu/' . $value->id}}/edit" class="ui left blue mini attached edit_form button icon"><i class="edit icon"></i></a>
                      <a href = "{{'/dashboard/menu/' . $value->id}}/delete"  class="ui right red mini attached delete_form button icon"><i class="trash icon"></i></a>
                  </td>
                </tr>
                @if ( ! $value->children->isEmpty() )
                  @foreach ($value->children as $subMenuItem)
                    <tr>
                      <td>{{$subMenuItem->id}}</td>
                      <td> --> <strong>{{$subMenuItem->title}} </strong> (رابط فرعى)<br /> {{$subMenuItem->url}}</td>
                      <td>{{$subMenuItem->order}}</td>
                      <td>{{ $title[$subMenuItem->parent_id] }}</td>
                      <td class="two wide">
                        <a href = "{{'/dashboard/menu/' . $subMenuItem->id}}/edit"  class="ui left blue mini attached edit_form button icon"><i class="edit icon"></i></a>
                        <a href = "{{'/dashboard/menu/' . $subMenuItem->id}}/delete"  class="ui right red mini attached delete_form button icon"><i class="trash icon"></i></a>
                      </td>
                    </tr>
                  @endforeach
                @endif
              @endif
            @endforeach
        </tbody>

        <tfoot class="full-width">
            <tr>
                <th>
                </th>
                <th colspan="4">
                    <a  href = "{{'/dashboard/menu/create'}}" class="ui right floated small primary labeled icon form button">
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
