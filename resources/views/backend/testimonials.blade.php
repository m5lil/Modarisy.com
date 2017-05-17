@extends('backend.master')


@section('content')


    <table class="ui compact celled definition table">
        <thead class="full-width">
        <tr>
            <th>
                #
            </th>
            <th>إسم صاحب الرأى</th>
            <th>وظيفته</th>
            <th>عمليات</th>
        </tr>
        </thead>

        <tbody>
        @if (isset($testimonials) AND count($testimonials))
            @foreach($testimonials as $value)
                <tr class="item-{{$value->id}}">
                    <td class="collapsing">
                        {{ $value->id }}
                    </td>
                    <td>
                        {{ $value->name }}
                    </td>
                    <td>
                        <strong class="content-{{$value->id}}">{{ $value->title }}</strong>
                    </td>
                    <td>
                        <div class="ui tiny buttons">
                            <a href="{{url('/dashboard/testimonials/delete/' . $value->id)}}"
                               class="ui right red mini attached button icon"><i class="trash icon"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="ui center aligned"> لا يوجد بيانات</td>
            </tr>
        @endif
        </tbody>

        <tfoot class="full-width">
        <tr>
            <th>
            </th>
            <th colspan="4">
                <button class="ui right floated small primary labeled icon form button">
                    <i class="user icon"></i> صفحة جديدة
                </button>
            </th>
        </tr>
        </tfoot>
    </table>

    <div class="ui modal category_form">
        <div class="content">
            {{ Form::open(array('action' => 'DashController@add_testimonial', 'class' => 'ui form', 'id' => 'formpage','files'=> true )) }}

            <div class="field">
                <label>إسم الشخص</label>
                <input name="name" type="text"
                       value="" placeholder="إسم الشخص">
            </div>

            <div class="field">
                <label>وظيفته</label>
                <input name="title" type="text"
                       value="" placeholder="وظيفته">
            </div>

            <div class="field">
                <label>الرأى</label>
                <textarea name="body"
                          placeholder="رأى الشخص فى الخدمة"></textarea>
            </div>

            <div class="field">
                {!! Form::label('photo', 'الصورة*', array('class'=>'col-sm-2 control-label')) !!}
                {!! Form::file('photo') !!}
                {!! Form::hidden('photo_w', 4096) !!}
                {!! Form::hidden('photo_h', 4096) !!}
            </div>



        </div>
        <div class="actions">
            <button class="ui black deny button">
                إلغاء
            </button>
            <button class="ui positive right labeled icon button">
                حفظ
                <i class="checkmark icon"></i>
            </button>
        </div>
        {{ Form::close() }}
    </div>


    @push('scripts')
    <script type="text/javascript">
        $('.category_form.modal')
            .modal('attach events', '.form.button')
            .modal({
                onDeny: function () {
                    return false;
                }
            });
        ;
    </script>
    @endpush

@endsection
