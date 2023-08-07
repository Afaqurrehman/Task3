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
                <a href="{{route('books.index')}}" class="btn btn-primary">Back</a>
               </div>

            </div>
        <form action="{{ route('books.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Book title</label>
                        <input type="text" name="title" id="title" placeholder="Enter title of book" class="form-control
                        @error('title') is-invalid @enderror" value="{{old('title')}}">
                        @error('title')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" id="author" placeholder="Enter author name" class="form-control
                        @error('author') is-invalid @enderror" value="{{old('title')}}">
                        @error('author')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="publication" class="form-label">Publication</label>
                        <input type="text" name="publication" id="publication" placeholder="Enter publication" class="form-control" value="{{old('title')}}">

                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-3">Save Book</button>
        </form>
    </div>
</body>
</html>