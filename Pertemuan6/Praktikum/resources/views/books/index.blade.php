<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
    <body>
        <h1>Daftar Buku</h1>
        <a href="{{ url(path: 'books/create') }}">Tambahkan Buku</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>
                        <a href="{{ url(path: '/books/edit/' . $book->id) }}">Edit</a>
                        <form action="{{ url(path:'/books/delete/' . $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>