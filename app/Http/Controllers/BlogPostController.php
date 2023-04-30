<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Validator;

/**
* The BlogPostController class is responsible for handling HTTP requests related to blog posts.
@package App\Http\Controllers
*/
class BlogPostController extends Controller
{
  /**
  * Retrieve all blog posts.
  *
  * @return \Illuminate\Http\JsonResponse Returns a JSON response containing status and message fields.
  */
  public function getAll() {
    try {
      //Fetch All Blog Posts
      $data = BlogPost::all();
      //Send All Blog Posts As Json Response
      return response()->json(['status' => true, 'message' => $data]);
    } catch (\Exception $e) {
      //Exception
      return response()->json(['status' => false, 'message' => 'Internal Server Error'], 500);
    }
  }
  /**
  * Retrieve single blog posts.
  *
  * @return \Illuminate\Http\JsonResponse Returns a JSON response containing status and message fields.
  */
  public function getOne($id) {
    try {
      //Fetch All Blog Posts
      $data = BlogPost::find($id);
      //Post Not Found
      if (!$data) {
              return response()->json(['status' => false, 'message' => 'This Post Couldn\'t Found']);
      }
      //Send Blog Posts As Json Response
      return response()->json(['status' => true, 'message' => $data]);
    } catch (\Exception $e) {
      //Exception
      return response()->json(['status' => false, 'message' => 'Internal Server Error'], 500);
    }
  }
  /**
  * Insert new blog post into the database
  *
  * @param Illuminate\Http\Request $request
  *
  @return Illuminate\Http\JsonResponse
  */
  public function insertData(Request $request) {
    //Validate The Request Data
    $validator = Validator::make($request->all(), [
      'title' => 'required|string',
      'content' => 'required|string',
      'author' => 'required|string'
    ]);
    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()], 400);
    }
    //Create A New BloPost
    $post = new BlogPost;
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->author = $request->input('author');
    //Save The Post
    if ($post->save()) {
      return response()->json(['status' => true, 'message' => 'Post Added Success']);
    } else {
      return response()->json(['status' => false, 'message' => 'Internal Server Error'], 500);
    }
  }
  /**
  * Delete a blog post from the database.
  *
  * @param int $id The id of the blog post to delete.
  *
  * @return \Illuminate\Http\JsonResponse A JSON response indicating the status of the operation.
  */
  public function deleteData($id) {
    //Find The Post
    $post = BlogPost::find($id);
    //Post Not Found
    if (!$post) {
      return response()->json(['status' => false, 'message' => 'This Post Couldn\'t Found']);
    }
    //Delete The Post
    if ($post->delete()) {
      return response()->json(['status' => true, 'message' => 'Post Deleted Successfully']);
    } else {
      return response()->json(['status' => false, 'message' => 'Internal Server Error'], 500);
    }
  }
  /**
  * Update a blog post in the database.
  *
  * @param int $id The id of the blog post to update.
  * @param array $data The data to update the blog post with.
  *
  * @return \Illuminate\Http\JsonResponse A JSON response indicating the status of the operation.
  */
  public function updateData(Request $request, $id) {
    //Validate The Request Data
    $validator = Validator::make($request->all(), [
      'title' => 'string',
      'content' => 'string',
      'author' => 'string'
    ]);
    if ($validator->fails()) {
      return response()->json(['status' => false, 'message' => $validator->errors()], 400);
    }
    //Find The Post
    $post = BlogPost::find($id);
    //Post Not Found
    if (!$post) {
      return response()->json(['status' => false, 'message' => 'This Post Couldn\'t Found']);
    }
    //Update The Post
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->author = $request->input('author');
    //save the post
    if ($post->save()) {
      return response()->json(['status' => true, 'message' => 'Post updated successfully']);
    } else {
      return response()->json(['status' => false, 'message' => 'Internal Server Error'], 500);
    }
  }
}