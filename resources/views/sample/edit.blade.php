<form action="{{route('student.update', $student->id)}}" method="post">
    @csrf 
    @method('PUT')
    <input type="text" name="name" placeholder="Name of Student" value="{{$student->name}}">
    <input type="text" name="address" placeholder="Address of Student" value="{{$student->address}}">
    <input type="date" name="birthday" placeholder="bday of Student" value="{{$student->birthday}}">
    <select name="sex" id="sex" value="{{$student->sex}}">
        <option value="1">Male</option>
        <option value="2">Female</option>
    </select>
    <input type="number" name="height" placeholder="height of Student" value="{{$student->height}}">
    <input type="number" name="weight" placeholder="weight of Student" value="{{$student->weight}}">
    <button type="submit">Save</button>
</form>