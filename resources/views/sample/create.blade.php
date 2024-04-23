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