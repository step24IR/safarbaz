@extends('admin.layouts.admin' , ['sectionName' => 'رزرو ها'])

@section('title' , 'رزرو ها')

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
                text:'ایا می خواهید فایل موردنظر را حذف کنید؟'
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
        @if($reservations->isNotEmpty())
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">رزرو ها</h4>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th class="text-white"> # </th>
                                    <th class="text-white"> نام </th>
                                    <th class="text-white"> شماره همراه </th>
                                    <th class="text-white"> نام اتاق </th>
                                    @can('edit_reservation')
                                        <th class="text-white"> پرداخت </th>
                                    @endcan
                                    @can('see_show_reservation')
                                        <th class="text-white"> نمایش </th>
                                    @endcan
                                    @can('edit_reservation')
                                        <th class="text-white"> ویرایش </th>
                                    @endcan
                                    @can('delete_reservation')
                                        <th class="text-white">حذف</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservations as $key => $reservation)
                                    <tr>
                                        <td class="text-white">{{$reservations->firstItem() + $key}}</td>
                                        <td class="text-white">{{$reservation->guest->name}}</td>
                                        <td class="text-white">{{$reservation->guest->number}}</td>
                                        <td class="text-white">{{$reservation->room->name}}</td>
                                        @can('edit_reservation')
                                            <td class="text-white"><a class="btn text-decoration-none" href="{{route('admin.reservation.change_pay',$reservation->id)}}">{!!$reservation->is_pay ? '<span class="text-success">پرداخت شده</span>' : '<span class="text-danger">پرداخت نشده</span>'!!}</a></td>
                                        @endcan
                                        @can('see_show_reservation')
                                            <td class="text-white"><a class="btn text-decoration-none" href="{{route('admin.reservation.show',$reservation->id)}}"><i class="mdi mdi-eye"></i></a></td>
                                        @endcan
                                        @can('edit_reservation')
                                            <td class="text-white"><a class="btn text-decoration-none" href="{{route('admin.reservation.edit',$reservation->id)}}"><i class="mdi mdi-autorenew"></i></a></td>
                                        @endcan
                                        @can('delete_reservation')
                                            <td class="text-white"><a href="{{route('admin.reservation.destroy',$reservation->id)}}" id="open_delete_panel_{{$key}}" class="btn btn-outline-danger" type="button"><i class="mdi mdi-delete"></i></a></td>
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
                <p>رزروی وجود ندارد.</p>
            </div>
        @endif
    </div>
    {{$reservations->links()}}

@endsection
