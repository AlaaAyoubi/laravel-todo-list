<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')
@section('title', 'Edit')
@section('container')
<form action="/tasks/{{ $task->id }}" method="POST">
    @csrf
    @method('PUT') <!-- لأننا نستخدم update -->
    <div class="text-center m-5">
        <input type="text" name="name" value="{{ $task->name }}">
        <select class="form-select " name="priority">
  <option selected>Open this select menu</option>
  <option value="high">عالي</option>
  <option value="medium">متوسط</option>
  <option value="low">منخفض</option>
</select>
        <button class="btn btn-primary  " type="sumbit" id="button-addon2">تحديث</button>
    </div>
    
</form>
@endsection