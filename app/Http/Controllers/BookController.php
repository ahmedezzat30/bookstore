<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    function index(){
        $books=Book::get();
        return view ('books',compact('books'));
    }

    function show($id){
        $Book=book::findorfail($id);
        return view('show',[
            'book'=> $Book
        ]);
    }

    function create(){
        return view('create');
    }


    function store(Request $request){

//         $validator = Validator::make($request->all(),[
//             'name'=> 'required|unique=books|max:100|min:3',
//             'desc'=> 'required|max:100|min:3',
//         ]);
//
//         if ($validator->fails()){
//             return redirect('books/create')
//             ->withErrors($validator)
//             ->withInput();
//         }




        //upload imageeeeeeeeee
        $imageName="";
        if ($request->hasFile('image')) {
             $image = $request->file('image');
             $name = time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/images'); $image->move($destinationPath, $name);
              $imageName='images/'.$name;
            }


        $book = new Book();
        $book->name = $request->name;
        $book->desc = $request->desc;
         //upload imageeeeeeeeee
        $book->image = $imageName;
        $book->save();

        return redirect('books/'.$book->id);

    }

    function edit($id)
    {
        $book=Book::findorfail($id);
        return view('edit',[
            'book'=>$book
        ]);
    }

    function update($id,Request $request)
    {
        $book=Book::findorfail($id);
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->save();
        return redirect('books/'.$book->id);
    }

    function delete($id)
    {
        $book=Book::findorfail($id);
        $book->delete();
        return redirect('books');
    }
}
