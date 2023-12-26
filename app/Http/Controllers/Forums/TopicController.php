<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use App\Models\Forum\Topic;
use App\Models\Forum\Category;
use App\Models\Forum\Post;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{


    public function create()

    {

        $categories = Category::all();

        return view('topic.create', ['categories' => $categories]);

    }

    public function save()

    {
        $user = auth()->user();

        $this->validate(request(), [
            'topic_cat' => 'required|max:255',
            'topic_subject' => 'required|max:255|',
            'topic_message' =>'required'
        ]);

        $topic = Topic::create([

                'topic_cat' => request()->input('topic_cat'),
                'topic_subject' => request()->input('topic_subject'),
                'topic_by' => $user->_id,

        ]);
      

        $post = Post::create([

            'post_content' => request()->input('topic_message'),
            'post_topic' => $topic->_id,
            'post_by' => $user->_id,

        ]);

        return redirect()->to('topic/index')
            ->with('success','Tema creado correctamente.');
    }


    public function index()

    {

        $topics = Topic::all();

        $arrTopics = array();

        foreach ($topics as $topic) {

            $category = Category::where('_id', $topic->topic_cat)->first();

            $arrTopics[] = array(

                'topic_id' => $topic->_id,

                'topic_subject' => $topic->topic_subject,

                'topic_category_name' => $category->cat_name

            );

        }
        return view('topic.index', ['topics' => $arrTopics]);

    }

    public function detail($id)

    {

        $topic = Topic::where('_id', $id)->first();

        $posts = Post::where('post_topic', $id)->get();

        $arrPosts = array();

        foreach ($posts as $post) {

            $user = User::where('_id', $post->post_by)->first();
            

            $arrPosts[] = array(

                'post_by' => $user->name,

                'post_content' => $this->findLinks($post->post_content)

            );

        }

        return view('topic.detail', ['topic' => $topic, 'posts' => $arrPosts]);

    }

    public function replySave()

    {

        $user = auth()->user();

        $post = Post::create([

            'post_content' => request()->input('post_message'),
            'post_topic' => request()->input('topic_id'),
            'post_by' => $user->_id

        ]);

        return redirect()->to('topic/detail/'.request()->input('topic_id'))

            ->with('success','Reply is added successfully.');

    }

    public function findLinks($text)
    {
        // regular expresion
        $regex = '/(https?:\/\/[^\s]+)/';

        // change link
        $textClickable = preg_replace($regex, '<a href="$1" target="_blank">$1</a>', $text);

        return $textClickable;
    }

}
