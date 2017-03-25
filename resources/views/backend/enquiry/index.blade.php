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
        @foreach($enquiries as $value)
            <tr
                    @if (!$value->read)
                    class="positive"
                    @endif
            >
                <td class="collapsing">
                    {{$value->id}}
                </td>
                <td><strong>{{$value->subject}}</strong></td>
                <td>{{$value->Statue($value->statue)}}</td>
                <td>{{count($value->applicants)}}</td>
                <td>{{$value->user->first_name}}</td>
                <td>{{@$value->applicants->find($value->applicant_id)->user->first_name}}</td>
                <td>{{ \Date::parse($value->created_at)->diffForHumans() }}</td>
                <td class="two wide">
                    <a href="{{url('/dashboard/enquiries/') . '/' . $value->id . '/delete'}}"
                       class="ui left red mini attached delete_msg button icon"><i class="trash icon"></i></a>
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
        </tbody>
    </table>


    @push('scripts')
    <script type="text/javascript">
        $(function () {
            $('div.content').hide();
            $('input[type="submit"]').click(function (e) {
                e.preventDefault();
                $.post('/dashboard/subscribers/submit', {
                    _token: $('input[name="_token"]').val(),
                    name: $('input[name="name"]').val(),
                    email: $('input[name="email"]').val()
                }, function ($data) {
                    if ($data == '1') {
                        $('div.content').hide().removeClass('success error').addClass('success').html('You\'ve successfully subscribed to ournewsletter').fadeIn('fast');
                    } else {
                        $('div.content').hide().removeClass('success error').addClass('error').html('There has been an error occurred:<br /><br />' + $data).fadeIn('fast');
                    }
                });
            });
            $('form').submit(function (e) {
                e.preventDefault();
                $('input[type="submit"]').click();
            });
        });

        $('.show_msg').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function (data) {
                //success data
                console.log(data.id);
                $('.eshow.modal').modal({
                    onShow: function () {
                        $('#id').empty().append(data.id);
                        $('#subject').empty().append(data.subject);
                        $('#name').empty().append(data.name);
                        $('#phone').empty().append(data.phone);
                        $('#email').empty().append(data.email);
                        $('#body').empty().append(data.body);
                    }
                }).modal('show');
            });
        });


        $('.delete_msg').on('click', function (e) {
            e.preventDefault();
            var target = $(this).attr("href");
            var self = $(this)

            swal({
                title: 'هل أنت متأكد?',
                text: "لن تكون قادر على التراجع !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم, بقم بالحذف!',
                cancelButtonText: 'لا, قم بالإلغاء!',
                confirmButtonClass: 'ui blue button',
                cancelButtonClass: 'ui red button',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    type: 'post',
                    url: 'inbox/delete',
                    data: {
//                   '_token': $("input[name='_token']").val(),
                        'id': self.attr("href")
                    },
                    success: function (data) {
                        $('.item' + '-' + target).remove();
                    }
                });
                swal(
                    'تم الحذف!',
                    'لقد قمت بالحذف بنجاح.',
                    'success'
                )
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'تم التراجع',
                        'السجل الذى كنت على وشك حذفه بأمان :)',
                        'error'
                    )
                }
            })
        });

        $("#select1").change(function () {
            if ($(this).data('options') == undefined) {
                /*Taking an array of all options-2 and kind of embedding it on the select1*/
                $(this).data('options', $('#select2 option').clone());
            }
            var id = $(this).val();
            var options = $(this).data('options').filter('[ss=' + id + ']');
            $('#select2').html(options);
        });


    </script>
    @endpush


@endsection
