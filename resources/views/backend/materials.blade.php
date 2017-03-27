@extends('backend.master')


@section('content')


    <table class="ui compact celled definition table">
        <thead class="full-width">
        <tr>
            <th>
                #
            </th>
            <th>إسم المادة</th>
            <th>عمليات</th>
        </tr>
        </thead>

        <tbody>
        @if (isset($materials) AND count($materials))
            @foreach($materials as $value)
                <tr class="item-{{$value->id}}">
                    <td class="collapsing">
                        {{ $value->id }}
                    </td>
                    <td>
                        <strong class="content-{{$value->id}}">{{ $value->title }}</strong>
                    </td>
                    <td>
                        <div class="ui tiny buttons">
                            <a href="{{url('/dashboard/materials/delete/' . $value->id)}}"
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
            {{ Form::open(array('action' => 'DashController@add_material', 'class' => 'ui form', 'id' => 'formpage')) }}

            <div class="field">
                <label>إيم المادة عربي</label>
                <input name="title" type="text"
                       value="" placeholder="إسم المادة">
            </div>

            <div class="field">
                <label>إسم المادة English</label>
                <input name="slug" type="text"
                       value="" placeholder="إسم المادة باللغةالإنجليزية">
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
