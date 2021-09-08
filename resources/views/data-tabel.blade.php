<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table border="1">
    <thead>
        <th>a_id</th>
        <th>a_seq</th>
        <th>a_nm</th>
        <th>a_nik</th>
        <th>p_id</th>
        <th>a_stat</th>
        <th>a_cur_p</th>
        <th>a_cr_by</th>
        <th>a_cr_at</th>
        <th>a_up_by</th>
        <th>a_up_at</th>
        <th>a_expr</th>
    </thead>
    @foreach($data as $d)
    <tbody>
        <td>{{$d->a_id}}</td>
        <td>{{$d->a_seq}}</td>
        <td>{{$d->a_nm}}</td>
        <td>{{$d->a_nik}}</td>
        <td>{{$d->p_id}}</td>
        <td>{{$d->a_stat}}</td>
        <td>{{$d->a_cur_p==1?"Y":"N"}}</td>
        <td>{{$d->a_cr_by}}</td>
        <td>{{$d->a_cr_at}}</td>
        <td>{{$d->a_up_by}}</td>
        <td>{{$d->a_up_at}}</td>
        <td>{{$d->a_expr}}</td>
    </tbody>
    @endforeach
</table>
</body>
</html>
