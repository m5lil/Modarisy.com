@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}


    <h4 class="ui horizontal divider">
        القائمة الرئيسية
    </h4>
    {{ Html::ul($errors->all(),['class' => 'ui error message']) }}

    <div class="ui modal aeform">
        <div class="content">
            {!! Form::open(array('action' => 'MenuController@store', 'class' => 'ui form')) !!}
                    <div class="field">
                        <label>الاسم</label>
                        {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
                    </div>

                    <div class="fields">
                        <div class="twelve wide field">
                            <label>رابط خارجى</label>
                            {!! Form::text('url',  old('url'), array('id'=>'a', 'class'=>'form-control')) !!}
                        </div>
                        <div class="four wide field">
                            <label>رابط من صفحة</label>
                            {!! Form::select('url',  \App\Page::pluck('title','slug'), null, array('id'=>'b', 'class'=>'form-control')) !!}
                        </div>
                    </div>

                    <div class="field">
                        <label>الترتيب</label>
                        {!! Form::text('order', old('order'), array('class'=>'form-control')) !!}
                    </div>
                    <div class="field">
                        {!! Form::select('parent_id', $parents_menu , 0, array('class'=>'form-control')) !!}
                    </div>
            </div>
            <div class="actions">
                <button type="submit" class="ui positive right labeled icon button">
                    حفظ
                    <i class="checkmark icon"></i>
                </button>
            </div>
            {{ Form::close() }}
    </div>


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
            @if (count($menus))

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
        @else
            <tr>
                <td colspan="6" class="ui center aligned"> لا يوجد بيانات </td>
            </tr>
        @endif
        </tbody>

        <tfoot class="full-width">
            <tr>
                <th>
                </th>
                <th colspan="4">
                    <button class="ui right floated small primary labeled icon form button">
                        <i class="user icon"></i> رابط جديد
                    </button>
                </th>
            </tr>
        </tfoot>
    </table>



    @push('scripts')
        <script type="text/javascript">

        $('.aeform.modal')
          .modal('attach events', '.form.button');

          var dis1 = document.getElementById("a");
          dis1.onchange = function () {
              if (this.value != "" || this.value.length > 0) {
                  document.getElementById("b").disabled = true;
              }else {
                  document.getElementById("b").disabled = false;
              }
          }
          $(document).ready(function () {
              var dis1 = document.getElementById("a");
              if (dis1.value != "" || dis1.value.length > 0) {
                  document.getElementById("b").disabled = true;
              }else {
                  document.getElementById("b").disabled = false;
              }
          })

        </script>
    @endpush

@endsection
