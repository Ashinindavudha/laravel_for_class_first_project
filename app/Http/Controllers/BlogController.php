<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::latest()->paginate(5);
        return view('post.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate submitted data
        $request->validate([
            //Post Validation Rules
            'title' => 'required',
            'description' => 'required',
            //Media Validation Rules
            'media' => 'array|max:10', //max:10 means maximum array size of 10, so max 10 uploads
            "media.*" => "required|string|max:255|min:1", //filenames must have a length between 1 and 255
            'media_original_name' => 'array|max:10',
            "media_original_name.*" => "required|required_with:media.*|string|max:255|min:1", //required_with here /should/ make it validate that both media and media_original_name arrays be the same length.  I think.
        ]);
        $post = new Blog;
        $data = $request->only('title'); //The request also contains media attachments, so only get the data required for the post
        //$data = $request->only('description');
        $post->description = $request->description;

        $post->fill($data);
        $post->save();

        //Handle media
        //Items in media and media_original_name arrays from the request must be in the correct order in each array so the media and it's original name can be matched together by their array index
        foreach ($request->input('media', []) as $index => $file) {
            //Media Library should now attach file previously uploaded by Dropzone (prior to the post form being submitted) to the post
            $post->addMedia(storage_path("app/" . $file))
                ->usingName($request->input('media_original_name', [])[$index]) //get the media original name at the same index as the media item
                ->toMediaCollection();
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $post)
    {
        $post->load('media'); //Make sure media is included
        return view('post.blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $post)
    {
        $post->load('media'); //Make sure media is included
        return view('post.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $post)
    {
        //Validate submitted data
        $request->validate([
            //Post Validation Rules
            'title' => 'required',
            //Media Validation Rules
            'media' => 'array|max:10', //max:10 means maximum array size of 10, so max 10 uploads
            "media.*" => "required|string|max:255|min:1", //filenames must have a length between 1 and 255
            'media_original_name' => 'array|max:10',
            "media_original_name.*" => "required|required_with:media.*|string|max:255|min:1", //required_with here /should/ make it validate that both media and media_original_name arrays be the same length.  I think.
        ]);
        $data = $request->only('title'); //The request also contains media attachments, so only get the data required for the post
        $post->fill($data);
        $post->save();

        //Handle media
        //Items in media and media_original_name arrays from the request must be in the correct order in each array so the media and it's original name can be matched together by their array index

        //Load existing media for post
        $post->load('media');

        //Delete existing media which is not included in the updated post
        if (count($post->media) > 0) {
            foreach ($post->media as $media) {
                if (!in_array($media->file_name, $request->input('media', []))) {
                    $media->delete();
                }
            }
        }

        //Attach only media which isint in the existing media
        $media = $post->media->pluck('file_name')->toArray();
        foreach ($request->input('media', []) as $index => $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                //Media Library should now attach file previously uploaded by Dropzone (prior to the post form being submitted) to the post
                $post->addMedia(storage_path("app/" . $file))
                    ->usingName($request->input('media_original_name', [])[$index]) //Get the media original name at the same index as the media item
                    ->toMediaCollection();
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $post)
    {
        $post->delete();
        //Media should be automatically removed with the post
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
