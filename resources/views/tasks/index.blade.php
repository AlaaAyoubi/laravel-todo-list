@extends('layouts.app')
@section('title', 'Index')
@section('container')
<h1>قائمة المهام</h1> 

<br>

<form action="/tasks" method="POST" novalidate>
    @csrf
    <div class="grid text-center position-relative">
        <label class="form-label"></label>
  <input type="text" name="name"  placeholder="أدخل المهمة" >
  <select class="form-select " name="priority">
  <option selected>Open this select menu</option>
  <option value="high">عالي</option>
  <option value="medium">متوسط</option>
  <option value="low">منخفض</option>
</select>
  <button class="btn btn-primary  " type="sumbit" id="button-addon2">إضافة</button>
</div>
</form>

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">المهام</th>
      <th scope="col">الأولوية</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($tasks as $task)
    <tr>
        
      <th scope="row">{{$task['id']}}</th>
      <td>{{$task['name']}}</td>
      <td><span class="priority-{{ $task->priority }}">
            {{ $task->priority }}
        </span></td>
      <td>
      <a href="{{route('tasks.edit', $task['id'])}}" class="btn btn-info m-2">تعديل</a>
      <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-2">حذف</button>
</form>
      </td>
    </tr>
    @endforeach
  

  </tbody>
</table>
@endsection
