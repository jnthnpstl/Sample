<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js" integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <div>
            <form onsubmit="return saveStudent(event)">
                <input id="name" type="text" placeholder="Name of Student"/>
                <input id="birthdate" type="date"/>
                <input id="address" type="address" placeholder="address"/>
                <select id="sex">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <input id="height" type="number" placeholder="height"/>
                <input id="weight" type="number" placeholder="weight"/>

                <button >save</button>
            </form>

        </div>

        <div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th>Sex</th>
                        <th>Height</th>
                        <th>Weight</th>
                    </tr>
                </thead>
                <tbody id="list">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <script>

            let students = [];

            $(function() {
                getList();
            });

            function getList(){
                window.axios.get('/student').then(({data}) => {
                    students = data;
                    students.forEach(item => {
                        $('#list').append(`
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.birthday}</td>
                            <td>${item.address}</td>
                            <td>${item.sex}</td>
                            <td>${item.height}</td>
                            <td>${item.weight}</td>
                        </tr>
                        `)
                    });
                })
            }

            function saveStudent(e){
                e.preventDefault();
                let name = $('#name').val(),
                    birthday = $('#birthdate').val(),
                    address = $('#address').val(),
                    sex = $('#sex').val(),
                    height = $('#height').val(),
                    weight = $('#weight').val();

                window.axios.post('student/create',
                    {
                        name: name,
                        birthday: birthday,
                        address: address,
                        sex: sex,
                        height: height,
                        weight: weight,
                    }
                ).then(({data}) => {
                    if(data){
                        $('#list').html('')
                        let name = $('#name').val(''),
                        birthday = $('#birthdate').val(''),
                        address = $('#address').val(''),
                        sex = $('#sex').val('1'),
                        height = $('#height').val(''),
                        weight = $('#weight').val('');
                        getList();
                    }
                });
            }
        </script>

    </body>
</html>