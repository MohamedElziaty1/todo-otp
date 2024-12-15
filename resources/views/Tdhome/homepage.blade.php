@extends('layouts.master')

@section('content')

    <h1 class="mb-4">منظم المهام اليومية</h1>
    <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">إضافة مهمة جديدة</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>الوصف</th>
            <th>التاريخ والوقت</th>
            <th>الحالة</th>
            <th>الاجراء</th>
        </tr>
        </thead>
<tbody>
    @foreach($tasks as $task)
<tr>
        <td>{{$task->description}} </td>
        <td>{{$task->date_time}}</td>
        <td>  @if (!$task->is_done)
                <form action="{{ route('task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success">تم الإنجاز</button>
                </form>
            @else
                <span class="text-success">منجز</span>
            @endif
        </td>

        <td>
            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">حذف  </button>
            </form>
        </td>

    </tr>
    @endforeach
</tbody>





@endsection

