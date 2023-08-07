<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Management System</title>
    <link rel="stylesheet" href="{{asset('assets\assets/css/bootstrap.min.css') }}">
</head>
<body>
 
    <div class="bg-dark py3"> 
        <div class="container">
            <div class="h4 text-white">Books Managment System </div>
</div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Books</div>
            <div>
                <a href="{{route('books.create')}}" class="btn btn-primary">Create</a>
               </div>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
                 {{Session::get('success')}}
            </div>
            @endif
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>booktitle</th>
                        <th>author</th>
                        <th>publication year</th>
                    </tr>

                    @if($books->isNotEmpty())
                    @foreach($books as $book)
                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->publication}}</td>
                        <td>
                        <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" onclick="deleteBook({{$book->id}})" class="btn btn-danger btn-sm">Delete</a>
                    
                        <form id="book-edit-action-{{ $book->id }}" action="{{route('books.destroy',$book->id)}}" method="post">
                            @csrf
                            @method('delete')

                        </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                         <td colspan='6'>Record not found</td>
                    @endif
</table>
            </div>
        </div>
        <div>
            {{$books->links() }}
        </div>
    </div>
</body>
</html>

<script>
    function deleteBook(id){
        if(confirm("Are you sure you want to delete?"))
           document.getElementById('book-edit-action-'+id).submit();
    }

    </script>