@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}


    <h4 class="ui horizontal divider">
        الصلاحيات
    </h4>

    {{ Html::ul($errors->all(),['class' => 'ui error message']) }}

    <div class="ui modal aeform">
        <div class="content">
            {!! Form::open(array('action' => 'AbilityController@store', 'class' => 'ui form')) !!}

            		<div class="field">
            			{!! Form::label('name', 'الإسم (Eng & W/out spaces):') !!}
            			{!! Form::text('name') !!}
            		</div>

            		<div class="field">
            			{!! Form::label('title', 'الإسم:') !!}
            			{!! Form::text('title') !!}
            		</div>

            		<div class=" field">
                        {{-- {{$role->abilities()->pluck('name','name')}} --}}
            			{!! Form::label('abilities', 'الصلاحيات:') !!}
                        {!! Form::select('abilities[]', $abilities, null, array('id'=>'a', 'multiple' => true)) !!}
            		</div>
        </div>
        <div class="actions">
            <button type="submit" class="ui positive right labeled icon button">
                حفظ
                <i class="checkmark icon"></i>
            </button>
            {{ Form::close() }}
        </div>
    </div>



    <table class="ui compact celled definition table">
        <thead class="full-width">
            <tr>
                <th>
                    #
                </th>
                <th>الإسم</th>
                <th>الصلاحية</th>
                <th>عمليات</th>
            </tr>
        </thead>

        <tbody>
            @if (count($roles))
            @foreach($roles as $value)
                <tr>
                  <td class="collapsing">{{$value->id}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->title}}</td>
                  <td class="two wide">
                      <a href = "{{'/dashboard/abilities/' . $value->id}}/edit" class="ui left blue mini attached edit_form button icon"><i class="edit icon"></i></a>
                      <a href = "{{'/dashboard/abilities/' . $value->id}}/delete"  class="ui right red mini attached delete_form button icon"><i class="trash icon"></i></a>
                  </td>
                </tr>
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
                <th colspan="5">
                    <button class="ui right floated small primary labeled icon form button">
                        <i class="user icon"></i> صلاحية جديدة
                    </button>
                </th>
            </tr>
        </tfoot>
    </table>



    @push('scripts')
        <script type="text/javascript">
            $('.aeform.modal')
            .modal({
               onShow    : function(){
                   $('#a').select2({
                     placeholder: "أكتب ياللى بدك إياه",
                     tags : true,
                     language: "ar",
                     dir: "rtl"
                   });
               }
             })
              .modal('attach events', '.form.button')
            ;
        </script>
    @endpush

@endsection
