@extends('admin.layouts.admin' , ['sectionName' => 'کامنت ها'])

@section('title' , 'کامنت ها')

@section('head')
    <style>
        .deletePanel {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            overflow: hidden;
            background: rgba(0,0,0,0.5);
        }

        .deleteBox {
            position: fixed;
            padding: 20px;
            top: 50%;
            left: 50%;
            background: rgba(0,0,0,1);
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

@section('scripts')
    <script type="module">
        $('[id^=open_delete_panel_]').on('click' , deleteBox)

        function deleteBox(e)
        {
            e.preventDefault()
            let wrapper = $('<div>' , {class:'deletePanel'})
            let box = $('<div>', {class:'deleteBox'})
            let message = $('<p>' , {
                class:"text-end pb-3",
                text:'ایا می خواهید کامنت موردنظر را حذف کنید؟'
            })

            let btnContainer = $('<div>' , {class:"d-flex justify-content-between"})
            let deleteForm = $('<form>' , {
                method:"post",
                action : $(this).attr('href')
            })
            let methodInput = $('<input>' , {
                type:"hidden",
                name:"_method",
                value : "DELETE"
            })
            let csrfInput = $('<input>' , {
                type:"hidden",
                name:"_token",
                value : "{{ csrf_token() }}"
            })


            let closeBtn = $('<button>' , {
                class:"btn btn-success",
                type:"button",
                click: ()=> wrapper.remove(),
                text:'خیر'
            })

            let actionBtn = $('<button>' , {
                class:"btn btn-danger",
                type:"submit",
                text:'بله',
            })

            wrapper.append(box)
            box.append(message)
            box.append(btnContainer)
            btnContainer.append(closeBtn)
            btnContainer.append(deleteForm)
            deleteForm.append(methodInput)
            deleteForm.append(csrfInput)
            deleteForm.append(actionBtn)

            $('#selectBox').append(wrapper)
        }
    </script>

@endsection

@section('content')
    <div id="selectBox">

    </div>

    <div class="row">
        @if($comments->isNotEmpty())
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">کامنت ها</h4>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th class="text-white"> # </th>
                                    <th class="text-white"> نام </th>
                                    <th class="text-white"> ایمیل </th>
                                    @can('see_show_comment')
                                        <th class="text-white"> نمایش </th>
                                    @endcan
                                    @can('change_approve_comment')
                                        <th class="text-white"> تایید </th>
                                    @endcan
                                    @can('delete_comment')
                                        <th class="text-white">حذف</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $key => $comment)
                                    <tr>
                                        <td class="text-white">{{$comments->firstItem() + $key}}</td>
                                        <td class="text-white">{{$comment->name}}</td>
                                        <td class="text-white">{{$comment->email}}</td>
                                        @can('see_show_comment')
                                            <td class="text-white"><a class="btn text-decoration-none" href="{{route('admin.comment.show',$comment->id)}}"><i class="mdi mdi-eye"></i></a></td>
                                        @endcan
                                        @can('change_approve_comment')
                                            <td class="text-white"><a class="btn text-decoration-none" href="{{route('admin.comment.changeApprove',$comment->id)}}">{!!  $comment->approved ? '<span class="text-success">تایید شده<span>' : '<span class="text-danger">تایید نشده<span>'!!}</a></td>
                                        @endcan
                                        @can('delete_comment')
                                            <td class="text-white"><a href="{{route('admin.comment.destroy',$comment->id)}}" id="open_delete_panel_{{$key}}" class="btn btn-outline-danger" type="button"><i class="mdi mdi-delete"></i></a></td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <p>کامنتی وجود ندارد.</p>
            </div>
        @endif
    </div>
    {{$comments->links()}}

@endsection
