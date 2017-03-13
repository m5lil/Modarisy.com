@extends('backend.master')



@section('content')

{{-- <div id="app">
    <example></example>
</div> --}}


    <h4 class="ui horizontal divider">
        الصفحات
    </h4>


    {{ Html::ul($errors->all(),['class' => 'ui error message']) }}

    <div class="ui modal aeform">
        <div class="content">
            {{ Form::open(array('route' => 'pages.store', 'class' => 'ui form', 'id' => 'formpage')) }}

            <div class="ui top attached tabular menu">
                <?php  $count = 0; ?>
                @foreach(config('app.locals') as $local)
                    <?php $count++; ?>
                    <a class="<?php  if($count == 1){echo ' active';} ?> item" data-tab="{{$local}}">{{$local}}</a>
                @endforeach
            </div>
            <?php  $count2 = 0; ?>

            @foreach(config('app.locals') as $local)
                <?php $count2++; ?>

                <div class="ui bottom attached <?php  if($count2 == 1){echo ' active';} ?> tab segment" data-tab="{{$local}}">
                <div class="field">
                    <label>العنوان</label>
                    <input name="title[{{$local}}]" type="text" placeholder="العنوان">
                </div>

                <div class="field">
                    <label>المحتوى</label>
                    <textarea name="body[{{$local}}]" id="textarea"></textarea>
                </div>
                <div class="field">
                    <select name="statue" class="ui dropdown">
                        <option value="1">منشورة</option>
                        <option value="0">غير منشورة</option>
                    </select>
                </div>
                <div class="field">
                    <label>عنوان الـ SEO</label>
                    <input name="seo_title[{{$local}}]"  type="text" placeholder="العنوان فى محركات البحث">
                </div>
                <div class="field">
                    <label>كلمات مفتاحية للـ SEO</label>
                    <input name="seo_keywords[{{$local}}]"  type="text" placeholder="الكلمات المفتاحية">
                </div>
                <div class="field">
                    <label>وصف الـ SEO</label>
                    <input name="seo_description[{{$local}}]"  type="text" placeholder="الوصف فى محركات البحث">
                </div>
            </div>
            @endforeach


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

    <div class="ui modal eform">
        <div class="content">
            {{ Form::open(array('class' => 'ui form', 'id' => 'formpage')) }}
            <div class="ui top attached tabular menu">
                <?php  $count = 0; ?>
                @foreach(config('app.locals') as $local)
                    <?php $count++; ?>
                    <a class="<?php  if($count == 1){echo ' active';} ?> item" data-tab="{{$local}}">{{$local}}</a>
                @endforeach
            </div>
            <?php  $count2 = 0; ?>

            @foreach(config('app.locals') as $local)
                <?php $count2++; ?>

                <div class="ui bottom attached <?php  if($count2 == 1){echo ' active';} ?> tab segment" data-tab="{{$local}}">

                <div class="field">
                    <input name="id" id="id" type="text" placeholder="#" hidden="hidden">
                </div>

                <div class="field">
                    <label>العنوان</label>
                    <input name="title" id="title" type="text" placeholder="العنوان">
                </div>

                <div class="field">
                    <label>المحتوى</label>
                    <textarea name="body" id="body"></textarea>
                </div>
                <div class="field">
                    <select name="statue" id="statue" class="ui dropdown">
                      <option value="">الحالة</option>
                      <option value="1">منشورة</option>
                      <option value="0">غير منشورة</option>
                    </select>
                </div>
                <div class="field">
                    <label>عنوان الـ SEO</label>
                    <input name="seo_title" id="seo_title" type="text" placeholder="العنوان فى محركات البحث">
                </div>
                <div class="field">
                    <label>كلمات مفتاحية للـ SEO</label>
                    <input name="seo_keywords" id="seo_keywords" type="text" placeholder="الكلمات المفتاحية">
                </div>
                <div class="field">
                    <label>وصف الـ SEO</label>
                    <input name="seo_description" id="seo_description" type="text" placeholder="الوصف فى محركات البحث">
                </div>
            </div>
        @endforeach


            {{ Form::close() }}
        </div>
        <div class="actions">
            <button class="ui black deny button">
                إلغاء
            </button>
            <button class="ui positive right labeled icon editf button">
                حفظ
                <i class="checkmark icon"></i>
            </button>
        </div>
    </div>

    <table class="ui compact celled definition table">
        <thead class="full-width">
            <tr>
                <th>
                    #
                </th>
                <th>عنوان الصفحة</th>
                <th>الحالة</th>
                <th>أنشأت منذ</th>
                <th>عمليات</th>
            </tr>
        </thead>

        <tbody>
            @if (count($pages))
            @foreach($pages as $value)
            <tr class="item-{{$value->id}}">
                <td class="collapsing">
                    {{ $value->id }}
                </td>
                <td><strong class="content-{{$value->id}}">{{ $value->title }}</strong><br />{{ str_limit(strip_tags($value->body), 150, '...') }}</td>
                <td>
                    <i class="circle icon
                    @if ($value->statue)
                        green
                    @endif
                    "></i>
                </td>
                <td>{{ \Date::parse($value->created_at)->diffForHumans() }}</td>
                <td>
                    <div class="ui tiny buttons">
                        <a href="{{url('/dashboard/pages/' . $value->id)}}" class="ui left blue mini attached edit_form button icon"><i class="edit icon"></i></a>
                        <a href="{{url('/dashboard/pages/' .$value->id)}}" class="ui right red mini attached delete_form button icon"><i class="trash icon"></i></a>
                    </div>
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
                <th colspan="4">
                    <button class="ui right floated small primary labeled icon form button">
                        <i class="user icon"></i> صفحة جديدة
                    </button>
                </th>
            </tr>
        </tfoot>
    </table>

    @push('scripts')
        <script src="{{url('plugins/tinymce/tinymce.min.js')}}" charset="utf-8"></script>
        <script type="text/javascript">

            $('.aeform.modal')
              .modal('attach events', '.form.button')
            ;

            tinymce.init({
                selector: '#textarea'
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           //display modal form for page editing
           $('.edit_form').on('click',function(e){
               e.preventDefault();
               var url = $(this).attr("href");
               $.get(url, function (data) {
                   //success data
                   console.log(data.id);
                   $('.eform.modal').modal({
                       // onDeny    : function(){
                       //   return false;
                       // },
                       onShow : function() {
                           tinymce.init({
                               selector: '#body'
                             });

                           $('#id').val(data.id);
                           $('#title').val(data.title);
                           setTimeout(function(){
                               tinymce.activeEditor.setContent(data.body)
                            }, 10)
                           $('#statue').val(data.statue);
                           $('#seo_title').val(data.seo_title);
                           $('#seo_keywords').val(data.seo_keywords);
                           $('#seo_description').val(data.seo_description);
                       }
                   }).modal('show');
               });

               $('.editf').on('click',function(e){
                   var data = {
                        _token : $("input[name='_token']").val(),
                        id : $('#id').val(),
                        title : $('#title').val(),
                        body : tinymce.activeEditor.getContent(),
                        statue : $('#statue').val(),
                        seo_title : $('#seo_title').val(),
                        seo_keywords : $('#seo_keywords').val(),
                        seo_description : $('#seo_description').val() };
                    var target = $('#id').val();
                    var title = $('#title').val();
                    $.ajax({
                          type: 'post',
                          url: 'pages/ajax',
                          data: data,
                          success: function(data) {
                              $('.content' + '-' +  target).empty().append(title);
                              swal({
                                title: 'تم التعديل',
                                text: 'تم التعديل بنجاح.',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            }).catch(swal.noop);
                          }
                       })
                   });
           });


               $('.delete_form').on('click', function(e) {
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
                     url: 'pages/delete',
                     data: {
                       '_token': $("input[name='_token']").val(),
                       'id': self.attr("href")
                     },
                     success: function(data) {
                       $('.item' + '-' +  target).remove();
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
        </script>
    @endpush

@endsection
