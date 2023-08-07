<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BooksController extends Controller
{
    public function index(){
       
        //view all the details of books
        $books = Book::orderBy('id','DESC')->paginate(5);

        return view('book.list',['books'=> $books]);
    }
    public function create(){
        return view('book.create');
    }

    public function store(Request $request){
         $validator = Validator::make($request->all(),[
            'title' => 'required',
            'author' => 'required',
            'publication' => 'required'
         ]);
         if ($validator->passes()){
            $book = new Book();
            $book->title =$request->title;
            $book->author =$request->author;
            $book->publication =$request->publication;
            $book->save();
            $request->session()->flash('success','book added successfully.');
            return redirect()->route('books.index');

         } else{
            return redirect()->route('books.create')->withErrors($validator)->withInput();
         }
    }

    public function edit($id){
        $book = book::findOrFail($id);

        if(!$book){
            abort('404');
        }

        return view('book.edit',['book'=>$book]);
    }
    public function update($id, Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'author' => 'required',
            'publication' => 'required'
         ]);
         if ($validator->passes()){
            $book = Book::find($id);
            $book->title =$request->title;
            $book->author =$request->author;
            $book->publication =$request->publication;
            $book->save();
            $request->session()->flash('success','book added successfully.');
            return redirect()->route('books.index');

         } else{
            return redirect()->route('books.edit',$book->id)->withErrors($validator)->withInput();
         }
    }
    public function destroy($id,Request $request){
      $book = Book::findOrFail($id);
      $book->delete();
       
      return redirect()->route('books.index')->with('success','book deleted successfully');
    }
}
