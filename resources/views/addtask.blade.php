@extends('layouts.master')
@section('content')

<h1 class="mb-4">إضافة مهمة جديدة</h1>
<form action="{{route('task.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="description" class="form-label">وصف المهمة</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="date_time" class="form-label">التاريخ والوقت</label>
        <input type="datetime-local" id="date_time" name="date_time" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">إضافة</button>
</form>

    @endsection
