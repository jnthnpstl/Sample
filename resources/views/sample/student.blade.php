
<!DOCTYPE html>
<html lang="en">

<body>
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js" integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    

    <h1>Hello World</h1>
    
<table>
<tr>
    <th>Name</th>
    <th>Birthday</th>
    <th>Address</th>
    <th>Sex</th>
    <th>Height</th>
    <th>Weight</th> 
    <th>Actions</th> 
</tr>
@foreach ($users as $s)
<tr>
    <td>{{$s->name}}</td>
    <td>{{$s->birthday}}</td>
            <td>{{$s->address}}</td>
            <td>{{$s->sex}}</td>
            <td>{{$s->weight}}</td>
            <td>{{$s->height}}</td>
            <td>
                <a href="{{route('student.editForm', $s->id)}}">
                    <button>edit</button>
                </a>
                <form action="{{ route('student.delete', $s->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <form action="/student/create" method="post">
        @csrf 
        <input type="text" name="name" placeholder="Name of Student">
        <input type="text" name="address" placeholder="Address of Student">
        <input type="date" name="birthday" placeholder="bday of Student">
        <select name="sex" id="sex">
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select>
        <input type="number" name="height" placeholder="height of Student">
        <input type="number" name="weight" placeholder="weight of Student">
        <button type="submit">Save</button>
    </form>

    <script>
        const students = [];

        $(function () {
            getList();
            console.log(students);
        })

        function getList() {
            window.axios.get('/students').then(({data} => {
                students = data
            }))
        }
    </script>
    
</body>
</html>